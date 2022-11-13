<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Enum\UserRoleEnum;

class CommentController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * List Comment
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $posts = Comment::all();

        return response()->json($posts->load('post')->load('author')->toArray(), 200);
    }

    /**
     * Show Comment
     *
     * @param Comment $comment
     * @return JsonResponse
     */
    public function show(Comment $comment)
    {
        return response()->json($comment->load(['post', 'author'])->toArray(), 200);
    }

    public function store(Request $request)
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

    /**
     * Show Comment
     *
     * @return JsonResponse
     */
    public function destroy(Comment $comment)
    {
        return response()->json($comment->delete(), 200);
    }

    /**
     * Show Comment
     *
     * @return JsonResponse
     */
    public function restore(Comment $comment)
    {
        return response()->json($comment->restore(), 200);
    }
}
