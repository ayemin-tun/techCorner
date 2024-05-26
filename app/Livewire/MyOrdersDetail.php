<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('TechCorner | Order Details')]
class MyOrdersDetail extends Component
{
    #[Url]
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $order = Order::where('id', $this->order_id)->first();
        $address = Address::where('order_id', $this->order_id)->first();

        return view('livewire.my-orders-detail', [
            'order_items' => $order_items,
            'order' => $order,
            'address' => $address,
        ]);
    }
}
