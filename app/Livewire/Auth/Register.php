<?php

namespace App\Livewire\Auth;

use App\Helpers\Alert;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | Register')]
class Register extends Component
{
    use LivewireAlert;
    public $name;
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:225',
            'password' => 'required|min:6|max:225'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        auth()->login($user);
        Alert::message('success', 'Registered Success', $this);
        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
