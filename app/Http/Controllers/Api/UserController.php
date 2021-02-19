<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // return 'lista ristoranti';

        $user = User::all();
        dd($user);
    }
}
