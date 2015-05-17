<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Http\Controllers\Controller;
use AGCommerce\Category;
use AGCommerce\Product;

use Illuminate\Http\Request;

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
     * Show the application welcome screen to the user.
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

}
