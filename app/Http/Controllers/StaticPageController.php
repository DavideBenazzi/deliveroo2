<?php

namespace App\Http\Controllers;

Use App\Type;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function home()
    {
        $types = Type::all();
        // $restaurants = Restaurant::all();
        // dd($types);
        return view('welcome', compact('types'));
    }
}
