<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use DB;
use Auth;
use Hash;
use Cache;

class memberController extends Controller
{
    
    public function addUsers(Request $request){
      
        
        $rules = array(
       'name'             => 'required|max:20',                        // just a normal required validation
        'Last_Name'         => 'required|max:50',     // required and must be unique in the ducks table
        'type'             => 'required',
        'email'         => 'required|email|unique:users', 
        'password'         => 'required|',
        'confirm_password' => 'required|same:password',
         );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('addUsers')
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------

       
        $name=Input::get('name');
        $lastname=Input::get('Last_Name');
        $typee=Input::get('type');
        $email=Input::get('email'); 
        $password=Hash::make(Input::get('password'));
        $bdate = date("Y-m-d");     
        $username=$name.' '.$lastname;
        
  
           $id=DB::table('users')->insert(array('name'=>$username,'email'=>$email,'type'=>$typee,'password'=>$password,'created_at'=>$bdate,'updated_at'=>$bdate));
           
           
    

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('addUsers');

    }
    
      
    
  }
    
    
    public function logouts(Request $request){
    
    
        Auth::logout();
        Cache::flush();
      // Session::flush();
        return view('Login');
        
        
    }
    
    
    
    public function Logins(Request $request){
    
    $member = Input::only('email','password');
        
     if(Auth::attempt($member)){
        return Redirect::Intended('/searchBooks');
    }
    return Redirect::to('Login');
    
    
    
    }

    
    
    
    public function addMember(Request $request){
        
         $rules = array(
        'name'             => 'required|max:30',                        // just a normal required validation
        'Last_Name'         => 'required|max:50',     // required and must be unique in the ducks table
        'typee'             => 'required',
       // 'nic'                => 'required',           // required and has to match the password field
       //  'Ref_Num'            => 'required',                        // just a normal required validation
        'Address_Line_1'         => 'required',     // required and must be unique in the ducks table
        'Address_Line_2'         => 'required',
        'Land_Number'        => 'digits_between:6,8' ,
         'Address_Line_3'      => 'required',     // required and must be unique in the ducks table
        'Mobile_Number'      => 'required|digits_between:9,11|unique:members',
        'email'              => 'email' ,
        'status'            => 'required',     // required and must be unique in the ducks table
       // 'remarks'            => 'required',        
    );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('addMembers')
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------

       
        $name=Input::get('name');
        $lastname=Input::get('Last_Name');
        $typee=Input::get('typee');
        $nic=Input::get('nic');    
        $refnum=Input::get('Ref_Num');
        $addressone=Input::get('Address_Line_1');
        $addresstwo=Input::get('Address_Line_2');
        $addressthree=Input::get('Address_Line_3');
     
        $lnum=Input::get('Land_Number');  
        $mnum=Input::get('Mobile_Number');      
        $email=Input::get('email');      
     
        $status=Input::get('status');   
        $remarks=Input::get('remarks');
           
        $address=$addressone.','.$addresstwo.','.$addressthree;
        
  
           $id=DB::table('members')->insertGetId(array('name'=>$name,'Last_Name'=>$lastname,'typee'=>$typee,'nic'=>$nic,'Ref_Num'=>$refnum,'address'=>$address,'Land_Number'=>$lnum,'Mobile_Number'=>$mnum,'email'=>$email,'status'=>$status,'remarks'=>$remarks,'Address_Line_1'=>$addressone,'Address_Line_2'=>$addresstwo,'Address_Line_3'=>$addressthree));
           
           
    

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('addMembers');

    }
        
    }
    
    
    
    public function searchmember(Request $request){
    
    
        
     $search = $request->input('search');
    $select = $request->input('select');


    $membername=  DB::table('members')
        ->where('members.'.$select, 'LIKE', $search.'%')
        ->groupBy('members.id')
        ->orderBy('members.'.$select)
        ->get();



    return   $membername;
    
    
    
    
    }    

    
    
  public function singleMemberedits(Request $request){  
      
      
        $id = $request->input('id');


    $member_name = DB::table('members')->where('id','=', $id)->first();
  

    return view('singleMemberedit')
        ->with("member_name", $member_name);
      
      
      
  }
    
    
  public function singleMembers(Request $request){  
      
      
        $id = $request->input('id');


    $member_name = DB::table('members')->where('id','=', $id)->first();
  

    return view('singleMember')
        ->with("member_name", $member_name);
      
      
      
  }
    
    
    
    public function updateMember(Request $request){  
    
        $id=Input::get('id');
       $rules = array(
        'name'             => 'required|max:10',                        // just a normal required validation
        'Last_Name'         => 'required|max:10',     // required and must be unique in the ducks table
        'typee'             => 'required',
       // 'nic'                => 'required',           // required and has to match the password field
       //  'Ref_Num'            => 'required',                        // just a normal required validation
        'Address_Line_1'         => 'required',     // required and must be unique in the ducks table
        'Address_Line_2'         => 'required',
        'Land_Number'        => 'digits_between:6,8' ,
         'Address_Line_3'      => 'required',     // required and must be unique in the ducks table
        'Mobile_Number'      => 'required|digits_between:9,11|unique:members,Mobile_Number,'.$id,
        'email'              => 'email' ,
        'status'            => 'required',     // required and must be unique in the ducks table
       // 'remarks'            => 'required',        
    );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {
          
        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('singleMemberedit?id='.$id)
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------

        $ss=Input::get('id');
        $name=Input::get('name');
        $lastname=Input::get('Last_Name');
        $typee=Input::get('typee');
        $nic=Input::get('nic');    
        $refnum=Input::get('Ref_Num');
        $addressone=Input::get('Address_Line_1');
        $addresstwo=Input::get('Address_Line_2');
        $addressthree=Input::get('Address_Line_3');
     
        $lnum=Input::get('Land_Number');  
        $mnum=Input::get('Mobile_Number');      
        $email=Input::get('email');      
     
        $status=Input::get('status');   
        $remarks=Input::get('remarks');
           
        $address=$addressone.','.$addresstwo.','.$addressthree;
        
  
           $id=DB::table('members')->where('id', '=', $id)->update(array('name'=>$name,'Last_Name'=>$lastname,'typee'=>$typee,'nic'=>$nic,'Ref_Num'=>$refnum,'address'=>$address,'Land_Number'=>$lnum,'Mobile_Number'=>$mnum,'email'=>$email,'status'=>$status,'remarks'=>$remarks,'Address_Line_1'=>$addressone,'Address_Line_2'=>$addresstwo,'Address_Line_3'=>$addressthree));
           
           
    

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('singleMember?id='.$ss);

    }
        
    
    
    }
    
    
    
    public function deletemembers(Request $request){  
    
    
    $id = $request->input('id');

    DB::table('members')->where('id','=',$id)->delete();
    

    return "Success";
    
    
    
    }
    
    
    public function verifymembers(Request $request){ 
    
        $mnumber=$request->input('mnumber');
        
        $num = DB::table('members')->where('Mobile_Number','=', $mnumber)->count();
        
        if($num == 1)
        {
        return "pass";
        }
        else
        {
        return "fail";
        }
    
    
    }
    
    
    public function lendthebooks(Request $request){ 
    
    $user = Auth::user()->type;
    $mnumber=$request->input('mnumber');
    $duration=$request->input('duration');
    $bookid=$request->input('bookid');
        
    $cilent_id_raw = DB::table('members')->where('Mobile_Number','=', $mnumber)->first();
    $cilent_id = $cilent_id_raw->id;
    $bdate = date("Y-m-d");   
    $date=\Carbon\Carbon::now();
    $due_date = $date->addDays($duration);
        
      DB::table('books')->where('id','=', $bookid)->update(array('status'=>"Not Available"));  
        
     $idd=DB::table('borrow_log')->insert(array('book_id'=>$bookid,'client_id'=>$cilent_id,'borrowed_date'=>$bdate,'duration'=>$duration,'due_date'=>$due_date,'user_issued'=>$user));
        
        return 'success';
    
    
    }
    
    
        
      public function reservethebooks(Request $request){ 
    
    $user = Auth::user()->type;
    $mnumber=$request->input('mnumber');
    $duration=$request->input('duration');
    $bookid=$request->input('bookid');
        
    $cilent_id_raw = DB::table('members')->where('Mobile_Number','=', $mnumber)->first();
    $cilent_id = $cilent_id_raw->id;
    $bdate = date("Y-m-d");   
    $date=\Carbon\Carbon::now();
    $due_date = $date->addDays($duration);
        
      DB::table('books')->where('id','=', $bookid)->update(array('reserved'=>"Yes"));  
        
     $idd=DB::table('reserved_log')->insert(array('book_id'=>$bookid,'client_id'=>$cilent_id,'reserved_date'=>$bdate,'duration'=>$duration,'due_date'=>$due_date,'user_issued'=>$user));
        
        return 'success';
    }
        
        
          
      public function lendreservedbooks(Request $request){ 
    
    $user = Auth::user()->type;
    $client_id=$request->input('id');
    $duration=$request->input('duration');
    $bookid=$request->input('bookid');
        
   
    $bdate = date("Y-m-d");   
    $date=\Carbon\Carbon::now();
    $due_date = $date->addDays($duration);
        
      DB::table('books')->where('id','=', $bookid)->update(array('status'=>"Not Available",'reserved'=>"No"));  
        
     $idd=DB::table('borrow_log')->insert(array('book_id'=>$bookid,'client_id'=>$client_id,'borrowed_date'=>$bdate,'duration'=>$duration,'due_date'=>$due_date,'user_issued'=>$user));
          
        DB::table('reserved_log')->where('book_id','=', $bookid)->update(array('lend_status'=>"Yes"));   
        
        return 'success';
    
    
    }
          
    
          
     public function returnlendedbooks(Request $request){
          
     $comments=$request->input('comments');
     $bookid=$request->input('bookid');
        
     $bdate = date("Y-m-d");  
         
     DB::table('books')->where('id','=', $bookid)->update(array('status'=>"Available",'reserved'=>"No"));
     DB::table('borrow_log')->where('book_id','=', $bookid)->update(array('return_comments'=>$comments,'returned_date'=>$bdate,'returned_status'=>"Yes"));
   
    return 'success';
          
          
          }     
          
    
    public function searchuser(Request $request){
    
      $search = $request->input('search');
    $select = $request->input('select');


    $username=  DB::table('users')
        ->where('users.'.$select, 'LIKE', $search.'%')
        ->groupBy('users.id')
        ->orderBy('users.'.$select)
        ->get();



    return $username;
        
    }
    
        
        
    public function singleUsers(Request $request){
        
        
       $id = $request->input('id');


    $user_name = DB::table('users')->where('id','=', $id)->first();
  

    return view('singleUser')
        ->with("user_name", $user_name);  
        
        
    }
        
        
        
     public function editUsers(Request $request){
      
        $id=Input::get('id');
        $rules = array(
       'name'             => 'required|max:50',                        // just a normal required validation
        'type'             => 'required',
        'email'         => 'required|email|unique:users,email,'.$id, 
       
         );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('singleUser?id='.$id)
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------

       
        $name=Input::get('name');

        $typee=Input::get('type');
        $email=Input::get('email'); 
     
        $bdate = date("Y-m-d");     
        
        
  
           $id=DB::table('users')->where('id', '=', $id)->update(array('name'=>$name,'email'=>$email,'type'=>$typee,'updated_at'=>$bdate));
           
           
    

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('editUsers');

    }
    
      
    
  }    
        
        
   public function editprofiles(Request $request){
      
        $id=Input::get('id');
        $rules = array(
       'name'             => 'required|max:50',                        // just a normal required validation
        'email'         => 'required|email|unique:users,email,'.$id, 
      
         );
    
    $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('memberProfile')
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------

       
        $name=Input::get('name');
        $email=Input::get('email'); 
     
        $bdate = date("Y-m-d");     
        
        
  
           $id=DB::table('users')->where('id', '=', $id)->update(array('name'=>$name,'email'=>$email,'updated_at'=>$bdate));
           
           
         if($request->file('image')=="")
        {
          
         return Redirect::to('memberProfile');   
        }
        else{
         $idd=Input::get('id');
        $imageName = $idd . '.' .'jpg';
	
         if(file_exists('/user_image/'.$imageName))
        {
          $destinationPath = 'user_images/';   
        File::delete('user_image/' . $imageName);
         Input::file('image')->move($destinationPath, $imageName);
	 
        return Redirect::to('memberProfile'); 
        
         }
        else
        {
         
   
        $destinationPath = 'user_images';
	$filename = $idd . '.' .'jpg';

	Input::file('image')->move($destinationPath, $filename);
	
        return Redirect::to('memberProfile');
        }
            
        }

    }
    
      
    
  }      
        
 
     public function editpasswords(Request $request){
         
         
         $rules = array(
         
        'old_password'   => 'required|', 
        'password'         => 'required|',
        'confirm_password' => 'required|same:password',
  
             
             
         );   
         
         
         
        $validator = Validator::make(Input::all(), $rules);
    
    
       if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();
           Session::flash('message', 'My message');
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('changePassword')
            ->withErrors($validator)->withInput();

    } else {
        // validation successful ---------------------------
           $ps =$id=Input::get('old_password');
           $oldps=Auth::user()->password;
           $id=Auth::user()->id;
           $newps=Hash::make(Input::get('password'));
           
           
       if(Hash::check($ps, $oldps)) 
       {
            DB::table('users')->where('id','=', $id)->update(array('password'=>$newps)) ;
           Auth::logout();
        Cache::flush();
      // Session::flush();
        return view('Login');
       }
           
        else
        {
    
        Session::flash('message', 'Old password does not match!');
        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('changePassword');
        }
    }
     }

	
	public function banSingleusers(Request $request){

	$id = $request->input('id');

	 $id=DB::table('users')->where('id', '=', $id)->update(array('banned_status'=>"Yes",'email'=>"banned@banned.com"));

	return "Success";

    }
}
