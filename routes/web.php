
<?php

use App\Http\Controllers\{
    ProfileController,
    ClaseController,
    ReservaController,
    RutinaController,
    SeguimientoController,
    EjercicioController,
    DashboardController,
    Auth\PasswordResetLinkController,
    Auth\RegisteredUserController,
    Auth\AuthenticatedSessionController,
    Auth\NewPasswordController
};
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', fn() => view('welcome'));

// Rutas de autenticación
Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


// Rutas protegidas para autenticados
Route::middleware('auth')->group(function () {
    // Perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Recursos con acceso general
    Route::resources([
        'seguimientos' => SeguimientoController::class,
        'rutinas' => RutinaController::class,
        'ejercicios' => EjercicioController::class,
    ]);
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


