<?php

namespace App\Interfaces;

interface AuthenticatableUser
{
    public function verifyPassword(string $password): bool;
}
