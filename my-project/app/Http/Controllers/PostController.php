<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return JsonResponse
     */
    public function listPosts(Request $request)
    {
        $posts = Post::all();

        return response()->json($posts->load('author')->toArray(), 200);

        return response()->json(Rai::where(function($query) use ($user_id){
            $query->where('user_id', $user_id)->orWhere('user_id', NULL);
        })->where('annee', $annee)->where('mois', $mois)->where('code', $code)->where('deleted_at', null)->get());

    }
}
