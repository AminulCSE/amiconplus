<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
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

    public function index(){
    	$allorder = DB::table('orders')
            		->join('customers', 'orders.customer_id', 'customers.id')
            		->select('orders.*', 'customers.customer_name', 'customers.customer_phone','customers.customer_email','customers.customer_address')
            		->orderBy('orders.id', 'DESC')
            		->get();
        return view('admin.orders.all_order', compact('allorder'));
    }

    public function create(){
    	$customers = DB::table('customers')->get();
    	return view('admin.orders.add_order', compact('customers'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'order_date' 		=> 'required|max:255',
	        'customer_id' 		=> 'required|max:15',
	        'order_description' => 'max:255',
	        'quantity' 			=> 'required|max:255',
	        'unit_price' 		=> 'required|max:255',
	        'discount' 			=> 'max:255',
	        'paid' 				=> 'max:255',
	        'dalivary_date' 	=> 'max:255',
	        'order_month' 		=> 'max:255',
	        'order_year' 		=> 'max:255'
    	]);

    	$data = array();

    	$data['order_date'] 		= $request->order_date;
    	$data['customer_id'] 		= $request->customer_id;
    	$data['order_description'] 	= $request->order_description;
    	$data['quantity'] 			= $request->quantity;
    	$data['unit_price'] 		= $request->unit_price;
    	$data['discount'] 			= $request->discount;
    	$data['paid'] 				= $request->paid;
    	$data['dalivary_date'] 		= $request->dalivary_date;
    	$data['order_month'] 		= $request->order_month;
    	$data['order_year'] 		= $request->order_year;

    	$datainsert = DB::table('orders')->insert($data);

    	if($datainsert){
    		$notification = array(
            	'message'=>'Order placed Succesfully',
            	'alert-type'=>'success'
            );
        	return back()->with($notification);
    	}
    }

    public function edit($id){
    	$data = DB::table('orders')->where('id', $id)->first();
    	$customerdata = DB::table('customers')->get();
    	return view('admin.orders.edit_order', compact('data', 'customerdata'));
    }

    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'customer_id' 		=> 'required|max:15',
	        'order_description' => 'max:255',
	        'quantity' 			=> 'required|max:255',
	        'unit_price' 		=> 'required|max:255',
	        'discount' 			=> 'max:255',
	        'paid' 				=> 'max:255',
	        'dalivary_date' 	=> 'max:255',
	        'order_month' 		=> 'max:255',
	        'order_year' 		=> 'max:255',
	        'order_status' 		=> 'max:255'
    	]);

    	$data = array();

    	$data['customer_id'] 		= $request->customer_id;
    	$data['order_description'] 	= $request->order_description;
    	$data['quantity'] 			= $request->quantity;
    	$data['unit_price'] 		= $request->unit_price;
    	$data['discount'] 			= $request->discount;
    	$data['paid'] 				= $request->paid;
    	$data['dalivary_date'] 		= $request->dalivary_date;
    	$data['order_month'] 		= $request->order_month;
    	$data['order_year'] 		= $request->order_year;
    	$data['order_status'] 		= $request->order_status;


    	$dataupdate = DB::table('orders')
    				->where('id', $id)
    				->update($data);

    	if($dataupdate){
    		$notification = array(
            	'message'=>'Update Order Succesfully',
            	'alert-type'=>'success'
            );
        	return back()->with($notification);
    	}
    }

    public function pending_order(){
    	$all_pending_order = DB::table('orders')
            		->join('customers', 'orders.customer_id', 'customers.id')
            		->where('orders.order_status', '0')
            		->select('orders.*', 'customers.customer_name', 'customers.customer_phone','customers.customer_email','customers.customer_address')
            		->get();

    	return view('admin.orders.pending_order', compact('all_pending_order'));
    }
}
