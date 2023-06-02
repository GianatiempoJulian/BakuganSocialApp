<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BakuganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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


/*================== General View Routes ==================*/

/* - Index                                                 */

Route::get('/', [AuthController::class,'index']);

/* - Register                                              */

Route::get('/register', [AuthController::class,'register']);
Route::post('/register-auth', [AuthController::class,'registerAuth']);

/* - Login                                                 */
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login-auth', [AuthController::class,'loginAuth']);

/*==================    User Routes      ==================*/

/* - Profile                                               */
Route::get('/profile', [UserController::class,'show'])->name('profile')->middleware('auth');

/* - Edit                                                  */
Route::get('/user-edit', [UserController::class,'edit'])->name('user-edit')->middleware('auth');

/* - Update                                                */
Route::post('/user-update', [UserController::class,'update'])->name('user-update')->middleware('auth');

/* - Bakugans                                              */
Route::get('/collection', [UserController::class,'collection'])->name('collection')->middleware('auth');

/* - Add to Collection                                     */
Route::get('/add-bakugan/{id}', [UserController::class,'attachBakugan'])->middleware('auth');

/* - Delete from Collection                                 */
Route::get('/remove-bakugan/{id}', [UserController::class,'detachBakugan'])->middleware('auth');

/*==================    Bakugan Routes      ===============*/

/* - List                                                  */
Route::get('/bakugan-list', [BakuganController::class,'index'])->name('bakugan-list')->middleware('auth');


/* SOLO UN USO! PARA CARGAR ID'S EN BDD 
Route::get('/save-bakugan', [BakuganController::class,'addToDatabase'])->middleware('auth');
*/