<?php


use App\Http\Controllers\LoginController;
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

// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/quizcard', [QuizCardController::class, 'index']);

Route::resource('quizcards', QuizCardController::class);

