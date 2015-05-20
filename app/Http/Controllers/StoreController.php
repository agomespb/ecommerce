<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Category;
use AGCommerce\Product;
use AGCommerce\Tag;

class StoreController extends Controller {

    private $categorias;
    private $produtos;

    /**
     * @return void
     */
    public function __construct(Category $categorias, Product $produtos)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }

    /**
     * Show the application.
     *
     * @return Response
     */
    public function index()
    {
        $produtosEmDestaque = $this->produtos->featured()->get();
        $produtosRecomendados = $this->produtos->recommend()->get();
        $categorias = $this->categorias->lists('name', 'id');

        return view('store.index', compact('categorias', 'produtosEmDestaque', 'produtosRecomendados'));
    }

    /**
     * Show the application For Category.
     *
     * @return Response
     */
    public function indexCategory($id)
    {
        $category_id = $id;
        $this->produtos->setCategoryId($id);

        $produtosEmDestaque = $this->produtos->featured()->get();
        $produtosRecomendados = $this->produtos->recommend()->get();
        $categorias = $this->categorias->lists('name', 'id');

        return view('store.index', compact('categorias', 'category_id', 'produtosEmDestaque', 'produtosRecomendados'));
    }

    /**
     * Show the application For Category.
     *
     * @return Response
     */
    public function productShow($id)
    {
        $produto = $this->produtos->find($id);
        $categorias = $this->categorias->lists('name', 'id');
        return view('store.product_show', compact('categorias', 'produto'));
    }

    /**
     * Show the application For Tag.
     *
     * @return Response
     */
    public function tagProducts($id, Tag $tags)
    {
        $tag = $tags->find($id);
        $produtos = $tag->products;
        $categorias = $this->categorias->lists('name', 'id');

        return view('store.products_of_tag', compact('categorias', 'produtos', 'tag'));
    }

}
