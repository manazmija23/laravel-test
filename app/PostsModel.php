<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{

    public function comments(){

        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    protected $table = 'posts';


}
