<?php namespace App\Http\Controllers\Admin;
use App\User; 
use DB;
use Input;
use Crypt;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Controllers\cart\Cart;
use Session;
class HomeController extends Controller
{
	public function index(){           
             return view('admin/login');
		
	}
        public function dashboard(){           
             return view('admin/dashboard')->with('title','Dashboard')->with('subtitle','Control Panel');
		
	}
	
	public function log_user(Request $request){
		 $this->validate($request, [          
		   'email' => 'required|email',
		   'password' => 'required|min:6',
		   
				]);
		  if(isset($validator)){
		   if ($validator->fails()) {
				  return redirect('admin/login')->withErrors($validator)->withInput();
			  
				  }
		  }else{
                    if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'),  'role' =>1])) {
                         // Authentication passed...
                        if (Session::has('redirect_url'))
                         {
                            $value1 = Session::get('redirect_url');
                            return redirect()->intended($value1);
                         }
                         else{
                         return redirect()->intended('admin/dashboard');
                         }
                    }else
                    {
                    return redirect('admin/login')->with('flash_notice', 'Your E-mail or Password is not correct')->withInput();
                    }
		  }
	}
       
 }
 
?>