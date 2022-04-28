<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Job Index route
Route::resource('/', 'App\Http\Controllers\JobController');
// Route::get('/', 'App\Http\Controllers\JobController@index');

//job show route
Route::get('jobs/{id}/{job}', 'App\Http\Controllers\JobController@show')->name('job.show');
Route::get('/create', 'App\Http\Controllers\JobController@create')->name('job.create');
Route::post('/create', 'App\Http\Controllers\JobController@store')->name('job.store');
Route::get('/myjobs', 'App\Http\Controllers\JobController@myjobs')->name('my.jobs');
Route::get('/{id}/edit', 'App\Http\Controllers\JobController@edit')->name('job.edit');
Route::post('jobs/{id}/edit', 'App\Http\Controllers\JobController@update')->name('job.update');
//employer cav view applicants
Route::get('jobs/applications', 'App\Http\Controllers\JobController@applicant')->name('applicant');
// jobs listing
Route::get('jobs/alljobs', 'App\Http\Controllers\JobController@allJobs')->name('alljobs');

//Company Index route
Route::resource('/company', 'App\Http\Controllers\CompanyController')->middleware('auth');// i added this route

Route::get('/company/{id}/{company}', 'App\Http\Controllers\CompanyController@index')->name('company.index')->middleware('auth');
Route::get('company/create', 'App\Http\Controllers\CompanyController@create')->name('company.view');;//for create page
Route::post('company/create', 'App\Http\Controllers\CompanyController@store')->name('company.store');// To make the form in create page update
Route::post('company/coverPhoto', 'App\Http\Controllers\CompanyController@coverPhoto')->name('cover.photo');// To make the form in create page update
Route::post('company/logo', 'App\Http\Controllers\CompanyController@logo')->name('logo');// To make the form in create page update



//User Profile
Route::resource('/profile', 'App\Http\Controllers\UserController')->middleware('auth');
// Route::get('/user/profile', 'App\Http\Controllers\UserController@index');

//Updater User seeker profile information
Route::post('/profile/create', 'App\Http\Controllers\UserController@store')->name('profile.create')->middleware('auth');
Route::post('/coverletter', 'App\Http\Controllers\UserController@coverletter')->name('cover.letter')->middleware('auth');
Route::post('/resume', 'App\Http\Controllers\UserController@resume')->name('resume')->middleware('auth');
Route::post('/user/avatar', 'App\Http\Controllers\UserController@avatar')->name('avatar'); 

//Employee view
Route::view('employer/register','auth.passwords.employer-register')->name('employerRegister'); //this gets the file directly from the views no need to create a controller
Route::post('employer/register', 'App\Http\Controllers\EmployerRegisterController@employerRegister')->name('emp.register'); //this gets employer registration form

//Apply form in jobs/show
Route::post('/applications/{id}', 'App\Http\Controllers\JobController@apply')->name('apply');