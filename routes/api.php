<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\v1'], function () {
    Route::get('user', [v1\UserApiController::class, 'getUsers']);
    Route::get('comment', [v1\CommentApiController::class, 'getComment']);
    Route::get('comment/{user_id}', [v1\CommentApiController::class, 'getCommentById']);
    Route::put('comment/update_status/{id}', [v1\CommentApiController::class, 'updateStatus']);
    Route::delete('comment/delete/{id}', [v1\CommentApiController::class, 'destroyComment']);
});

