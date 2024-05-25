<?php

namespace App\Livewire;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('TechCorner | Success')]
class Success extends Component
{
    #[Url]
    public $session_id;

    public $order;

    public function mount()
    {
        $this->order = Order::with('address')->where('user_id', auth()->user()->id)->latest()->first();
    }

    public function checkPaymentStatus()
    {
        if ($this->session_id) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session_info = Session::retrieve($this->session_id);
            if ($session_info->payment_status != 'paid') {
                $this->order->payment_status = 'failed';
                $this->order->save();

                return redirect()->route('cancel');
            } elseif ($session_info->payment_status == 'paid') {
                $this->order->payment_status = 'paid';
                $this->order->save();
            }
        }
    }

    public function printOrderDetails()
    {
        // Load the view for the order details
        $pdf = Pdf::loadView('pdf.order-details', ['order' => $this->order]);

        // Return the PDF download response
        return response()->streamDownload(
            fn () => print ($pdf->output()),
            "order-details-{$this->order->id}.pdf"
        );
    }

    public function render()
    {
        $this->checkPaymentStatus();

        return view('livewire.success');
    }
}
