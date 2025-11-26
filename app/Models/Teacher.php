<?php

namespace App\Models;

use App\Interfaces\AuthenticatableUser;
use Illuminate\Support\Facades\Hash;

class Teacher extends Person
{
    protected $table = 'teachers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    // Example of secure password setting
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }

    public function verifyPassword(string $password): bool
    {
        return Hash::check($password, $this->password);
    }
}
