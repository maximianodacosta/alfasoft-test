<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');

// Rotas de Autenticação Reais
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('/contacts');
    }
    return back()->withErrors(['email' => 'Credenciais inválidas.']);
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Proteção das rotas de gerenciamento
Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', ContactController::class)->except(['index']);
});
