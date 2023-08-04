<?php

namespace App\Http\Controllers\Php;

use Illuminate\Http\Request;
use App\Http\Controllers\Php\User;

// Define the UserBuilder class
class UserBuilder
{
    private $user;

    public function __construct()
    {
        $this->user = new User('', '', '');
    }

    public function withName(string $name): self
    {
        $this->user->name = $name;
        return $this;
    }

    public function withEmail(string $email): self
    {
        $this->user->email = $email;
        return $this;
    }

    public function withPassword(string $password): self
    {
        $this->user->password = $password;
        return $this;
    }

    public function build(): UserInterface
    {
        return $this->user;
    }
}
