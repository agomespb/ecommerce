<?php namespace AGCommerce\Http\Controllers;


use AGCommerce\Category;
use AGCommerce\Product;

class WelcomeController extends Controller {

    private $categorias;
    private $produtos;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Category $categorias, Product $produtos)
	{
		$this->middleware('guest');
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
        $produtos = $this->produtos->paginate(6);
        $categorias = $this->categorias->lists('name', 'id');


        return view('template', compact('produtos', 'categorias'));
	}


}
