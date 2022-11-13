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
    public function list(Request $request)
    {
        $posts = Post::withCount(['comments'])->get();
        dd($posts->sortByDesc('comments_count'));

        return response()->json($posts->load('author')->toArray(), 200);
    }

    /**
     * Show Post
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post->load('author')->toArray(), 200);
    }

    public function create(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),
            [
                'title' => 'required|max:64',
                'description' => 'required'
            ]);

            if($validate->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }

            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'author_id' => $request->user()->id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Post Created Successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
