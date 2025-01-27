<?php
use App\Models\Data;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataImportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('master');
// });



Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard.index');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::get('/data/index', [App\Http\Controllers\DataController::class, 'showImportForm'])->name('data.index');
Route::post('/data/index', [App\Http\Controllers\DataController::class, 'import'])->name('data.import');
Route::get('download/{filename}', [App\Http\Controllers\DataController::class,'download'])->name('data.format');
Route::get('/data/index', [App\Http\Controllers\DataController::class, 'showForm'])->name('data.index');
Route::get('/data/{id}/edit', [App\Http\Controllers\DataController::class, 'edit'])->name('data.edit');
Route::put('/data/{id}', [App\Http\Controllers\DataController::class, 'update'])->name('data.update');
Route::delete('/data/destroy/{id_data}', [App\Http\Controllers\DataController::class, 'destroy'])->name('data.destroy');


Route::post('/upload/process-excel', [App\Http\Controllers\ExcelController::class, 'processExcel'])->name('process-excel');
Route::get('/export-excel', [App\Http\Controllers\DataController::class, 'exportExcel'])->name('export.excel');
Route::get('/data/klasifikasi', [App\Http\Controllers\KlasifikasiController::class, 'index'])->name('data.klasifikasi');
Route::post('/data/klasifikasi/prediksi', [App\Http\Controllers\KlasifikasiController::class, 'prediksiSatu'])->name('data.prediksi');
Route::post('/data/klasifikasi/prediksi-semua', [App\Http\Controllers\KlasifikasiController::class, 'prediksiSemua'])->name('data.prediksiSemua');
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
Route::get('/report/pdf', [App\Http\Controllers\ReportController::class, 'downloadPdf'])->name('report.download');

