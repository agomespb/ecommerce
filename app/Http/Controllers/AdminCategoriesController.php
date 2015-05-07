<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;


class AdminCategoriesController extends Controller {


    private $Categorias;

    public function __construct(Category $Categorias){
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

}
