<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminOrdersController extends Controller
{

    protected $orders;

    public function __construct(Order $order)
    {
        $this->orders = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = $this->orders->paginate(10);
        return view('pedido.index', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $message = "Status modificado com Sucesso. ID: {$id}";

        $this->orders->find($id)->update($request->all());
        return Response::json($message, 200);
    }


}
