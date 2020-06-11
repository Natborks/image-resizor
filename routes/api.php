<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
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

// Route::fallback(function () {
//     return response()->json(['error' => 'Not Found!'], 404);
// });



Route::post('/register', 'Auth\RegisterController@register');
//Route::post('/login', 'Auth\AuthController@login');
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
//Route::post('login', 'Auth\LoginController@login');




//Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('/upload','ImageController@resize');
    Route::get('/download/{filename}', 'ImageController@download');
//});

// Route::middleware(['auth:sanctum'])->group(function () {
//   Route::get('/users', 'UserController@index');
// });
