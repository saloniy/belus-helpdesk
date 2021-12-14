<?php

use \App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use \App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
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

Route::post('/login-user', [AuthController::class, 'loginUser']);

Route::post('/new-user-signup', [AuthController::class, 'newUserSignup']);

Route::get('/profile', [AuthController::class, 'profile']);

Route::get('/profile-edit',[AuthController::class,'editProfile']);

Route::post('/profile-save',[AuthController::class,'saveProfile']);

Route::get('/admin-all-users', [AdminController::class, 'index']);

Route::post('/admin-filter-users', [AdminController::class, 'filter']);

Route::get('/admin-all-open-tickets', [AdminController::class, 'getOpenTickets']);

Route::post('/admin-assign-ticket', [AdminController::class, 'assignTicket']);

Route::get('/tickets-summary', [TicketController::class, 'getTicketsSummary']);

Route::get('/ticket-details/{id}', [TicketController::class, 'getTicketDetails']);

Route::post('/ticket-details', [TicketController::class, 'storeComments']);

Route::get('/raise-ticket', [TicketController::class, 'raiseTicket']);

Route::post('/raise-ticket',[TicketController::class,'createTicket']);

Route::get('/mail-ticket/{id}',[TicketController::class,'mailTicket']);

Route::post('/mail-ticket-details',[TicketController::class,'mailTicketDetails']);

Route::get('/contactus', [ContactController::class, 'getContact']);

Route::post('/contactus', [ContactController::class, 'contactUs']);

Route::get('/aboutus', [ContactController::class, 'aboutUs']);

Route::get('/faq', [ContactController::class, 'faq']);


Route::get('/new-csr-signup', [AdminController::class, 'newCsrSignup']);

Route::post('/new-csr-save',[AdminController::class,'saveCsrProfile']);

Route::get('/update-csr-account/{id}',[AdminController::class,'updateCsrAccount']);

Route::post('/updated-csr-account',[AdminController::class,'updatedCsrAccount']);

Route::get('/delete-csr-account/{id}',[AdminController::class,'deleteCsrAccount']);



