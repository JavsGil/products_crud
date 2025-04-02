<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController,CurrencyController,ProductPriceController,AuthController};

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API de Productos",
 *      description="Documentación de la API de Productos",
 *      @OA\Contact(
 *          email="dev.javiergil@tgmail.com.com"
 *      )
 * )
 */


Route::post('login', [AuthController::class, 'login']);

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    
    Route::post('/currencies', [CurrencyController::class, 'store']);
    
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::get('/products/{id}/prices', [ProductPriceController::class, 'index']);
    Route::post('/products/{id}/prices', [ProductPriceController::class, 'store']);
});
