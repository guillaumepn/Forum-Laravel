<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index() {
        $myThreads = Thread::where('author', Auth::id())->paginate(15);
        $commentsPerThread = array();
        foreach ($myThreads as $thread) {
            $commentsPerThread[$thread->id] = Comment::where('thread', $thread->id)->count();
        }
        $myComments = Comment::where('author', Auth::id())->paginate(15);
        return view('messages', ['myThreads' => $myThreads, 'commentsPerThread' => $commentsPerThread, 'myComments' => $myComments]);
    }
}
