<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the ToDo API']);
});

Route::apiResource('tasks', TaskController::class);
