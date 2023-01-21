<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::view('/privat', 'user.privat')->middleware('auth')->name('privat');

Route::get('/start', 'App\Http\Controllers\StartController@index')->name('start.index');

Route::get('/socials','App\Http\Controllers\SocialsController@index')->name('socials.index');

Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('/registration/main', 'IndexController')->name('registration.index');
    Route::post('/registration', 'RegistrationController')->name('registration');
    Route::post('/login', 'LoginController')->name('login');
    Route::get('/login/main', 'LoginIndexController')->name('login.index');
    Route::get('/logout', 'LogoutController')->name('logout');
});

Route::group(['namespace' => 'App\Http\Controllers\Character'], function () {
    Route::get('/characters','IndexController')->name('character.index');
    Route::get('/character/create','CreateController')->name('character.create');
    Route::post('/characters','StoreController')->name('character.store');
    Route::get('/characters/{character}','ShowController')->name('character.show');
    Route::get('/characters/{character}/edit','EditController')->name('character.edit');
    Route::patch('/character/{character}','UpdateController')->name('character.update');
    Route::delete('/character/{character}','DestroyController')->name('character.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Fraction'], function () {
    Route::get('/fractions','IndexController')->name('fraction.index');
    Route::get('/fraction/create','CreateController')->name('fraction.create');
    Route::post('/Fractions','StoreController')->name('fraction.store');
    Route::get('/fractions/{fraction}','ShowController')->name('fraction.show');
    Route::get('/fractions/{fraction}/edit','EditController')->name('fraction.edit');
    Route::patch('/fraction/{fraction}/edit','UpdateController')->name('fraction.update');
    Route::delete('/fraction/{fraction}','DestroyController')->name('fraction.destroy');
});

Route::get('/profile','App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('/profile/character','App\Http\Controllers\ProfileController@show')->name('profile.character');
Route::get('/profile/edit','App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('/profile/up/{user}','App\Http\Controllers\ProfileController@upload')->name('profile.upload');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/admin','MainController')->name('admin.main');
    Route::get('/admin/character','CharacterController')->name('admin.character');
    Route::get('/admin/character_create','CharacterCreateController')->name('admin.character.create');

    Route::get('/admin/role','RoleController@index')->name('admin.role');
    Route::get('/admin/role/create','RoleController@create')->name('admin.role.create');
    Route::post('/admin/role/store','RoleController@store')->name('admin.role.store');
    Route::get('/admin/role/edit','RoleController@edit')->name('admin.role.edit');
    Route::patch('/admin/role/update','RoleController@update')->name('admin.role.update');
    Route::delete('/admin/role/del','RoleController@destroy')->name('admin.role.destroy');

    Route::get('/admin/user','UserController@index')->name('admin.user');
    Route::get('/admin/user/create','UserController@create')->name('admin.user.create');
    Route::post('/admin/user/store','UserController@store')->name('admin.user.store');
    Route::delete('/admin/user/del','UserController@destroy')->name('admin.user.destroy');
});


Route::get('/email/verify', function () {
    return view('profile.user_edit');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('start');
})->middleware(['auth', 'signed'])->name('verification.verify');



//Auth::routes();
   //Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


