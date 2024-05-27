<?php

namespace App\Livewire;

use App\Helpers\Alert;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | My account')]
class MyAccount extends Component
{
    use LivewireAlert;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        if (! empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        $user->save();
        $this->password = '';
        $this->password_confirmation = '';
        Alert::message('success', 'Profile Update Successfully', $this);
    }

    public function render()
    {
        $auth_user = auth()->user();
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(5);
        $total_orders = Order::where('user_id', auth()->user()->id)->get();
        $processing_orders = $total_orders->where('status', 'processing');
        $delivered_orders = $total_orders->where('status', 'delivered');
        $cancelled_orders = $total_orders->where('status', 'cancelled');

        return view('livewire.my-account', [
            'orders' => $my_orders,
            'auth_user' => $auth_user,
            'total_orders' => $total_orders,
            'processing_orders' => $processing_orders,
            'delivered_orders' => $delivered_orders,
            'cancelled_orders' => $cancelled_orders,
        ]);
    }
}
