<?php
namespace App\Http\Controllers;
use App\Employee;
use App\EmplyAttendance;
use DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
		$data = DB::table('employees')->get();
		return view('admin.all_employee', compact('data'));
	}


    public function create(){
    	return view('admin.add_employee');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'name' 			=> 'required|max:255',
	        'phone' 		=> 'required|max:15',
	        'email' 		=> 'required|unique:employees|max:255',
	        'designation' 	=> 'required|max:255',
	        'address' 		=> 'required|max:255',
	        'image'       	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$employee = new Employee;

        $employee->name 		= $request->name;
        $employee->phone   		= $request->phone;
        $employee->email        = $request->email;
        $employee->designation  = $request->designation;
        $employee->address      = $request->address;
        $image                  = $request->file('image');

    	if ($image){
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'admin/images/employees/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);
            $employee->image    = $image_url;
            $employee->save();
            // return ['success'=>true, 'message'=>'Employee Inserted Succesfully'];
            $notification = array(
            	'message'=>'Employee Inserted Succesfully',
            	'alert-type'=>'success'
            );
        	return back()->with($notification);
        }
    }


    public function edit($id){
    	$data = DB::table('employees')->where('id', $id)->first();
    	return view('admin.edit_employee', compact('data'));
    }


   	public function update(Request $request, $id){
        $validatedData = $request->validate([
	        'name' 			=> 'required|max:255',
	        'phone' 		=> 'required|max:15',
	        'email' 		=> 'required|max:255',
	        'designation' 	=> 'required|max:255',
	        'address' 		=> 'required|max:255',
	        'image'       	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);


    	$data = array();
    	$data['name']  		= $request->name;
    	$data['phone']  	= $request->phone;
    	$data['email']  	= $request->email;
    	$data['designation']= $request->designation;
    	$data['image']  	= $request->image;
    	$data['address']  	= $request->address;

    	$image = $request->file('image');
    		if($image){
        	$image_name = hexdec(uniqid());
        	$ext = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = 'admin/images/employees/';
        	$image_url = $upload_path.$image_full_name;
        	$success = $image->move($upload_path, $image_full_name);
        	$data['image'] = $image_url;
        	unlink($request->oldimage);
        	DB::table('employees')->where('id', $id)->update($data);
    		$notification = array(
        	'message'=>'Employee Updated Succesfully',
        	'alert-type'=>'success'
        	);
    		return back()->with($notification);
        }else{
        	$data['image'] = $request->oldimage;
        	DB::table('employees')->where('id', $id)->update($data);
            $notification = array(
        	'message'=>'Employee Updated Succesfully',
        	'alert-type'=>'success'
        	);
    		return back()->with($notification);
        }
           
    }


    public function delete($id){
    	$emploimg = DB::table('employees')->where('id', $id)->first();
    	$image = $emploimg->image;

    	$deleteemployee = DB::table('employees')->where('id', $id)->delete();
	        if ($deleteemployee) {
	        	unlink($image);
	            $notification = array(
	        	'message'=>'Employee Updated Succesfully',
	        	'alert-type'=>'success'
	        	);
	    	return back()->with($notification);   
    	}
    }


    public function attendance(){
    	$data = DB::table('employees')->get();
		return view('admin.add_attendacne_employee', compact('data'));
    }




    public function att_store(Request $request){
    	$date = $request->att_date;
    	$db_date = DB::table('emply_attendances')->where('att_date', $date)->first();
    	if($db_date){
    		$notification = array(
        	'message'=>'Today Attendance Already Taken',
        	'alert-type'=>'error'
        	);
    		return back()->with($notification);
    	}else{
    	foreach ($request->user_id as $id) {
    		$data[] = [
    			'user_id'			=>$id,
    			'attendance'		=>$request->attendance[$id],
    			'att_date'			=>$request->att_date,
    			'att_year'			=>$request->att_year,
    			'att_month'			=>$request->att_month,
    			'hourly_attendance'	=>$request->hourly_attendance,
    			'edit_date'			=>date('d_m_y'),
    		];
    	}
    	$att = DB::table('emply_attendances')->insert($data);
    	if($att){
    		$notification = array(
        	'message'=>'Attendance Inserted Succesfully',
        	'alert-type'=>'success'
        	);
    		return back()->with($notification);
    	}
      }
    }


    public function all_attendance(){
    	$all_att = DB::table('emply_attendances')->select('edit_date')->groupBy('edit_date')->get();
    	return view('admin.all_attendance', compact('all_att'));
    }

    public function edit_date($edit_date){
    	$date_update = DB::table('emply_attendances')->where('edit_date', $edit_date)->first();


    	$db_edit = DB::table('emply_attendances')
    				->join('employees', 'emply_attendances.user_id', 'employees.id')
    				->select('employees.name', 'employees.designation', 'employees.image', 'emply_attendances.*')
    				->where('edit_date', $edit_date)->get();
    	return view('admin.edit_attendance', compact('db_edit', 'date_update'));
    }


    public function update_attendance(Request $request){
    	foreach ($request->id as $id) {
    		$data = [
    			'attendance'	=>$request->attendance[$id],
    			'att_date'		=>$request->att_date,
    			'att_year'		=>$request->att_year,
    			'att_month'		=>$request->att_month,
    		];

    		$attendance_up = EmplyAttendance::where(['att_date'=>$request->att_date, 'id'=>$id])->first();
    		$attendance_up->update($data);
    	}
    	if ($attendance_up) {
	            $notification = array(
	        	'message'=>'Attendance updated Succesfully',
	        	'alert-type'=>'success'
	        	);
	    	return back()->with($notification);   
    	}else{
    		$notification = array(
	        	'message'=>'Attendance Not Updated',
	        	'alert-type'=>'error'
	        	);
	    	return back()->with($notification); 
    	}
    	
    }
}
