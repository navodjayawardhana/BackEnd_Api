<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route:: get('/setup', function () {
    $credentials =[
        'email' =>'admin@gmail.com',
        'password' =>'12345678',
    ];
   if(!Auth::attempt($credentials)) {
    $user=new \App\Models\User();
    
    $user->name = 'admin';
    $user->email = $credentials['email'];
    $user->password = bcrypt($credentials['password']);

    $user->save();

    if (Auth::attempt($credentials)){
        $user=Auth::user();

        $adminToken = $user->createToken('admin-token',['create','update','delete']);
        $updateToken = $user->createToken('update-token',['','update','create']);
        $basicToken = $user->createToken('basic-token') ;

        return[
          'admin'=>$adminToken->plainTextToken,
          'update'=>$updateToken->plainTextToken,
          'basic'=>$basicToken->plainTextToken , 
        ];
    
    }

   }
});