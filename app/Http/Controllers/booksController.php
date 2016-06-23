<?php

namespace App\Http\Controllers;  
    

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;

class booksController extends Controller
{
       public function addbook(Request $request){
        
            $rules = array(
       'name'             => 'required|max:100',                        // just a normal required validation
        'author'         => 'required|max:100',     // required and must be unique in the ducks table
        'cl_number'             => 'required|numeric',
        'cat_num'         => 'required|numeric', 
        'edit_translate'         => 'required',
        'isbn' => 'required|numeric|unique:bookdetails',
         );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('insertBooks')
            ->withErrors($validator)->withInput();

       }else{
          
        $name=$request->input('name');
        $author=$request->input('author');
        $cl_num=$request->input('cl_number');    
        $edit=$request->input('edit_translate');
        $cat_number=$request->input('cat_num');
     
        $publisher=$request->input('publisher');  
        $published_place=$request->input('published_place');      
        $published_year=$request->input('published_year');      
     
        $pages=$request->input('pages');   
        $height=$request->input('height');        
        
        $series=$request->input('series');    
        $series_num=$request->input('series_num');     
        $isbn=$request->input('isbn');     
        $remarks=$request->input('remarks');
        
        $date = date("Y-m-d");
           
        
        
        
        
$id=DB::table('bookdetails')->insertGetId(array('name'=>$name,'author'=>$author,'cl_number'=>$cl_num,'cat_num'=>$cat_number,'edit_translate'=>$edit,'pages'=>$pages,'height'=>$height,'series'=>$series,'series_num'=>$series_num,'isbn'=>$isbn,'remarks'=>$remarks,'published_place'=>$published_place,'publisher'=>$publisher,'published_year'=>$published_year,'date_created'=> $date, 'date_updated' => $date));
           
//DB::table('books')->insert(array('name'=>$name,'reserved'=>"no",'status'=>"yes",'remarks'=>$edit,'date_added'=>$pages,'date_updated'=>$height));
           
        //reserved=no means the books havnt resered
        //status=yes means the book is   
          
        if($request->file('image')=="")
        {
            \Session::flash('message',$id);
         return Redirect::to('insertBooks')->withInput()->with('id',$id);   
        }
        else{
        
        $imageName = $id . '.' .'jpg';
        $request->file('image')->move(
        base_path() . '/public/book_images', $imageName);   
           \Session::flash('message',$id);
        return Redirect::to('insertBooks')->withInput()->with('id',$id);
        }
       
        
    }
       }
    
    public function addcoppies(Request $request){
    
    $bnid = $request->input('bnid');
    $cid = $request->input('cid');
    $copydate = $request->input('copydate');
    $copyremarks = $request->input('copyremarks');
    
    $date = date("Y-m-d");
        
    $id = DB::table('books')->insertGetId(array('book_name_id' => $bnid, 'remarks' => $copyremarks, 'id' =>  $cid,   'date_added'=> $date, 'date_updated' => $date, 'reserved'=>"No", 'status'=>"Available")
                                         );
    $book = DB::table('books')->where('book_name_id','=',$bnid)->orderBy('id')->get();



    return $book;
    
    
    }
    
    
    public function deletecopies(Request $request){
    
      $bnid = $request->input('bnid');
    $cid = $request->input('cid');


    DB::table('books')->where('id','=',$cid)->delete();
    $book = DB::table('books')->where('book_name_id','=',$bnid)->orderBy('id')->get();

    $re = DB::table('borrow_log')->where('book_id','=',$cid)->delete();
    $br = DB::table('reserved_log')->where('book_id','=',$cid)->delete();

    return $book;
    
    
    
    }
    

     public function updatebooks(Request $request){
     
         $idd=$request->input('idd');
         
       $rules = array(
       'name'             => 'required|max:100',                        // just a normal required validation
        'author'         => 'required|max:100',     // required and must be unique in the ducks table
        'cl_number'             => 'required|numeric',
        'cat_num'         => 'required|numeric', 
        'edit_translate'         => 'required',
        'isbn' => 'required|numeric|unique:bookdetails,isbn,'.$idd,
         );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();
           \Session::flash('message',$idd);
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('singleBook?id='.$idd)
            ->withErrors($validator)->withInput();

       }else{
         
        
        $name=$request->input('name');
        $author=$request->input('author');
        $cl_num=$request->input('cl_number');    
        $edit=$request->input('edit_translate');
        $cat_number=$request->input('cat_num');
     
        $publisher=$request->input('publisher');  
        $published_place=$request->input('published_place');      
        $published_year=$request->input('published_year');      
     
        $pages=$request->input('pages');   
        $height=$request->input('height');        
        
        $series=$request->input('series');    
        $series_num=$request->input('series_num');     
        $isbn=$request->input('isbn');     
        $remarks=$request->input('remarks');
        
        $date = date("Y-m-d");
           
        
        
        
        
$book_name = DB::table('bookdetails')
        ->where('id', '=', $idd)
        ->update(array('name' => $name, 'author' => $author, 'cl_number' => $cl_num, 'edit_translate' => $edit, 'publisher' => $publisher, 'published_place' => $published_place, 'published_year' => $published_year, 'pages' => $pages, 'height' => $height, 'series' => $series, 'series_num' => $series_num, 'isbn' => $isbn, 'remarks' => $remarks, 'date_updated' => $date));
           

        if($request->file('image')=="")
        {
            
         return Redirect::to('singleBook?id='.$idd);   
        }
        else{
        
        $imageName = $idd . '.' .'jpg';
        $request->file('image')->move(
        base_path() . '/public/book_images', $imageName);   
      
        return Redirect::to('singleBook?id='.$idd);
        }
       
        
    }

     }


   



   
    
    
    public function searchbook(Request $request){
    
    $search = $request->input('search');
    $select = $request->input('select');


    $bookname=  DB::table('bookdetails')
        ->leftJoin('books', 'bookdetails.id','=','books.book_name_id')

        ->select(DB::raw('count(books.id) as available, bookdetails.*'))
        ->where('bookdetails.'.$select, 'LIKE', $search.'%')
        ->groupBy('bookdetails.id')
        ->orderBy('bookdetails.'.$select)
        ->get();



    return   $bookname;
    
    
    
    }
    
    public function singleBooks(Request $request){
    
     $id = $request->input('id');


    $book_name = DB::table('bookdetails')->where('id','=', $id)->first();
    $book = DB::table('books')->where('book_name_id','=', $id)->orderBy('id')->get();
    $members = DB::table('members')->get();

    return view('singleBook')
        ->with("book_name", $book_name)
        ->with("book", $book)->with("members", $members);
    
    }
    
    
    public function deleteSingleBooks(Request $request){
    
    $id = $request->input('id');

    DB::table('bookdetails')->where('id','=',$id)->delete();
    DB::table('books')->where('book_name_id','=',$id)->delete();

    return "Success";
    
    
    
    }
    
    public function singleCopys(Request $request){
    
    $idd = $request->input('id');
        
    $info = DB::table('borrow_log')
        ->leftJoin('members', 'borrow_log.client_id','=','members.id')->where('book_id','=',$idd)->get();
        
        
    return view('singleCopy',array('bid' => $idd))->with("info", $info);
    
    }
        
        
        
        public function searchborrowedbook(Request $request){
        
        
         $search = $request->input('search');
          $select = $request->input('select');


         $bookname=  DB::table('borrow_log')->leftJoin('members', 'borrow_log.client_id','=','members.id')->where('borrow_log.returned_status','=',"No")
        ->where('borrow_log.'.$select, 'LIKE', $search.'%')
        ->groupBy('borrow_log.id')
        ->orderBy('borrow_log.'.$select)
        ->get();



    return   $bookname;
        
        
        
        
        }
        
        
            
     public function searchreservedbook(Request $request){
        
        
         $search = $request->input('search');
          $select = $request->input('select');


         $bookname=  DB::table('reserved_log')->leftJoin('members', 'reserved_log.client_id','=','members.id')->where('reserved_log.lend_status','=',"No")
        ->where('reserved_log.'.$select, 'LIKE', $search.'%')
        ->groupBy('reserved_log.id')
        ->orderBy('reserved_log.'.$select)
        ->get();



        return   $bookname; 
        
        }
        
         
    
            
            
    
}
