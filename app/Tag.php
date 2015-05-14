<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    public function products()
    {
        return $this->belongsToMany('AGCommerce\Product');
    }

}
