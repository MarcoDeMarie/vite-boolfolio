<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use App\Models\Technology;
class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        $types = Type::all();
        $technologies = Technology::all();


        return response()->json(compact('posts','types','technologies'));

    }

    public function getTypes(){

        $type = Type::all();

        return response()->json($type);
    }
}
