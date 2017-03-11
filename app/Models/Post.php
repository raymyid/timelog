<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    public $incrementing = false;

    /**
     * Get post user
     *
     * @return \App\Models\User
     */
    public function post_user()
    {
        return $this->belongsTo('\App\Models\User', 'post_user_id');
    }

    public function post_comments()
    {
        return $this->hasMany('\App\Models\Comment', 'comment_post_id', 'id')
            ->orderBy('created_at', 'asc');
    }
}
