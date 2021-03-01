<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Type;
use App\Plate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // return 'lista ristoranti';

        $restaurants = DB::table('users')
        ->select('*')
        ->join('type_user','users.id', '=', 'type_user.user_id')
        ->join('types','types.id','=', 'type_user.type_id')
        ->get();


        // return response()->json($user);
        return response()->json($restaurants);
    }

    public function type() {
        // return 'lista ristoranti';

        $types = Type::all();



        // return response()->json($user);
        return response()->json($types);
    }

    public function plate() {
        // return 'lista ristoranti';

        $plates = Plate::all();



        // return response()->json($user);
        return response()->json($plates);
    }

    
}
