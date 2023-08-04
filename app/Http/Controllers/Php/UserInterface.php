<?php

namespace App\Http\Controllers\Php;

// Define the User interface
interface UserInterface
{
    public function getName(): string;
    public function getEmail(): string;
    public function getPassword(): string;
}
