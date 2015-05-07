<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Product;

class AdminProductsController extends Controller {

    private $Produtos;

    public function __construct(Product $Produtos){
        $this->Produtos = $Produtos;
    }

    /**
     * Lista todos os produtos de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $Produtos = $this->Produtos->all();
        return view('produto.index', compact('Produtos'));
    }

}
