<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\HomeController AS AdminHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('/', HomeController::class)->name('index');
    });
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware('admin')->group(function () {
        Route::get('/', AdminHomeController::class)->name('index');
        Route::controller(AdminController::class)->group(function () {
            Route::resource('admins', AdminController::class);
        });
        Route::controller(RoleController::class)->group(function () {
            Route::resource('roles', RoleController::class);
        });
        Route::controller(UserController::class)->group(function () {
            Route::resource('users', UserController::class);
        });
    });
    Route::view('login', 'admin-dashboard.auth.login')->name('login');

require __DIR__.'/adminAuth.php';
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

