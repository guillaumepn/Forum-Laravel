<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function post(Request $request) {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->author = Auth::id();
        $comment->thread = $request->threadId;

        $comment->save();

        Session::flash('alert-success', 'Comment was successfully created !');

        $thread = Thread::findOrFail($request->threadId);
        $thread->save();
        $comments = Comment::where('thread', $request->threadId)->orderBy('updated_at', 'asc')->get();
        return view('thread', ['id' => $request->threadId, 'thread' => $thread, 'comments' => $comments]);
    }
}
