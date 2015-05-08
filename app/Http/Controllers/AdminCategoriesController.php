<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;


class AdminCategoriesController extends Controller {


    private $Categorias;

    public function __construct(Category $Categorias)
    {
        $this->Categorias = $Categorias;
    }

    /**
     * Lista todas as categorias de database.sqlite
     *
     * @return Response
     */
	public function index()
	{
        $Categorias = $this->Categorias->all();
		return view('categoria.index', compact('Categorias'));
	}

    /**
     * Insere uma nova categorias em database.sqlite
     *
     * @return Response
     */
	public function create()
	{
		return view('categoria.create');
	}

    /**
     * Consulta uma categoria em database.sqlite
     *
     * @return Response
     */
	public function show($id)
	{
        $Categoria = $this->Categorias->find($id);
        return view('categoria.show', compact('Categoria'));
	}

}
