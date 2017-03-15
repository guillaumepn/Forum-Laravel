<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ThreadController extends Controller
{
    public function show($id) {
        $thread = Thread::findOrFail($id);
        $comments = Comment::where('thread', $id)->orderBy('updated_at', 'asc')->get();
        return view('thread', ['thread' => $thread, 'comments' => $comments]);
    }

    public function post(Request $request) {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Thread was successfully created !');

        $comments = Comment::where('thread', $request->id)->orderBy('updated_at', 'asc')->get();
        return view('thread', ['id' => $request->id, 'thread' => $thread, 'comments' => $comments]);
    }
}
