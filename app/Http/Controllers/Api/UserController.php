<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // return 'lista ristoranti';

        $user = User::all();
        // $type = Type::auth($user->id)
        // dd($user);

        // foreach ($users as $user) {
        //     $restaurants = DB::table('type_restaurants')->where('restaurant_id', '=', 'restaurant')->get();
        // }


        // return response()->json($user);
        return response()->json($user);
    }
}
