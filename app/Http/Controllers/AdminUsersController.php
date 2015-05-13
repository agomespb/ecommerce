<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\User;
use AGCommerce\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class AdminUsersController extends Controller {

    private $usuarios;
    private $page;
    private $request;

    public function __construct(User $users, Request $request)
    {
        $this->request = $request;
        $this->usuarios = $users;
    }

    /**
     * Consulta um Usuário em database.sqlite
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        $page = $this->getPage();
        $usuario = $this->usuarios->find($id);
        return view('user.show', compact('usuario', 'page'));
    }

    /**
     * Lista todos os usuários de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $page = $this->getPage();
        $usuarios = $this->usuarios->paginate(5);
        return view('user.index', compact('usuarios', 'page'));
    }

    /**
     * Formulario de cadastro do Usuário.
     *
     * @return Response
     */
    public function create()
    {
        $page = $this->getPage();
        return view('user.create', compact('page'));
    }

    /**
     * Insere o Usuário em database.sqlite
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        $usuario = $this->usuarios->fill($input);
        $usuario->save();

        return redirect()->route('users');
    }

    /**
     * Exclui um Usuário em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuario = $this->usuarios->find($id)->delete();
        return redirect()->route('users');
    }

    /**
     * Editar/Alualizar Usuario em database.sqlite
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuario = $this->usuarios->find($id);
        return view('user.edit', compact('usuario'));
    }

    /**
     * Editar/Alualizar um Usuário em database.sqlite
     *
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {

        $this->usuarios->find($id)->update($request->all());
        return redirect()->route('users');
    }

    /**
     * @return string
     * @internal param Request $request
     */
    private function getPage()
    {
        $page = 1;

        if(!is_null($this->request->get('page'))):
            $page = $this->request->get('page');
        endif;

        return $this->Page = '?page=' . $page;
    }
}
