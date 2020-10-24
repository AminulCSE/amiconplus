<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
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
    	$data = DB::table('customers')->get();
    	return view('admin.customer.all_customer', compact('data'));
    }

    public function create(){
    	return view('admin.customer.add_customer');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'customer_name' 		=> 'required|max:255',
	        'customer_phone' 		=> 'max:15',
	        'customer_email' 		=> 'max:255',
	        'customer_address' 		=> 'max:255'
    	]);

    	$date = array();

    	$data['customer_name'] 		= $request->customer_name;
    	$data['customer_phone'] 	= $request->customer_phone;
    	$data['customer_email'] 	= $request->customer_email;
    	$data['customer_address'] 	= $request->customer_address;

    	$datainsert = DB::table('customers')->insert($data);

    	if($datainsert){
    		$notification = array(
            	'message'=>'Customer Inserted Succesfully',
            	'alert-type'=>'success'
            );
        	return back()->with($notification);
    	}
    }

    public function edit($id){
    	$data = DB::table('customers')
    			->where('id', $id)
    			->first();
    	return view('admin.customer.edit_customer', compact('data'));
    }

    public function update(Request $request, $id){
    	$validatedData = $request->validate([
	        'customer_name' 		=> 'required|max:255',
	        'customer_phone' 		=> 'max:15',
	        'customer_email' 		=> 'max:255',
	        'customer_address' 		=> 'max:255'
    	]);

    	$data = array();
    	$data['customer_name'] 		= $request->customer_name;
    	$data['customer_phone'] 	= $request->customer_phone;
    	$data['customer_email'] 	= $request->customer_email;
    	$data['customer_address'] 	= $request->customer_address;

    	$datainsert = DB::table('customers')
    				->where('id', $id)
    				->update($data);
    		$notification = array(
            	'message'=>'Customer Updated Succesfully',
            	'alert-type'=>'success'
            );
        	return back()->with($notification);
    }

    public function destroy($id){
    	$delete_data = DB::table('customers')->where('id', $id)->delete();
		$notification = array(
    	'message'=>'Customer Delete Succesfully',
    	'alert-type'=>'success'
        );
    	return back()->with($notification);
    }
}
