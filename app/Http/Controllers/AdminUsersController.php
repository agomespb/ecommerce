<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\User;
use AGCommerce\Http\Requests\UserRequest;

class AdminUsersController extends Controller {

    private $Usuarios;

    public function __construct(User $Users){
        $this->Usuarios = $Users;
    }

    /**
     * Lista todos os usuários de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $Usuarios = $this->Usuarios->paginate(5);
        return view('user.index', compact('Usuarios'));
    }

    /**
     * Formulario de cadastro do Usuário.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Insere o Usuário em database.sqlite
     *
     * @return Response
     */
    public function store(UserRequest $Request)
    {
        $Input = $Request->all();
        $Usuario = $this->Usuarios->fill($Input);
        $Usuario->save();

        return redirect()->route('users');
    }

    /**
     * Exclui um Produto em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $Usuario = $this->Usuarios->find($id)->delete();
        return redirect()->route('users');
    }

    /**
     * Consulta um produto em database.sqlite
     *
     * @return Response
     */
    public function show($id)
    {
//        $Usuario = $this->Usuarios->find($id);
//        return view('user.show', compact('Usuario'));
    }

    /**
     * Editar/Alualizar um Produto em database.sqlite
     *
     * @return Response
     */
    public function edit($id, Category $Categoria)
    {
//        $Produto = $this->Produtos->find($id);
//        $Categorias = $Categoria->lists('name', 'id');
//        return view('produto.edit', compact('Produto', 'Categorias'));
    }

    /**
     * Editar/Alualizar um Produto em database.sqlite
     *
     * @return Response
     */
    public function update(ProductRequest $Request, $id)
    {

//        $this->Produtos->find($id)->update($Request->all());
//        return redirect()->route('products');
    }
}
