<?php


use App\Http\Controllers\UserController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//login route check if this user right or not
Route::get('/', function () {
    if(session()->has('user')){
        return redirect('posts');
    }else{
        return view('pages.login');
    }
    
});
Route::post('/login', [UserController::class,'login']);
// Logout route
Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
    }
        return redirect('/');
    
});

Route::get('/posts', Posts::class);

