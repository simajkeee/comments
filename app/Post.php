<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function addComment(array $attributes)
    {
        $comment = (new Comment)->fill($attributes);
        $this->comments()->save($comment);
    }

    public function getTreeComments($order = 'created_at')
    {
        $allComments = $this->getAllComments($order);
        return (new CommentsCollection($allComments))->threaded();
    }

    public function getAllComments($order, $direction = 'desc')
    {
        return $this->comments()->orderBy($order, $direction)->get();
    }
}
