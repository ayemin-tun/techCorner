<?php

namespace App\Livewire\Auth;

use App\Helpers\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | Login')]
class Login extends Component
{
    use LivewireAlert;
    public $email;
    public $password;
    public function login()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:225',
            'password' => 'required|min:6|max:225'
        ]);

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            Alert::message('error', 'Invalid crendials', $this);
            return;
        }
        Alert::message('success', 'Login Success', $this);
        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
