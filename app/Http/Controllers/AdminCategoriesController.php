<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;
use AGCommerce\Http\Requests\categoria\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


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

    /**
     * Insere uma categoria em database.sqlite
     *
     * @return Response
     */
	public function store(CategoryRequest $Request)
	{
        $Input = $Request->all();
        $Categoria = $this->Categorias->fill($Input);
        $Categoria->save();

        return redirect()->route('categories');
	}

    /**
     * Exclui uma categoria em database.sqlite
     *
     * @return Response
     */
	public function destroy($id)
	{
        $Categoria = $this->Categorias->find($id)->delete();
        return redirect()->route('categories');
	}

    /**
     * Editar/Alualizar uma categoria em database.sqlite
     *
     * @return Response
     */
	public function edit($id)
	{
        $Categoria = $this->Categorias->find($id);
        return view('categoria.edit', compact('Categoria'));
	}

    /**
     * Editar/Alualizar uma categoria em database.sqlite
     *
     * @return Response
     */
	public function update(CategoryRequest $Request, $id)
	{
        $this->Categorias->find($id)->update($Request->all());
        return redirect()->route('categories');
	}

}
