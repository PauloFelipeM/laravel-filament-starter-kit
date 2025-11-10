<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# Testing wallets
Route::post('/wallets/tests', function (Request $request) {
    $recipient = \App\Models\User::query()->first();
    deposit(100)->to($recipient)->overcharge()->commit();
    return $recipient->balance();
});
