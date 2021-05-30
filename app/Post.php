<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $guarded = [];

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
