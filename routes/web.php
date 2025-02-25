<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayattesController;
use App\Http\Controllers\TesidcController;
use App\Http\Controllers\PetugasuksController;
use App\Http\Controllers\PetugaspukesmasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PriodeController;
use App\Models\Petugasuks;
use App\Models\Priode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('pages.backend.dashboard');
// })->name('dashboard');


Route::get('/login',[ AuthController::class, 'index'  ])->name('login');
Route::post('/login/post',[ AuthController::class, 'post'  ])->name('login.post');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// Daftar Sekolah 

Route::middleware('auth')->group(function () {
Route::get('/sekolah',[ SekolahController::class, 'index'  ])->name('sekolah.index');
Route::get('/sekolah/create',[ SekolahController::class, 'create'  ])->name('sekolah.create');
Route::post('/sekolah/store',[ SekolahController::class, 'store'  ])->name('sekolah.store');
Route::post('/sekolah/import-sekolah',[ SekolahController::class, 'importExcel'  ])->name('sekolah.import');
Route::post('/sekolah/update/{id}',[ SekolahController::class, 'update'  ])->name('sekolah.update');
Route::get('/sekolah/delete/{id}',[ SekolahController::class, 'destroy'  ])->name('sekolah.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/priode',[ PriodeController::class, 'index'  ])->name('priode.index');
    // Route::get('/sekolah/create',[ SekolahController::class, 'create'  ])->name('sekolah.create');
    Route::post('/priode/store',[ PriodeController::class, 'store'  ])->name('priode.store');
    // Route::post('/sekolah/import-sekolah',[ SekolahController::class, 'importExcel'  ])->name('sekolah.import');
    Route::post('/priode/update/{id}',[ PriodeController::class, 'update'  ])->name('priode.update');
    Route::get('/priode/delete/{id}',[ PriodeController::class, 'destroy'  ])->name('priode.delete');
    
    });
    


Route::middleware('auth')->group(function () {
Route::get('/suku',[ SukuController::class, 'index'  ])->name('suku.index');
Route::post('/suku/store',[ SukuController::class, 'store'  ])->name('suku.store');
// Route::post('/suku/import-suku',[ SukuController::class, 'importExcel'  ])->name('suku.import');
Route::post('/suku/update/{id}',[ SukuController::class, 'update'  ])->name('suku.update');
Route::get('/suku/delete/{id}',[ SukuController::class, 'destroy'  ])->name('suku.delete');


});

Route::middleware('auth')->group(function () {
Route::get('/puskesmas',[ PuskesmasController::class, 'index'  ])->name('puskesmas.index');
Route::post('/puskesmas/store',[ PuskesmasController::class, 'store'  ])->name('puskesmas.store');
// Route::post('/puskesmas/import-puskesmas',[ PuskesmasController::class, 'importExcel'  ])->name('puskesmas.import');
Route::post('/puskesmas/update/{id}',[ PuskesmasController::class, 'update'  ])->name('puskesmas.update');
Route::get('/puskesmas/delete/{id}',[ PuskesmasController::class, 'destroy'  ])->name('puskesmas.delete');
});


Route::middleware('auth')->group(function () {

Route::get('/siswa',[ SiswaController::class, 'index'  ])->name('siswa.index');
Route::post('/siswa/store',[ SiswaController::class, 'store'  ])->name('siswa.store');
Route::post('/siswa/import-siswa',[ SiswaController::class, 'importExcel'  ])->name('siswa.import');
Route::post('/siswa/update/{id}',[ SiswaController::class, 'update'  ])->name('siswa.update');
Route::get('/siswa/delete/{id}',[ SiswaController::class, 'destroy'  ])->name('siswa.delete');
Route::get('/siswa/download-format',[ SiswaController::class, 'downloadFile'  ])->name('siswa.download');


Route::get('/',[ DashboardController::class, 'index'  ])->name('dashboard.index');

});


Route::middleware('auth')->group(function () {
Route::get('/tesidc/{id}',[ TesidcController::class, 'index'  ])->name('tesidc.index');
Route::post('/tesidc/store',[ TesidcController::class, 'store'  ])->name('tesidc.store');
Route::get('/hasiltes/{id}',[ TesidcController::class, 'hasiltes'  ])->name('tesidc.show');
Route::get('/riwayattes',[ RiwayattesController::class, 'index'  ])->name('tesidc.riwayat');
Route::get('/riwayat-sekolah',[ RiwayattesController::class, 'riwayattessekolah'  ])->name('tesidc.riwayat-sekolah');
Route::get('/riwayattes/{id}',[ RiwayattesController::class, 'show'  ])->name('tesidc.showbyid');
Route::get('/riwayat-tes-sekolah-detail/{id}',[ RiwayattesController::class, 'riwayattessekolahall'  ])->name('tesidc.riwayat-sekolah-all');

});


Route::middleware('auth')->group(function () {
Route::get('/petugasuks',[ PetugasuksController::class, 'index'  ])->name('petugasuks.index');
Route::post('/petugasuks/store',[ PetugasuksController::class, 'store'  ])->name('petugasuks.store');
Route::post('/petugasuks/update/{id}',[ PetugasuksController::class, 'update'  ])->name('petugasuks.update');
Route::get('/petugasuks/delete/{id}',[ PetugasuksController::class, 'destroy'  ])->name('petugasuks.delete');

Route::get('/petugaspukesmas',[ PetugaspukesmasController::class, 'index'  ])->name('petugaspukesmas.index');
Route::post('/petugaspukesmas/store',[ PetugaspukesmasController::class, 'store'  ])->name('petugaspukesmas.store');
Route::post('/petugaspukesmas/update/{id}',[ PetugaspukesmasController::class, 'update'  ])->name('petugaspukesmas.update');
Route::get('/petugaspukesmas/delete/{id}',[ PetugaspukesmasController::class, 'destroy'  ])->name('petugaspukesmas.delete');
Route::get('/petugaspukesmas/daftar-sekolah',[ PetugaspukesmasController::class, 'kecamatanbypetugas'  ])->name('petugaspukesmas.daftarsekolah');
Route::get('/petugaspukesmas/siswa-by-sekolah/{id}',[ PetugaspukesmasController::class, 'siswabysekolah'  ])->name('petugaspukesmas.siswabysekolah');

Route::get('/profile',[ ProfileController::class, 'index'  ])->name('profile.index');
});
