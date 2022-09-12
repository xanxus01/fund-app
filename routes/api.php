<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function (){
    Route::get('test', function (){
       return'te';
    });
});
Route::get('login', function (Request $request){
    $user = \App\Models\User::firstOrCreate(['email' => '312823281@qq.com'], [
        'name' => 'test',
        'password' => 'test',
    ]);
    dd($user->createToken('login'));
});
