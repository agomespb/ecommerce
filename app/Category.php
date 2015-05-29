<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = ['name', 'description'];


    /**
     * <b>Products</b>
     * Retorna todos os produtos da categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('AGCommerce\Product');
    }

    public function getListAllAttribute()
    {
        return $this->lists('name', 'id');
    }

}
