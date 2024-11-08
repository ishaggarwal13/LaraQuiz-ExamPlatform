<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Oauth2Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserActionsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuestionsOptionsController;
use App\Http\Controllers\ResultsController;

Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('oauth2google', [Oauth2Controller::class, 'oauth2google'])->name('oauth2google');
Route::get('googlecallback', [Oauth2Controller::class, 'googlecallback'])->name('googlecallback');
Route::get('oauth2facebook', [Oauth2Controller::class, 'oauth2facebook'])->name('oauth2facebook');
Route::get('facebookcallback', [Oauth2Controller::class, 'facebookcallback'])->name('facebookcallback');
Route::get('oauth2github', [Oauth2Controller::class, 'oauth2github'])->name('oauth2github');
Route::get('githubcallback', [Oauth2Controller::class, 'githubcallback'])->name('githubcallback');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('auth.password.reset');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('auth.password.reset');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('auth.password.email');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('auth.password.reset');

// Routes for authenticated users...
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    
    Route::resource('tests', TestsController::class);
    Route::resource('roles', RolesController::class);
    Route::post('roles_mass_destroy', [RolesController::class, 'massDestroy'])->name('roles.mass_destroy');
    
    Route::resource('users', UsersController::class);
    Route::post('users_mass_destroy', [UsersController::class, 'massDestroy'])->name('users.mass_destroy');
    
    Route::resource('user_actions', UserActionsController::class);
    Route::resource('topics', TopicsController::class);
    Route::post('topics_mass_destroy', [TopicsController::class, 'massDestroy'])->name('topics.mass_destroy');
    
    Route::resource('questions', QuestionsController::class);
    Route::post('questions_mass_destroy', [QuestionsController::class, 'massDestroy'])->name('questions.mass_destroy');
    
    Route::resource('questions_options', QuestionsOptionsController::class);
    Route::post('questions_options_mass_destroy', [QuestionsOptionsController::class, 'massDestroy'])->name('questions_options.mass_destroy');
    
    Route::resource('results', ResultsController::class);
    Route::post('results_mass_destroy', [ResultsController::class, 'massDestroy'])->name('results.mass_destroy');
});
