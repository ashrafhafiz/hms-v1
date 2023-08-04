<?php

namespace App\Http\Controllers\Php;

use App\Http\Controllers\Php\UserInterface;
use Illuminate\Http\Request;

// Define the User class
class User implements UserInterface
{
    public $name;
    public $email;
    public $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}