<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected $keyType = 'string';

    /**
     * Insert the given attributes and set the ID on the model.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array  $attributes
     * @return void
     */
    protected function insertAndSetId(Builder $query, $attributes)
    {
        $id = $query->insertGetId($attributes, $this->getKeyName());

        $this->setAttribute('auto_pk', $id);
    }

    /**
     * Get post user
     *
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
