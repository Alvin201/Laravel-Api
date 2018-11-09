<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use App\Comment;


class CommentController extends Controller
{

    public function index(){
    $data = Comment::all();
    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        	$res['message'] = "Success!";
        	$res['values'] = $data;
        	return response($res);
    }
    	else{
        	$res['message'] = "Empty!";
        	return response($res);
    	}
	}

    public function show($id){
    $data = Comment::where('id',$id)->get();
    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data;
        return json_encode($res);
    }
    	else{
        $res['message'] = "Failed!";
        return json_encode($res);
    	}
	}

	public function store(Request $request){
    $author = $request->input('author');
    $text = $request->input('text');
   
    $data = new Comment();
    $data->author = $author;
    $data->text = $text;
 
    	if($data->save()){
        	$res['message'] = "Success!";
        	$res['value'] = "$data";
        	return response($res);
    	}
	}


   public function update(Request $request, $id){
    $author = $request->input('author');
    $text = $request->input('text');

    $data = Comment::where('id',$id)->first();
    $data->author = $author;
    $data->text = $text;

    if($data->save()){
        $res['message'] = "Success!";
        $res['value'] = "$data";
        return response($res);
    }
    else{
        $res['message'] = "Failed!";
        return response($res);
    }
}

public function destroy($id){
    $data = Comment::where('id',$id)->first();
    $check = Comment::where('id',$id)->get();
  		if($check->count() > 0){ //jika data ada
	        //row delete
            if($data->delete()){
		        $res['message'] = "Success!";
		        $res['value'] = "$data";
		        return response($res);
		    }
		    else{
		        $res['message'] = "Failed!";
		        return response($res);
		    	}
	    }
	    else{
	        $res['message'] = "Data Not Found!";
	        $response =Response::json($res);
	        return $response;
	 	}

	}


//========================================================
   	public function form() {    
        return view('comments.index');
    }
    
    public function showform(Request $request){
	    $q = $request->get('q');
    	$data = Comment::where('id',$q)->get();
  		if($data->count() > 0){
            $res['code'] = 200;
	        $res['message'] = "Success!";
	        $res['value'] = "$data";
	        $response = Response::json($res);
	        return $response;
	    }
	    else{
            $res['code'] = 400;
	        $res['message'] = "Failed!";
            $res['value'] = null;
	        $response =Response::json($res);
            return $response;
	    }
	}

	public function storeform(Request $request){
    $author = $request->input('a');
    $text = $request->input('b');
   
    $data = new Comment();
    $data->author = $author;
    $data->text = $text;
 
    	if($data->save()){
        	 $res['code'] = 200;
              $res['message'] = "Success!";
              $res['value'] = "$data";
              $response = Response::json($res);
              return $response;
    	}else{
              $res['code'] = 400;
              $res['message'] = "Failed!";
              $res['value'] = null;
              $response =Response::json($res);
              return $response;
        }
	}

	public function updateform(Request $request){
    $author = $request->input('a');
    $text = $request->input('b');
    $id = $request->input('c');

    $data = Comment::firstOrNew(array('id' => $id));
    $data->author = $author;
    $data->text = $text;

	    if($data->update()){
	          $res['code'] = 200;
              $res['message'] = "Success!";
              $res['value'] = "$data";
              $response = Response::json($res);
              return $response;
	    }
	    else{
	          $res['code'] = 400;
              $res['message'] = "Failed!";
              $res['value'] = null;
              $response =Response::json($res);
              return $response;
	    }

	}	
 
    
    public function destroyform(Request $request){
    $id = $request->get('a');
    $data = Comment::where('id',$id)->first();
    $check = Comment::where('id',$id)->get();
  		if($check->count() > 0){ //jika data ada
	        //row delete
            if($data->delete()){
		      $res['code'] = 200;
              $res['message'] = "Success!";
              $res['value'] = "$data";
              $response = Response::json($res);
              return $response;

		    }
		    else{
		      $res['code'] = 400;
              $res['message'] = "Failed!";
              $res['value'] = null;
              $response =Response::json($res);
              return $response;
		    }
	    }
	    else{
            $res['code'] = 404;
            $res['message'] = "Data Not Found!";
            $res['value'] = null;
            $response =Response::json($res);
	        return $response;
	 	}

	}

        public function pagingform(Request $request){
        $a = $request->input('paging');
        $data = Comment::skip(0)->take($a)->get();
        if($data->count() > 0){
              $res['code'] = 200;
              $res['message'] = "Success!";
              $res['value'] = "$data";
              $response = Response::json($res);
              return $response;
        }
        else{
             $res['code'] = 400;
             $res['message'] = "Failed!";
             $res['value'] = null;
             $response =Response::json($res);
             return $response;
        }
    }



}
