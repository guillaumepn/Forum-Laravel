<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $casts = [
        'author' => 'integer',
        'thread' => 'integer'
    ];

    protected $fillable = [
        'content',
        'author',
        'thread'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'author');
    }

    public function topic() {
        return $this->belongsTo(Thread::class, 'thread');
    }
}
