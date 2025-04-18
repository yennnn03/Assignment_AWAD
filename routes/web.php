<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects', [ProjectController::class,'store'])->name('projects.store');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::get('/projects/{project}/bids/create', [BidController::class, 'create'])->name('bids.create');
Route::post('/projects/{project}/bids', [BidController::class, 'store'])->name('bids.store');

Route::get('/register', [UserController::class,'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');

Route::get('/projects/{project}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
Route::post('projects/{project}/milestones', [MilestoneController::class,'store'])->name('milestones.store');

Route::get('/projects/{project}/milestones/index', [MilestoneController::class,'index'])->name('milestones.index');
Route::get('/projects/{project}/milestones/{milestone}/edit', [MilestoneController::class,'edit'])->name('milestones.edit');
Route::put('/projects/{project}/milestones/{milestone}', [MilestoneController::class,'update'])->name('milestones.update');

Route::get('/milestones/{milestone}/payment', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/milestones/{milestone}/payment', [PaymentController::class, 'store'])->name('payment.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
