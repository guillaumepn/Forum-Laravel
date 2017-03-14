<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $casts = [
        'author' => 'integer'
    ];
    protected $fillable = [
        'title',
        'content',
        'author'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'author');
    }
}
