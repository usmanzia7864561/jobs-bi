<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return JsonResponse
     */
    public function listComments(Request $request)
    {
        $posts = Comment::all();

        return response()->json($posts->load('post')->load('author')->toArray(), 200);

        return response()->json(Rai::where(function($query) use ($user_id){
            $query->where('user_id', $user_id)->orWhere('user_id', NULL);
        })->where('annee', $annee)->where('mois', $mois)->where('code', $code)->where('deleted_at', null)->get());

    }
}
