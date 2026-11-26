<?php



use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatatanController;

use App\Models\Kontak;

use App\Http\Controllers\KontakController;



Route::get('/', function () {

    return view('welcome');
});



Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan');
    Route::get('/catatan/tambah', [CatatanController::class, 'create']);
    Route::post('/catatan', [CatatanController::class, 'store']);
    Route::get('/catatan/arsip', [CatatanController::class, 'arsip']);
    Route::get('/catatan/export', [CatatanController::class, 'export']);
    Route::get('/catatan/import', [CatatanController::class, 'importForm']);
    Route::post('/catatan/import', [CatatanController::class, 'import']);
    Route::get('/catatan/{id}', [CatatanController::class, 'show']);
    Route::get('/catatan/{id}/edit', [CatatanController::class, 'edit']);
    Route::put('/catatan/{id}', [CatatanController::class, 'update']);
    Route::delete('/catatan/{id}', [CatatanController::class, 'destroy']);

    Route::post('/catatan/{id}/archive', [CatatanController::class, 'archive']);
    Route::post('/catatan/{id}/unarchive', [CatatanController::class, 'unarchive']);
});




Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/kontak/tambah', [KontakController::class, 'create']);
Route::get('/kontak/create', [KontakController::class, 'create'])->name('kontak.create');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/kontak/{id}', [KontakController::class, 'show'])->name('kontak.show');

Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');

Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');

Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');





require __DIR__ . '/auth.php';
