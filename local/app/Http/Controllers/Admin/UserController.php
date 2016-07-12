<?php namespace App\Http\Controllers\Admin;
use App\User; 
use App\Category; 
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;

class UserController extends Controller
{      
            public function __construct()
        {
            $this->middleware('auth');
            

        }
	public function index(){ 
             $user = DB::table('users')->get();  
             return view('admin/user')->with('users_data',$user)->with('title','Users')->with('subtitle','List');
		
	}
       public function add(){ 
             
             $user = DB::table('users')->get();  
             return view('admin/add_user')->with('users_data',$user)->with('title','User')->with('subtitle','Add');
		
	}
        public function store(Request $request){
	
  
	   $validator = Validator::make($request->all(), [
            'name' => 'required',
			'email'=>'required|email',
			
	    'image'=>'required',
                       
            
        ]);
         
        if ($validator->fails()) {
            return redirect('/admin/user/add')
                        ->withErrors($validator)
                        ->withInput();
        }
		 
         $destinationPath = 'uploads/user/'; // upload path
         $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
         $fileName = rand(11111,99999).'.'.$extension; // renameing image
         Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		User::create(['image' =>$fileName,'name' =>$request->get('name'),'email' =>$request->get('email'),'gender'=>$request->get('gender'),'address'=>$request->get('address'),'status' =>$request->get('status'),'role'=>2]);  
		  
         return redirect('/admin/user')->withFlash_message('Record inserted Successfully.');
	   
	}
        public function delete(Request $request){
	
	   $chk_id=$request->get('del_id');	  
	   DB::table('users')->where('id', '=',$chk_id)->delete();		 
           return  redirect('/admin/user')->withFlash_message('Record Deleted  Successfully.');	 
	    
	}
        
	 public function edit($id){
	
	 $cate= DB::table('categorys')->where('id', '=',$id)->first();  
         $category = DB::table('categorys')->get();  
	 return view('admin/edit_category')->with('categories',$category)->with('categ',$cate)->with('title','Category')->with('subtitle','Edit');
	     
	}
         public function update(Request $request){
	
	  $validator = Validator::make($request->all(), [
            'name' => 'required',
	    
            'description'=>'required',            
            
        ]);
         
        if ($validator->fails()) {
            return redirect('/category')
                        ->withErrors($validator)
                        ->withInput();
        }
		 
         $destinationPath = 'uploads'; // upload path
         $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
         $fileName = rand(11111,99999).'.'.$extension; // renameing image
         Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
	 Category::create(['image' =>$fileName,'category_name' =>$request->get('name'),'description' =>$request->get('description'),'status' =>$request->get('status'),'parent_id'=>$request->get('parent_cat'),'user_id'=>Auth::user()->id]);  
		  
         return redirect('/admin/category')->withFlash_message('Record inserted Successfully.');
	     
	}
       
 }
 
?>