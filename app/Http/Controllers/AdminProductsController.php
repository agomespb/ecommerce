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

    /**
     * Insere um novo produto em database.sqlite
     *
     * @return Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Consulta um produto em database.sqlite
     *
     * @return Response
     */
    public function show($id)
    {
        $Produto = $this->Produtos->find($id);
        return view('produto.show', compact('Produto'));
    }
}
