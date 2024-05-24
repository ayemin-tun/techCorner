<?php

namespace App\Livewire\Auth;

use App\Helpers\Alert;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | Forgot Password')]
class ForgotPassword extends Component
{
    use LivewireAlert;
    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:255'
        ]);
        $status = Password::sendResetLink(['email' => $this->email]);
        if ($status === Password::RESET_LINK_SENT) {
            Alert::message('success', 'Password reset link has been sent to your email address!', $this);
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
