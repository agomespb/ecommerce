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
        $produtosEmDestaque = $this->produtos->ofFeatured()->get();
        $produtosRecomendados = $this->produtos->ofRecommend()->get();
        $categorias = $this->categorias->list_all;

        return view('store.index', compact('categorias', 'produtosEmDestaque', 'produtosRecomendados'));
    }

    /**
     * Show the contact application.
     *
     * @return Response
     */
    public function contact()
    {
        return view('user.contact');
    }

    /**
     * Show the application For Category.
     *
     * @return Response
     */
    public function indexCategory($id)
    {
        $produtosEmDestaque = $this->produtos->ofFeatured($id)->get();
        $produtosRecomendados = $this->produtos->ofRecommend($id)->get();
        $categorias = $this->categorias->list_all;

        return view('store.index', compact('categorias', ['category_id' => $id], 'produtosEmDestaque', 'produtosRecomendados'));
    }

    /**
     * Show the application For Category.
     *
     * @return Response
     */
    public function productShow($id)
    {
        $produto = $this->produtos->find($id);
        $categorias = $this->categorias->list_all;
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
        $categorias = $this->categorias->list_all;

        return view('store.products_of_tag', compact('categorias', 'produtos', 'tag'));
    }

}
