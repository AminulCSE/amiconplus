<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
    // public function index()
    // {
    //     return view('home');
    // }
    // All order with customer table
    public function home(){
        $all_order = DB::table('orders')
                    ->join('customers', 'orders.customer_id', 'customers.id')
                    ->select('orders.*', 'customers.customer_name', 'customers.customer_phone','customers.customer_email','customers.customer_address')
                    ->orderBy('orders.id', 'DESC')
                    ->paginate(15);

        // Today order
        $today_sale = DB::table('orders')
                    ->where('order_date', date('d/F/Y'))
                    ->get();

        // Monthly order
        $total_sale = DB::table('orders')
                    ->get();
        
        // ALL Order to count order     
        $allorder = DB::table('orders')->get();

        // ALL Pending Order count 
        $orderstatus = DB::table('orders')
                        ->where('order_status', '0')
                        ->get();

        return view('adminhome', compact('all_order', 'today_sale', 'total_sale', 'orderstatus', 'allorder'));
    }
}
