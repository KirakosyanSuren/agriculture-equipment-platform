<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\WarrantyController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/inventory/{slug}', [InventoryController::class, 'show'])->name('inventory.show');

Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::get('/money-back-guarantee', [GuaranteeController::class, 'index'])->name('guarantee');
Route::get('/warranty', [WarrantyController::class, 'index'])->name('warranty');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/customer-testimonials', [TestimonialsController::class, 'index'])->name('customer_testimonials');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
