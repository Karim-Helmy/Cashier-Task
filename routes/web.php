<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('userlogout');
// Route::get('/subscribe', [App\Http\Controllers\HomeController::class, 'subscribe'])->name('subscribe');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/subscribe', function () {
    return view('subscribe', [
        'intent' => auth()->user()->createSetupIntent(),
    ]);
})->name('subscribe');

Route::middleware(['auth:sanctum', 'verified'])->post('/subscribe', function (Request $request) {
    // dd($request->all());
    auth()->user()->newSubscription('cashier', $request->plan)->create($request->paymentMethod);

    return redirect('/dashboard');
})->name('subscribe.post');



