<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipmentTypeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialsController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('admin.guest')->group(function () {

        Route::get('/login', [AuthController::class, 'show'])
            ->name('show_login');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');

    });

    Route::middleware('admin.auth')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

//      Dashboard

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::delete('/{feedback}', [DashboardController::class, 'destroy'])
            ->name('feedback.destroy');

        Route::patch('/feedback/{feedback}/changeStatus', [DashboardController::class, 'changeStatus'])
            ->name('feedback.change-status');

//        Inventory

        Route::resource('inventories', InventoryController::class)
            ->except(['show']);

        Route::patch('/inventory/{inventory}/changeStatus', [InventoryController::class, 'changeStatus'])
            ->name('inventory.change-status');

//        EQUIPMENT TYPE

        Route::resource('equipment-types', EquipmentTypeController::class)
            ->except(['create', 'edit', 'show']);

//        BRAND

        Route::resource('brands', BrandController::class)
            ->except(['create', 'edit', 'show']);

//        FAQ

        Route::resource('faqs', FaqController::class)
            ->except(['show']);

        Route::patch('/faq/{faq}/changeStatus', [FaqController::class, 'changeStatus'])
            ->name('faq.change-status');

//        Careers

        Route::resource('careers', CareerController::class)
            ->except(['show']);

        Route::patch('/career/{career}/changeStatus', [CareerController::class, 'changeStatus'])
            ->name('career.change-status');

//        OUR TEAM

        Route::resource('members', TeamController::class)
            ->except(['show']);

        Route::patch('/our-team/{member}/changeStatus', [TeamController::class, 'changeStatus'])
            ->name('member.change-status');

//        Contact

        Route::resource('contacts', ContactController::class)
            ->except(['show']);

        Route::patch('/contact/{contact}/changeStatus', [ContactController::class, 'changeStatus'])
            ->name('contact.change-status');

//        Testimonials

        Route::resource('testimonials', TestimonialsController::class)
            ->except(['show']);

        Route::patch('/testimonial/{testimonial}/changeStatus', [TestimonialsController::class, 'changeStatus'])
            ->name('testimonial.change-status');
    });

});
