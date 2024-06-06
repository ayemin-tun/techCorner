<?php

namespace App\Livewire\Auth;

use App\Helpers\Alert;
use App\Models\Customer;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('TechCorner | Reset Password')]
class ResetPassword extends Component
{
    use LivewireAlert;

    public $token;

    #[Url]
    public $email;

    public $password;

    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function save()
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (Customer $user, string $password) {
                $password = $this->password;
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            Alert::message('success', 'Password reset success!', $this);

            return redirect('/login');
        } else {
            Alert::message('error', 'Something went wrong!', $this);
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
