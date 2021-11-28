<?php

use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'login']);

Route::get('/signup', [AuthController::class, 'signup']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/loginUser', [AuthController::class, 'loginUser']);

Route::post('/newUserSignup', [AuthController::class, 'newUserSignup']);

Route::get('/profile', [AuthController::class, 'profile']);

Route::get('/admin-controls', [UserController::class, 'index']);

Route::get('/tickets-summary', [TicketController::class, 'getTicketsSummary']);

Route::get('/ticket-details', [TicketController::class, 'getTicketDetails']);

Route::get('/raise-ticket', [TicketController::class, 'raiseTicket']);
