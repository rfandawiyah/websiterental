<?php
use App\Http\Controllers\apiController;
use App\Http\Controllers\pelangganController;
// use App\Http\Controllers\registerCustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OrderController;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterLocaleAwareServicesPass;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Login customers
Route::match(['get', 'post'], '/loginCustomers', [apiController::class, 'login']);
Route::post('/registrasiCustomer', [apiController::class, 'register']);
Route::post('/checkEmail', [apiController::class, 'checkEmail']);
// Route::post('/updateCustomer', [apiController::class, 'index']);
// Route::post('/updatePassword', [apiController::class, 'index']);

// Cars
Route::get('/cars', [apiController::class, 'cars']);
Route::get('/filterMobil', [apiController::class, 'cars']);

// Rent car
Route::post('/riwayatDiproses', [apiController::class, 'rent']);
Route::post('/riwayatDiajukan', [apiController::class, 'rent']);
Route::post('/riwayatDitolak', [apiController::class, 'rent']);
Route::post('/riwayatSelesai', [apiController::class, 'rent']);

// Customers
Route::post('/customers', [apiController::class, 'index']);
Route::post('/', [apiController::class, 'index']);