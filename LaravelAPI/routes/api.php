<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\cinemaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MpesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//public route
Route::get('/', [ApiController::class, 'task1']);
//Route::post('/login', [AuthController::class, 'login']);
//Route::post('/register', [AuthController::class, 'register']);
//Route::get('/shows', [ProductController::class, 'index']);
//Route::get('/cinemas', [cinemaController::class, 'getAllCinemas']);
//Route::get('/shows/{id}', [ProductController::class, 'show']);
//Route::get('/cinemas/{id}', [cinemaController::class, 'getCinemaById']);
//Route::get('/cinema/shows/{cinema)', [ProductController::class, 'showByCinema']);
//Route::get('/mail', [MailController::class, 'basic_email']);
//Route::get('/token', [MpesaController::class, 'getToken']);
//Route::post('/mpesa', [MpesaController::class, 'initiateSTK']);
//Route::get('/timestamp', [MpesaController::class, 'gettimestamp']);

//protected route
//Route::group(['middleware' => ['auth:sanctum']], function(){
//    // Route::post('/auth/register', [AuthController::class, 'register'])->middleware('restrictRole:user');
//    Route::get('/user', [AuthController::class, 'userInfo']);
//    Route::get('/users', [AuthController::class, 'show'])->middleware('restrictRole:admin');
//    Route::put('/user/update/{id}', [AuthController::class, 'update']);
//    Route::get('logout', [AuthController::class, 'logout']);
//    Route::delete('/user', [AuthController::class, 'deleteCurrentUser']);
//    Route::delete('/user/{id}', [AuthController::class, 'deleteUserById'])->middleware('restrictRole:admin');
//    Route::post('/shows/new', [ProductController::class, 'store'])->middleware('restrictRole:admin');
//    Route::put('/shows/edit/{id}', [ProductController::class, 'update'])->middleware('restrictRole:admin');
//    Route::delete('/shows/{id}', [ProductController::class, 'destroy'])->middleware('restrictRole:admin');
//    Route::post('/book', [BookingController::class, 'store'])->middleware('restrictRole:user');
//    Route::get('/bookedSeats/{movie_id}/{cinema}', [BookingController::class, 'getBookedSeats']);
//    Route::get('/user/bookings', [BookingController::class, 'getUserBookings'])->middleware('restrictRole:user');
//    Route::get('/admin/bookings', [BookingController::class, 'getAllBookings'])->middleware('restrictRole:admin');
//    Route::get('/admin/booking/{id}', [BookingController::class, 'getBookingById'])->middleware('restrictRole:admin');
//    Route::get('/user/booking/{id}', [BookingController::class, 'getById'])->middleware('restrictRole:user');
//    Route::post('/admin/cinema', [cinemaController::class, 'store'])->middleware('restrictRole:admin');
//    Route::get('/admin/cinema/{id}', [cinemaController::class, 'getCinemaById'])->middleware('restrictRole:admin');
//    Route::put('/admin/cinema/{id}', [cinemaController::class, 'update'])->middleware('restrictRole:admin');
//    Route::delete('/admin/cinema/{id}', [cinemaController::class, 'destroy'])->middleware('restrictRole:admin');
//});

//Route::middleware('auth:sanctum')->group( function () {
//    Route::resource('products', ProductController::class);
//});
