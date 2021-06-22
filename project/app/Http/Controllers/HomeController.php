<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\People;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $params = [
            'total_orders' => Order::all()->count(),
            'total_clients' => People::all()->count(),
            'total_products' => Product::all()->count(),
        ];
        return view('home', $params);
    }
}
