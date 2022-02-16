<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BooksController;

use App\Models\Books;
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
    return $request->user();
});


//routes for the CRUD oprations on book
Route::get('books', [BooksController::class,'getAllData']);
 
Route::get('books/{id}', [BooksController::class,'show']);

Route::post('books',  [BooksController::class,'store']);

Route::put('books/{id}',[BooksController::class,'update'] );

Route::delete('books/{id}', [BooksController::class,'destroy']);
