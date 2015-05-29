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
    public function scopeOfFeatured($query, $category_id = null)
    {
        $featured = $query->where('featured','=',1);

        if( $category_id )
            $featured = $featured->where('category_id', '=', $category_id);

        return $featured;
    }

    /**
     * Retorna os Produtos Recomendados.
     *
     * @param $query
     * @return mixed
     */
    public function scopeOfRecommend($query, $category_id = null)
    {
        $recommend = $query->where('recommend','=',1);

        if( $category_id )
            $recommend = $recommend->where('category_id', '=', $category_id);

        return $recommend;
    }


}
