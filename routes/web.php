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

Route::prefix('cms-admin')->group(function () {

    Route::get('/login',  [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/logout',    [AuthController::class, 'logout']);

        // ── Hero (single resource, no index/create/delete) ──
        Route::get('/hero',  [HeroController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/hero', [HeroController::class, 'update']);

        // ── Profile (single resource) ──
        Route::get('/profile',  [ProfileController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/profile', [ProfileController::class, 'update']);

        // ── Contacts (single resource) ──
        Route::get('/contacts',  [ContactController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/contacts', [ContactController::class, 'update']);

        // ── Timelines ──
        Route::get('/timeline',                    [TimelineController::class, 'index']);
        Route::get('/timeline/create',             [TimelineController::class, 'create']);
        Route::post('/timeline',                   [TimelineController::class, 'store']);
        Route::get('/timeline/{id}/edit',          [TimelineController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/timeline/{id}', [TimelineController::class, 'update']);
        Route::match(['POST', 'DELETE'], '/timeline/{id}/delete', [TimelineController::class, 'destroy']); // Also fallback to delete route if needed
        Route::delete('/timeline/{id}',            [TimelineController::class, 'destroy']);

        // ── Services ──
        Route::get('/services',                    [ServiceController::class, 'index']);
        Route::get('/services/create',             [ServiceController::class, 'create']);
        Route::post('/services',                   [ServiceController::class, 'store']);
        Route::get('/services/{id}/edit',          [ServiceController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/services/{id}', [ServiceController::class, 'update']);
        Route::match(['POST', 'DELETE'], '/services/{id}/delete', [ServiceController::class, 'destroy']);
        Route::delete('/services/{id}',            [ServiceController::class, 'destroy']);

        // ── Products ──
        Route::get('/products',                    [ProductController::class, 'index']);
        Route::get('/products/create',             [ProductController::class, 'create']);
        Route::post('/products',                   [ProductController::class, 'store']);
        Route::get('/products/{id}/edit',          [ProductController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/products/{id}', [ProductController::class, 'update']);
        Route::match(['POST', 'DELETE'], '/products/{id}/delete', [ProductController::class, 'destroy']);
        Route::delete('/products/{id}',            [ProductController::class, 'destroy']);

        // ── Programs ──
        Route::get('/programs',                    [ProgramController::class, 'index']);
        Route::get('/programs/create',             [ProgramController::class, 'create']);
        Route::post('/programs',                   [ProgramController::class, 'store']);
        Route::get('/programs/{id}/edit',          [ProgramController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/programs/{id}', [ProgramController::class, 'update']);
        Route::match(['POST', 'DELETE'], '/programs/{id}/delete', [ProgramController::class, 'destroy']);
        Route::delete('/programs/{id}',            [ProgramController::class, 'destroy']);

        // ── Documentations ──
        Route::get('/documentations',              [DocumentationController::class, 'index']);
        Route::get('/documentations/create',       [DocumentationController::class, 'create']);
        Route::post('/documentations',             [DocumentationController::class, 'store']);
        Route::get('/documentations/{id}/edit',    [DocumentationController::class, 'edit']);
        Route::match(['POST', 'PUT'], '/documentations/{id}', [DocumentationController::class, 'update']);
        Route::match(['POST', 'DELETE'], '/documentations/{id}/delete', [DocumentationController::class, 'destroy']);
        Route::delete('/documentations/{id}',      [DocumentationController::class, 'destroy']);

    });
});
