<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

    /**
     * <b>Category</b>
     * Retorna a categoria ao qual o produto pertence.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('AGCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('AGCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('AGCommerce\Tag');
    }

    /**
     * Retorna os Produtos em Destaque.
     *
     * @param $query
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured','=',1);
    }

    /**
     * Retorna os Produtos Recomendados.
     *
     * @param $query
     * @return mixed
     */
    public function scopeRecommend($query)
    {
        return $query->where('recommend','=',1);
    }


}
