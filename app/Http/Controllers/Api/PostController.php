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


    ///////////////////////////////////////////////////////////////

    public function getTypes(){

        $type = Type::all();

        return response()->json($type);
    }


    /////////////////////////////////////////////////////////

    public function getPostDetail($slug){

        $post = Post::where('slug', $slug)->with('type', 'technologies')->first();
        if($post->image_path) $post->image_path = asset('storage/' . $post->image_path) ;
        else{
            $post->image_path = asset('storage/uploads/placeholder.png') ;
            $post->image_original_name = '- no image -';
        }
        return response()->json($post);
    }

}
