<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return User::all();
});

Route::get('test', function (){
    return 'test api';
});

Route::get('migrate', function (){
    Artisan::call('migrate');
});

Route::get('cache_clear', function (){
    Artisan::call('cache:clear');
});

Route::get('make_migration', function (Request $request){
    $name = $request->input('name');
    Artisan::call('make:migration', ['name' => $name]);
});
