<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Http\Requests\UserAddressRequest;
use AGCommerce\UserEndereco;
use Illuminate\Support\Facades\Auth;


class UserAddressController extends Controller
{
    protected $auth;
    protected $address;

    public function __construct(UserEndereco $address)
    {
        $this->address = $address;
    }

    /**
     * Exibe formulário para o usuário registrar seu(s) endereço(s)
     *
     * @return Response
     */
    public function create()
    {
        $partial = 'form-endereco';
        return view('user.account', compact('partial'));
    }

    /**
     * Grava o endereço do usuário
     *
     * @return Response
     */
    public function store(UserAddressRequest $request)
    {
        $Inputs = $request->all();
        $Inputs['user_id'] = Auth::User()->id;

        $endereco = $this->address->fill($Inputs);
        $endereco->save();

        return redirect()->route('user_index');
    }


    /**
     * Exclui o endereço especifica pelo id.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->address->find($id);
        $address->delete();

        return redirect()->route('user_index');
    }

}
