<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactMessageController;

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

// Portfolio Routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/projects/{project}', [PortfolioController::class, 'showProject'])->name('portfolio.project');
Route::get('/skills', [PortfolioController::class, 'showSkills'])->name('portfolio.skills');
Route::get('/contact', [PortfolioController::class, 'showContact'])->name('portfolio.contact');
Route::post('/contact', [PortfolioController::class, 'storeContact'])->name('portfolio.contact.store');
Route::get('/download-cv', [App\Http\Controllers\CvController::class, 'downloadCv'])->name('portfolio.download_cv');


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);

    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
});


require __DIR__.'/auth.php';
