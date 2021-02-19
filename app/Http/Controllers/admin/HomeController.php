<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index() {

        // $user=User::all();
        $user = User::find(Auth::id());
        
        // dd($type->user);
        
        return view('admin/dashboard', compact('user'));
    }
}
