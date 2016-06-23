<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('Login');
});


Route::get('/Login', function () {
    return view('Login');
});
Route::group(['middleware' => 'auth'], function () {
    
Route::get('admin', function () {
    return view('admin_template');
});

Route::get('error', function () {
    return view('error');
});


Route::get('test', 'TestController@index');

Route::get('insertBooks', function () {
    return view('insertBooks');
});

Route::get('searchBooks', function () {
    return view('searchBooks');
});

Route::get('addMembers', function () {
    return view('addMembers');
});

Route::get('searchMembers', function () {
    return view('searchMembers');
});

Route::get('borrowedBooks', function () {
    return view('borrowedBooks');
});

Route::get('reservedBooks', function () {
    return view('reservedBooks');
});

Route::get('changePassword', function () {
    return view('changePassword');
});    
    
Route::get('memberProfile', function () {
    return view('memberProfile');
});    
    
Route::get('mas', function () {
    return view('master');
});


Route::get('addUsers', function () {
    
     $user = Auth::user()->type;
 
     if($user == "User")
     {
         return view('error');
     }
    else{
    
    return view('addUsers');
    }
    });


Route::get('editUsers', function () {
    
     $user = Auth::user()->type;
 
     if($user == "User")
     {
         return view('error');
     }
    else{
    
    return view('editUsers');
    }
    });


Route::any('addbooks', array('as' => 'addbooks', 'uses' => 'booksController@addbook'));
Route::get('addCopy', 'booksController@addcoppies');
Route::get('deleteCopy', 'booksController@deletecopies');
Route::any('updateBook', array('as' => 'updateBook', 'uses' => 'booksController@updatebooks'));
Route::get('searchbooks', 'booksController@searchbook');
Route::get('singleBook', 'booksController@singleBooks');
Route::get('deleteSingleBook', 'booksController@deleteSingleBooks');
Route::get('singleCopy', 'booksController@singleCopys');
Route::get('searchborrowedbooks', 'booksController@searchborrowedbook');
Route::get('searchreservedbooks', 'booksController@searchreservedbook');    


Route::get('logout', 'memberController@logouts');
Route::post('addUser', 'memberController@addUsers');
Route::post('addMembers', 'memberController@addMember');
Route::get('searchmembers', 'memberController@searchmember');
Route::get('singleMember', 'memberController@singleMembers');
Route::post('updateMembers', 'memberController@updateMember');
Route::get('singleMemberedit', 'memberController@singleMemberedits');
Route::get('deletemember', 'memberController@deletemembers');
Route::get('verifymember', 'memberController@verifymembers');
Route::get('lendthebook', 'memberController@lendthebooks');
Route::get('reservethebook', 'memberController@reservethebooks');
Route::get('lendreservedbook', 'memberController@lendreservedbooks');
Route::get('returnlendedbook', 'memberController@returnlendedbooks');
Route::get('manageUsers', 'memberController@manageUser');
Route::get('searchusers', 'memberController@searchuser');
Route::get('singleUser', 'memberController@singleUsers');
Route::post('editUser', 'memberController@editUsers');
Route::post('editprofile', array('as' => 'editprofile', 'uses' => 'memberController@editprofiles'));
Route::post('editpassword', 'memberController@editpasswords');
    });


Route::post('Login', 'memberController@Logins');
Route::get('forgotps', function () {
    return view('auth.password');
});




// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');








