<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;

class WelcomeController extends Controller {

    private $Categorias;


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Category $categoria)
	{
		$this->middleware('guest');
        $this->Categorias = $categoria;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	/**
	 * Lista todas as categorias do database.sqlite
	 *
	 * @return Response
	 */
	public function exemplo()
	{
        $Categorias = $this->Categorias->all();

		return view('exemplo.exemplo', compact('Categorias'));
	}

}
