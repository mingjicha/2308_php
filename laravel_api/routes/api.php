<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// 라우트 그룹
Route::prefix('/item')->group( function () {
    Route::get('/', [ItemController::class, 'index']); // item 전체 조회
    Route::post('/', [ItemController::class, 'store']); // item 작성
    Route::put('/{id}', [ItemController::class, 'update']); // item 수정
    Route::delete('/{id}', [ItemController::class, 'destroy']); // item 삭제
});

// GET|HEAD  api/item ....................... ItemController@index
// POST      api/item ....................... ItemController@store
// PUT       api/item/{id} .................. ItemController@update
// DELETE    api/item/{id} .................. ItemController@destroy