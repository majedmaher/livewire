<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\User\Create;
use App\Http\Livewire\User\Table;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/table', Table::class)->name('user.table');

    Route::get('/create', Create::class)->name('user.create');
});

Route::get('user/{id}', function ($id) {
    $user = User::find($id);
    return view('frontend-user', compact('user'));
})->name('user.profile');
