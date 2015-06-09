<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Events\CheckoutEvent;
use AGCommerce\Http\Requests;
use AGCommerce\Order;
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

        $data = [
            'user_id' => Auth::User()->id,
            'total' => $this->cart->getTotal()
        ];

        $order = $this->order->create($data);

        foreach ($this->cart->all() as $id => $item) {
            $order->items()->create([
                'product_id' => $id,
                'qtde' => $item['qtde'],
                'price' => $item['price']
            ]);
        }

        $this->cart->clear();

        event(new CheckoutEvent(Auth::User()));

        return redirect()->route('checkout');

    }

    public function checkout()
    {

        $orders = Auth::User()->orders()->get();
        return view('store.checkout', compact('orders'));

    }

}
