<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $table = 'products';

    public function pcomments(){


        return $this->hasMany('App\PComment', 'product_id', 'id');

    }
}
