<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $incrementing = false;

    public function comment_user()
    {
        return $this->belongsTo('\App\Models\User', 'comment_user_id');
    }
}
