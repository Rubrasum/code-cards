<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizCardController;
use App\Jobs\incrementPlayerScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Home page plus DB check
Route::get('/', function() {
    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
    return view('welcome');
});
/*
 * Authentication Routes
 */
// Registration
Route::get('/signup', [AuthController::class, 'signup'])->name('registration');
Route::post('/signup', [AuthController::class, 'registration']);
// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout-other-devices', [AuthController::class, 'logout-other-devices']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');


Route::get('/quizcard', [QuizCardController::class, 'index']);

Route::resource('quizcards', QuizCardController::class);

