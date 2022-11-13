<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * List Posts
     * @param Request $request
     * @return JsonResponse
     */
    public function listPosts(Request $request)
    {
        $posts = Post::all();

        return response()->json($posts->load('author')->toArray(), 200);
    }
    /**
     * Show Post
     * @param Request $request
     * @return JsonResponse
     */
    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post->load('author')->toArray(), 200);
    }
}
