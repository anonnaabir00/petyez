<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\BreedsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DoctorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/test', [GetData::class, 'index']);

// Auth Routes
Route::post('/v2/otp/send/', [AuthController::class, 'send_otp']);
Route::post('/v2/otp/verify/', [AuthController::class, 'verify_otp']);

// User Routes
Route::get('/v2/user/list', [AuthController::class, 'all_users']);
Route::get('/v2/user/{phone}', [AuthController::class, 'get_user']);

// Breeds Routes
Route::get('/v2/breeds/list', [BreedsController::class, 'all_breeds']);
Route::get('/v2/breeds/{type}', [BreedsController::class, 'get_breeds_by_breed_type']);

// Post Routes
Route::get('/v2/posts/list', [PostsController::class, 'all_posts']);

// Products Route

Route::get('/v2/products/list', [EcommerceController::class, 'get_products']);
Route::post('/v2/products/add', [EcommerceController::class, 'insert_products']);

// Orders Route
Route::post('/v2/order/create', [EcommerceController::class, 'create_order']);
Route::post('/v2/order/confirm', [EcommerceController::class, 'confirm_payment']);

// Services Experts Route

Route::get('/v2/service/experts/list', [ServicesController::class, 'get_experts']);
Route::post('/v2/service/experts/insert', [ServicesController::class, 'insert_experts']);

// Services Route

Route::get('/v2/service/list', [ServicesController::class, 'get_services']);
Route::post('/v2/service/insert', [ServicesController::class, 'insert_services']);

// Service Booking Route
Route::post('/v2/service/book', [ServicesController::class, 'book_services']);
Route::post('/v2/service/confirm', [ServicesController::class, 'confirm_payment']);

// Doctors Route
Route::get('/v2/doctors/list', [DoctorController::class, 'get_doctors']);
Route::post('/v2/doctors/insert', [DoctorController::class, 'insert_doctors']);
