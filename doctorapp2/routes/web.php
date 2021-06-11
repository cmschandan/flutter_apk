<?php
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

Route::get('/', function () {
    return view('pages.index');
});


Auth::routes();

/**
 * creating route for verifying user email
 */

Route::get('/home', 'DoctorController@index')->name('home');

Route::get('/user/activation/{token}','Auth\RegisterController@userActivation');

Route::get('/doctor-login', 'DoctorController@index')->name('login.doctor');

Route::post('/doctor/logout', 'Auth\LoginController@logoutDoctor')->name('doctor.logout');

/*Add Doctor profile Details*/
Route::get('/addprofile','DoctorController@AddDoctorProfile')->name('add.doctor.profile');

Route::post('/updateProfileDetails','DoctorController@StoreDoctorProfile')->name('store.doctor.profile');

/*Test register route*/
// Route::post('register','RegisterController@register')->name('register');