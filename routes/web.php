<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SiteController;
use App\Models\User;
use App\Notifications\NewAdminNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['register' => false]);

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/invitados', [SiteController::class, 'invitados'])->name('invitados');
Route::get('/conferencia', [SiteController::class, 'conferencia'])->name('conferencia');
Route::get('/calendario', [SiteController::class, 'calendario'])->name('calendario');
Route::get('/reservaciones', [SiteController::class, 'reservaciones'])->name('reservaciones');
Route::get('/pago_finalizado', [SiteController::class, 'pago_finalizado'])->name('pago_finalizado');

Route::post('/paypal/pay', [PaymentController::class, 'payWithPayPal'])->name('paypal.pay');
Route::get('/paypal/status/{registro?}', [PaymentController::class, 'payPalStatus'])->name('paypal.status');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');

    // eventos
    Route::get('/eventos', [EventoController::class, 'index'])->name('evento.index');
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('evento.create');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('evento.destroy');
    Route::post('/eventos', [EventoController::class, 'store'])->name('evento.store');
    Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('evento.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('evento.update');

    //categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    //invitados
    Route::get('/invitados', [InvitadoController::class, 'index'])->name('invitados.index');
    Route::get('/invitados/create', [InvitadoController::class, 'create'])->name('invitados.create');
    Route::post('/invitados', [InvitadoController::class, 'store'])->name('invitados.store');
    Route::delete('/invitados/{invitado}', [InvitadoController::class, 'destroy'])->name('invitados.destroy');
    Route::get('/invitados/{invitado}/edit', [InvitadoController::class, 'edit'])->name('invitados.edit');
    Route::put('/invitados/{invitado}', [InvitadoController::class, 'update'])->name('invitados.update');

    //registro
    Route::get('/registrados', [RegistroController::class, 'index'])->name('registrados.index');
    Route::get('/registrados/create', [RegistroController::class, 'create'])->name('registrados.create');
    Route::post('/registrados', [RegistroController::class, 'store'])->name('registrados.store');
    Route::delete('/registrados/{registro}', [RegistroController::class, 'destroy'])->name('registrados.destroy');
    Route::get('/registrados/{registro}/edit', [RegistroController::class, 'edit'])->name('registrados.edit');
    Route::put('/registrados/{registro}', [RegistroController::class, 'update'])->name('registrados.update');

    //administradores
    Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
    Route::get('/administradores/create', [AdministradorController::class, 'create'])->name('administradores.create');
    Route::post('/administradores', [AdministradorController::class, 'store'])->name('administradores.store');
    Route::delete('/administradores/{admin}', [AdministradorController::class, 'destroy'])->name('administradores.destroy');
    Route::get('/administradores/{admin}/edit', [AdministradorController::class, 'edit'])->name('administradores.edit');
    Route::put('/administradores/{admin}', [AdministradorController::class, 'update'])->name('administradores.update');
});

//Esta ruta solo es de desarrollo para ver el template del correo en el navegador
Route::get('/notification', function () {
    $user = User::find(1);

    return (new NewAdminNotification($user, ['email' => 'fernando@gmail.com', 'password' => '123']))
        ->toMail($user);
});
