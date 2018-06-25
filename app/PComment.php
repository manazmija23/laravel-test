<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PComment extends Model
{


    protected $fillable = array('name', 'email', 'body', 'product_id');

    public function product(){


        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
