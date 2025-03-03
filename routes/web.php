<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/cursos/{id}/estudiantes', [LoginController::class, 'showStudents'])->name('cursos.estudiantes');