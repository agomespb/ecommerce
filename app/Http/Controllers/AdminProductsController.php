<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;
use AGCommerce\Product;
use AGCommerce\Http\Requests\produto\ProductRequest;

class AdminProductsController extends Controller {

    private $produtos;

    public function __construct(Product $produtos){
        $this->produtos = $produtos;
    }

    /**
     * Lista todos os produtos de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $produtos = $this->produtos->paginate(5);
        return view('produto.index', compact('produtos'));
    }

    /**
     * Insere um novo produto em database.sqlite
     *
     * @return Response
     */
    public function create(Category $categoria)
    {
        $categorias = $categoria->lists('name', 'id');
        return view('produto.create', compact('categorias'));
    }

    /**
     * Consulta um produto em database.sqlite
     *
     * @return Response
     */
    public function show($id)
    {
        $produto = $this->produtos->find($id);
        return view('produto.show', compact('produto'));
    }


    /**
     * Insere uma produto em database.sqlite
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $Input = $request->all();
        $categoria = $this->produtos->fill($Input);
        $categoria->save();

        return redirect()->route('products');
    }

    /**
     * Exclui um produto em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = $this->produtos->find($id)->delete();
        return redirect()->route('products');
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function edit($id, Category $categoria)
    {
        $produto = $this->produtos->find($id);
        $categorias = $categoria->lists('name', 'id');
        return view('produto.edit', compact('produto', 'categorias'));
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {

        $this->produtos->find($id)->update($request->all());
        return redirect()->route('products');
    }
}
