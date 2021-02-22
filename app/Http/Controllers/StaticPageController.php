<?php

namespace App\Http\Controllers;

Use App\Type;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function home()
    {

        return view('welcome');
    }

    public function advancedResearch()
    {
        return view('advancedResearch');
    }

}
