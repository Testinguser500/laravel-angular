<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use Image;


class ImageController extends Controller

{


	/**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function resizeImage()

    {

    	return view('admin/resizeImage')->with('title','Banner')->with('subtitle','Add');;

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function resizeImagePost(Request $request)

    {

	    $this->validate($request, [

	    	'title' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

     
   

        $destinationPath = ('uploads/banner');

        $img = Image::make($image->getRealPath());

        $img->resize(100, 100, function ($constraint) {

		    $constraint->aspectRatio();

		})->save($destinationPath.'/'.'thumb_'.$input['imagename']);


        $destinationPath = ('uploads/banner');

        $image->move($destinationPath, $input['imagename']);


        $this->postImage->add($input);


        return back()

        	->with('success','Image Upload successful')

        	->with('imageName',$input['imagename']);

    }


}
?>