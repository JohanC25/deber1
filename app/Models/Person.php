<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Person extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function getFullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
