<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addComment(Request $request){
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
            'comment' => $request->comment
        ]);

        return back()->with('success','Комментарий Добавлен');

    }
}
