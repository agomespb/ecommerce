<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {

    protected $fillable = ['product_id', 'extension'];

    public function product()
    {
        return $this->belongsTo('AGCommerce\Product');
    }

    public function getImageFileNameAttribute()
    {
        return $this->id . '.' . $this->extension;
    }

}
