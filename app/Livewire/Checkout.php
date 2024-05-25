<?php

namespace App\Livewire;

use App\Helpers\Alert;
use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Techcorner | Checkout')]
class Checkout extends Component
{
    use LivewireAlert;

    public $first_name;
    public $last_name;
    public $phone;
    public $city;
    public $address;
    public $payment_method;

    public function mount()
    {
        $cart_items = CartManagement::getCartItemFormCookie();
        if (count($cart_items) <= 0) {
            return redirect('/products');
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
        ]);
        $cart_items = CartManagement::getCartItemFormCookie();
        $line_items = $this->prepareLineItems($cart_items);

        $order = $this->prepareOrderData($cart_items);
        $address = $this->prepareAddressData();

        $redirect_url = $this->handlePayment($line_items);

        $order->save();
        $address->order_id = $order->id;
        $address->save();

        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();
        Mail::to(request()->user())->send(new OrderPlaced($order));
        Alert::message('success', "Your order is proceeded.Please check your email", $this);
        return redirect($redirect_url);
    }

    protected function prepareLineItems($cart_items)
    {
        $line_items = [];
        foreach ($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => intval($item['unit_amount'] * 100),
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                ],
                'quantity' => $item['quantity'],
            ];
        }
        return $line_items;
    }

    protected function prepareOrderData($cart_items)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cart_items);
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'USD';
        $order->shipping_amount = 0;
        $order->shipping_method = 'none';
        $order->notes = "Order placed by " . auth()->user()->name;

        return $order;
    }

    protected function prepareAddressData()
    {
        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->address = $this->address;
        $address->city = $this->city;

        return $address;
    }

    protected function handlePayment($line_items)
    {
        $redirect_url = '';
        if ($this->payment_method == 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => auth()->user()->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel')
            ]);
            $redirect_url = $sessionCheckout->url;
        } else {
            $redirect_url = route('success');
        }

        return $redirect_url;
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemFormCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        return view('livewire.checkout', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
