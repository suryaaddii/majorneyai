<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\JurusanController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

Route::get('rekomendasi', function () {
    return view('rekomendasi');
})->name('rekomendasi');

Route::get('prodi', function () {
    return view('prodi');
})->name('prodi');

Route::get('/history', [QuizController::class, 'history'])->middleware('auth')->name('history');

Route::post('aiconclusion', [QuizController::class, 'getAIConclusion'])->name('aiconclusion');

Route::get('/auth/google/redirect', [GoogleLoginController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'callback'])->name('google.callback');
Route::post('/logout', [GoogleLoginController::class, 'logout'])->name('logout');

Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');
