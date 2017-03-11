<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'email', 'password',
    ];

    /**
     * Get user all posts
     *
     * @return \App\Models\Post
     */
    public function user_posts()
    {
        return $this->hasMany('\App\Models\Post', 'post_user_id', 'id')
            ->orderBy('updated_at', 'desc');
    }
}
