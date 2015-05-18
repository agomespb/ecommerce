<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $category_id;

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

    /**
     * Retorna os Produtos em Destaque.
     *
     * @param $query
     * @return mixed
     */
    public function scopeFeaturedCategory($query)
    {
        return $query->where('featured','=',1)->where('category_id', '=', $this->getCategoryId());
    }

    /**
     * Retorna os Produtos Recomendados.
     *
     * @param $query
     * @return mixed
     */
    public function scopeRecommendCategory($query)
    {
        return $query->where('recommend','=',1)->where('category_id', '=', $this->getCategoryId());
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }



}
