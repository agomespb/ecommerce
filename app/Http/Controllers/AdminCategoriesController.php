<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;
use AGCommerce\Http\Requests\categoria\CategoryRequest;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller {

    private $categorias;

    public function __construct(Category $categorias)
    {
        $this->categorias = $categorias;
    }

    /**
     * Lista todas as categorias de database.sqlite
     *
     * @return Response
     */
	public function index()
	{
//        dd($this->categorias->find(1)->Products);

        $categorias = $this->categorias->paginate(5);
		return view('categoria.index', compact('categorias'));
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
        $categoria = $this->categorias->find($id);
        return view('categoria.show', compact('categoria'));
	}

    /**
     * Insere uma categoria em database.sqlite
     *
     * @return Response
     */
	public function store(CategoryRequest $request)
	{
        $Input = $request->all();
        $Categoria = $this->categorias->fill($Input);
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
        $categoria = $this->categorias->find($id);

        if( count($categoria->products) ):
            Session::flash('flash_message', 'Não é possível excluir. Existem produtos relacionados a esta categoria.');
        else:
            $categoria->delete();
            Session::flash('flash_message', 'Categoria excluída com sucesso!');
        endif;

        return redirect()->route('categories');
	}

    /**
     * Editar/Alualizar uma categoria em database.sqlite
     *
     * @return Response
     */
	public function edit($id)
	{
        $categoria = $this->categorias->find($id);
        return view('categoria.edit', compact('categoria'));
	}

    /**
     * Editar/Alualizar uma categoria em database.sqlite
     *
     * @return Response
     */
	public function update(CategoryRequest $request, $id)
	{
        $this->categorias->find($id)->update($request->all());
        return redirect()->route('categories');
	}

}
