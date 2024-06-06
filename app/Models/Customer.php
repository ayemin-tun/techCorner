<?php

namespace App\Models;

use App\Models\Scopes\CustomerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Change to extend Authenticatable
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'users'; // Ensure it uses the 'users' table

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    protected $hidden = ['password'];

    protected static function booted()
    {
        static::addGlobalScope(new CustomerScope());

        static::created(function ($customer) {
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Customer']);
            $customer->assignRole($role);
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
