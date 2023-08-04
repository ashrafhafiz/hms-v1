<?php

namespace App\Http\Controllers\Php;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Php\UserBuilder;

class CodingController extends Controller
{
    public function index()
    {
        // Use the builder to create a user object
        // $builder = new UserBuilder();
        $user = (new UserBuilder())
            ->withName('John Doe')
            ->withEmail('johndoe@example.com')
            ->withPassword('password123')
            ->build();

        echo $user->getName(); // Output: John Doe
        echo $user->getEmail(); // Output: johndoe@example.com
        echo $user->getPassword(); // Output: password123


    }
}
