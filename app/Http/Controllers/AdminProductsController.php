<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Product;
use AGCommerce\Http\Requests\produto\ProductRequest;

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


    /**
     * Insere uma Produto em database.sqlite
     *
     * @return Response
     */
    public function store(ProductRequest $Request)
    {
        $Input = $Request->all();
        $Categoria = $this->Produtos->fill($Input);
        $Categoria->save();

        return redirect()->route('products');
    }

    /**
     * Exclui um Produto em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $Categoria = $this->Produtos->find($id)->delete();
        return redirect()->route('products');
    }

    /**
     * Editar/Alualizar um Produto em database.sqlite
     *
     * @return Response
     */
    public function edit($id)
    {
        $Produto = $this->Produtos->find($id);
        return view('produto.edit', compact('Produto'));
    }

    /**
     * Editar/Alualizar um Produto em database.sqlite
     *
     * @return Response
     */
    public function update(ProductRequest $Request, $id)
    {
        $this->Produtos->find($id)->update($Request->all());
        return redirect()->route('products');
    }
}
