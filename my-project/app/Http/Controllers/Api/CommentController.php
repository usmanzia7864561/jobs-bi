<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * List Comment
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request)
    {
        $posts = Comment::all();

        return response()->json($posts->load('post')->load('author')->toArray(), 200);
    }

    /**
     * Show Comment
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return response()->json($comment->load(['post', 'author'])->toArray(), 200);
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

            Comment::create([
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
