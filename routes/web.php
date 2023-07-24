<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingPage;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [landingPage::class, 'index'])->name('dashboard');
Route::post('ambildata_siranap', [landingPage::class, 'ambildata_siranap'])->name('ambildata_siranap');
Route::post('print_tiket', [landingPage::class, 'print_tiket'])->name('print_tiket');
