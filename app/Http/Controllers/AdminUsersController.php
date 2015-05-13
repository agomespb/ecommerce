<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\User;
use AGCommerce\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class AdminUsersController extends Controller {

    private $Usuarios;
    private $Page;
    private $Request;

    public function __construct(User $Users, Request $Request)
    {
        $this->Request = $Request;
        $this->Usuarios = $Users;
    }

    /**
     * Consulta um Usuário em database.sqlite
     *
     * @return Response
     */
    public function show($id, Request $Request)
    {
        $Page = $this->getPage();
        $Usuario = $this->Usuarios->find($id);
        return view('user.show', compact('Usuario', 'Page'));
    }

    /**
     * Lista todos os usuários de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $Page = $this->getPage();
        $Usuarios = $this->Usuarios->paginate(5);
        return view('user.index', compact('Usuarios', 'Page'));
    }

    /**
     * Formulario de cadastro do Usuário.
     *
     * @return Response
     */
    public function create()
    {
        $Page = $this->getPage();
        return view('user.create', compact('Page'));
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
     * Editar/Alualizar Usuario em database.sqlite
     *
     * @return Response
     */
    public function edit($id)
    {
        $Usuario = $this->Usuarios->find($id);
        return view('user.edit', compact('Usuario'));
    }

    /**
     * Editar/Alualizar um Produto em database.sqlite
     *
     * @return Response
     */
    public function update(UserRequest $Request, $id)
    {

        $this->Usuarios->find($id)->update($Request->all());
        return redirect()->route('users');
    }

    /**
     * @return string
     * @internal param Request $Request
     */
    private function getPage()
    {
        $page = 1;

        if(!is_null($this->Request->get('page'))):
            $page = $this->Request->get('page');
        endif;

        return $this->Page = '?page=' . $page;
    }
}
