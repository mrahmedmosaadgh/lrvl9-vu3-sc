<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function userdata()
    {
        try {
            //code...

        return response()->json([
            'message' =>'userdata',
            'data'    =>Auth::user(),
            'Auth'    => Auth::check(),
        ]);

    } catch (\Throwable $th) {
                return response()->json([
            'message' =>'error',
            'data' =>$th,
            'Auth' => Auth::check(),
        ]);

    }





    }

    public function index()
    {
        return PostResource::collection(Post::latest()->take(4)->get());
    }
}
