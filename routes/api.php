<?php

use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\TermsconditionController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('testimonial', [TestimonialController::class, 'index']);
Route::post('testimonial', [TestimonialController::class, 'store']);
Route::post('testimonial-product', [TestimonialController::class, 'storeProduct']);
Route::put('testimonial/{testimonial}', [TestimonialController::class, 'update']);
Route::put('testimonial-product/{testimonial}', [TestimonialController::class, 'updateProduct']);
Route::delete('testimonial', [TestimonialController::class, 'destroy']);

Route::get('faq', [FaqController::class, 'index']);
Route::post('faq', [FaqController::class, 'store']);
Route::put('faq/{faq}', [FaqController::class, 'update']);
Route::delete('faq', [FaqController::class, 'destroy']);

Route::get('terms-condition', [TermsconditionController::class, 'index']);
Route::post('terms-condition', [TermsconditionController::class, 'store']);
Route::put('terms-condition/{terms_condition}', [TermsconditionController::class, 'update']);
Route::delete('terms-condition', [TermsconditionController::class, 'destroy']);

Route::get('news', [NewsController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
