<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Cart;
use AGCommerce\Http\Requests;
use AGCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;

    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();
        $produto = Product::find($id);
        $image = $produto->images->first()->imageFileName;

        $cart->add($id, $produto->name, $produto->price, $image);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function minus($id)
    {
        $cart = $this->getCart();
        $cart->minus($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }

}
