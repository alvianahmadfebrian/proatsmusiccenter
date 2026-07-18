<?php

use App\Http\Controllers\Cms\AuthController;
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\HeroController;
use App\Http\Controllers\Cms\ProfileController;
use App\Http\Controllers\Cms\TimelineController;
use App\Http\Controllers\Cms\ServiceController;
use App\Http\Controllers\Cms\ProductController;
use App\Http\Controllers\Cms\ProgramController;
use App\Http\Controllers\Cms\DocumentationController;
use App\Http\Controllers\Cms\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('cms-admin')->group(function(){

    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'authenticate']);

    Route::middleware('admin')->group(function(){

        Route::get('/dashboard',[DashboardController::class,'index']);
        Route::get('/logout',[AuthController::class,'logout']);

        // Hero
        Route::get('/hero',[HeroController::class,'edit']);
        Route::post('/hero',[HeroController::class,'update']);

        // Profile
        Route::get('/profile',[ProfileController::class,'edit']);
        Route::post('/profile',[ProfileController::class,'update']);

        // Timelines
        Route::get('/timeline',[TimelineController::class,'index']);
        Route::get('/timeline/create',[TimelineController::class,'create']);
        Route::post('/timeline/store',[TimelineController::class,'store']);
        Route::get('/timeline/edit/{id}',[TimelineController::class,'edit']);
        Route::post('/timeline/update/{id}',[TimelineController::class,'update']);
        Route::post('/timeline/delete/{id}',[TimelineController::class,'destroy']);

        // Services
        Route::get('/services',[ServiceController::class,'index']);
        Route::get('/services/create',[ServiceController::class,'create']);
        Route::post('/services/store',[ServiceController::class,'store']);
        Route::get('/services/edit/{id}',[ServiceController::class,'edit']);
        Route::post('/services/update/{id}',[ServiceController::class,'update']);
        Route::post('/services/delete/{id}',[ServiceController::class,'destroy']);

        // Products
        Route::get('/products',[ProductController::class,'index']);
        Route::get('/products/create',[ProductController::class,'create']);
        Route::post('/products/store',[ProductController::class,'store']);
        Route::get('/products/edit/{id}',[ProductController::class,'edit']);
        Route::post('/products/update/{id}',[ProductController::class,'update']);
        Route::post('/products/delete/{id}',[ProductController::class,'destroy']);

        // Programs
        Route::get('/programs',[ProgramController::class,'index']);
        Route::get('/programs/create',[ProgramController::class,'create']);
        Route::post('/programs/store',[ProgramController::class,'store']);
        Route::get('/programs/edit/{id}',[ProgramController::class,'edit']);
        Route::post('/programs/update/{id}',[ProgramController::class,'update']);
        Route::post('/programs/delete/{id}',[ProgramController::class,'destroy']);

        // Documentations
        Route::get('/documentations',[DocumentationController::class,'index']);
        Route::get('/documentations/create',[DocumentationController::class,'create']);
        Route::post('/documentations/store',[DocumentationController::class,'store']);
        Route::get('/documentations/edit/{id}',[DocumentationController::class,'edit']);
        Route::post('/documentations/update/{id}',[DocumentationController::class,'update']);
        Route::post('/documentations/delete/{id}',[DocumentationController::class,'destroy']);

        // Contacts
        Route::get('/contacts',[ContactController::class,'edit']);
        Route::post('/contacts',[ContactController::class,'update']);

    });
});
