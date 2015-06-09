<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Http\Requests;
use AGCommerce\Product;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = [];
        $auth = $this->auth->User();
        $orders = $auth->orders()->orderBy('created_at', 'desc')->get();

        if(count($orders))
        {
            $items = $orders->first()->items()->get();
        }

        return view('user.account', compact('auth', 'orders', 'items'));
    }

}
