<?php

use App\Models\StructureProfile;
use App\View\Components\GuestLayout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\GovController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GuestController;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\EnsureUserIsSuperAdmin;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {});



Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/pemerintahan', [GuestController::class, 'gov'])->name('gov');
Route::get('/demografi', [GuestController::class, 'demo'])->name('demo');
Route::get('/geografi', [GuestController::class, 'geo'])->name('geo');
Route::get('/berita', [GuestController::class, 'news'])->name('news');
Route::get('/berita/content/{news:slug}', [GuestController::class, 'content'])->name('content');
Route::get('/layanan', [GuestController::class, 'service'])->name('service');

// sejarah 
Route::get('/sejarah', function () {
    $structure = StructureProfile::first();
    return view('app.page.sejarah', compact('structure'));
})->name('profil.show');

Route::middleware([])->prefix('/dashboard')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dash.home');
    Route::put('/home', [HomeController::class, 'update'])->name('dash.home.update');

    // for news
    Route::get('/berita', [NewsController::class, 'index'])->name('dash.news');
    Route::post('/berita', [NewsController::class, 'store'])->name('dash.news');
    Route::delete('/berita/delete/{id}', [NewsController::class, 'delete'])->name('dash.news.delete');
    Route::get('/berita/edit/{id}', [NewsController::class, 'edit'])->name('dash.news.edit');
    Route::put('/berita/update/{id}', [NewsController::class, 'update'])->name('dash.news.update');

    // for gov
    Route::get('/pemerintahan', [GovController::class, 'edit'])->name('dash.pemerintahan.edit');
    Route::put('/pemerintahan', [GovController::class, 'update'])->name('dash.pemerintahan.update');

    // for geo
    Route::get('/geo', [GeoController::class, 'index'])->name('dash.geo');
    Route::post('/geo/store-village', [GeoController::class, 'storeVillageArea'])->name('dash.geo.village');
    Route::post('/geo/store-category', [GeoController::class, 'storeCategory'])->name('dash.geo.category');
    Route::delete('/geo/delete-category/{id}', [GeoController::class, 'destroyCategory'])->name('dash.geo.category.delete');
    Route::put('/geo/update-category', [GeoController::class, 'updateCategory'])->name('dash.geo.category.update');
    Route::post('/dashboard/geo/store-border', [GeoController::class, 'storeBorder'])->name('dash.geo.border.store');
    Route::delete('/dashboard/geo/delete-border/{id}', [GeoController::class, 'destroyBorder'])->name('dash.geo.border.delete');


    // for demo
    Route::get('/demo', [DemoController::class, 'index'])->name('dash.demo');
    Route::post('/demo/store', [DemoController::class, 'store'])->name('dash.demo.store');
    Route::post('/demo/import', [DemoController::class, 'import'])->name('dash.demo.import');
    Route::delete('/demo/delete/{id}', [DemoController::class, 'delete'])->name('dash.demo.delete');
    Route::put('/demo/update/{id}', [DemoController::class, 'update'])->name('dash.demo.update');

    // for service
    Route::get('/service', [ServiceController::class, 'index'])->name('dash.service');

    // for setting account
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/profile/password', function (Illuminate\Http\Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Password berhasil diperbarui.');
    })->name('profile.password.update');

    Route::middleware([EnsureUserIsSuperAdmin::class])->group(function () {
        Route::get('/super-admin', [SuperAdminController::class, 'edit'])->name('super-admin.edit');
        Route::post('/super-admin', [SuperAdminController::class, 'update'])->name('super-admin.update');
        Route::delete('/hapus-user/{user}', [ProfileController::class, 'destroyByAdmin'])
            ->name('user.destroy.byAdmin');
    });
});




require __DIR__ . '/auth.php';
