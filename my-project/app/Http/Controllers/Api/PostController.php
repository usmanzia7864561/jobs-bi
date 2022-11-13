<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

    public function create(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),
            [
                'comment' => 'required|max:255',
                'post_id' => 'required|exists:posts,id'
            ]);

            if($validate->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }

            Post::create([
                'comment' => $request->comment,
                'post_id' => $request->post_id,
                'author_id' => $request->user()->id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Comment Created Successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}