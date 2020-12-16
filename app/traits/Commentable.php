<?php
namespace App\Traits;

use App\Traits;


trait Commentable 
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}