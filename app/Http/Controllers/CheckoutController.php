<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Order;
use AGCommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    protected $car;

    protected $order;

    public function __construct(Order $orderModel)
    {

        $this->middleware('auth');

        if (Session::has('cart')) {
            $this->cart = Session::get('cart');
        }

        $this->order = $orderModel;

    }

    public function place()
    {

        if (!$this->cart->getTotal()) {
            return redirect()->route('cart');
        }

        $user = Auth::User();
        $order = $this->order->create(['user_id' => $user->id, 'total' => $this->cart->getTotal()]);

        foreach ($this->cart->all() as $id => $item) {
            $order->items()->create([
                'product_id' => $id,
                'qtde' => $item['qtde'],
                'price' => $item['price']
            ]);
            $this->cart->remove($id);
        }

        return redirect()->route('checkout_order');

    }

    public function order(Product $product)
    {
        $produto = $product;
        $orders = $this->order->where('user_id', '=', Auth::User()->id)->orderBy('created_at', 'desc')->get();

        return view('store.order', compact('orders', 'produto'));
    }

}
