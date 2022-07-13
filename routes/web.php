<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\CarreraController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CarrerasapiController;
use App\Http\Controllers\Api\CarrerasController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/carrera', CarreraController::class);

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    $userExists=User::where('external_id', $user->id)->where('external_auth', 'google')->first();
if($userExists) {
    Auth::login($userExists);
} else {
    $userNew=User::create([
        'name'=>$user->name,
        'email'=>$user->email,
        'avatar'=>$user->avatar,
        'external_id'=>$user->id,
        'external_auth'=>'google',
    ]);
    Auth::login($userNew);
}
    return redirect('/carrera');
    //dd($user);
    // $user->token
});

//Controlador API REST Carreras
Route::get('/carrera', [App\Http\Controllers\CarreraController::class, 'index']);
Route::get('/carrera{id}', [App\Http\Controllers\CarreraController::class, 'show']);
Route::post('/carrera', [App\Http\Controllers\CarreraController::class, 'store']);
Route::put('/carrera{id}', [App\Http\Controllers\CarreraController::class, 'update']);
Route::delete('/carrera{id}', [App\Http\Controllers\CarreraController::class, 'destroy']);

//API REST Usuarios
/*Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('posts/{id}', 'App\Http\Controllers\PostsController@show');*/

Route::get('/', 'App\Http\Controllers\CarrerasapiController@index');

Route::get('carreras/{id}', 'App\Http\Controllers\CarrerasapiController@show');

