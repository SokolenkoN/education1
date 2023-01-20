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


Route::get('/registration', 'App\Http\Controllers\UserController@index')->name('registration.index');
Route::post('/registration/reg', 'App\Http\Controllers\UserController@registration')->name('registration');

Route::post('/login1', 'App\Http\Controllers\UserController@login')->name('login1');
Route::get('/login', 'App\Http\Controllers\UserController@loginindex')->name('login.index');

Route::get('/logout1', 'App\Http\Controllers\UserController@logout')->name('logout1');
Route::view('/privat', 'user.privat')->middleware('auth')->name('privat');

Route::get('/start', 'App\Http\Controllers\StartController@index')->name('start.index');

Route::get('/characters','App\Http\Controllers\Character\IndexController')->name('character.index');
Route::get('/character/create','App\Http\Controllers\Character\CreateController')->name('character.create');
Route::post('/characters','App\Http\Controllers\Character\StoreController')->name('character.store');
Route::get('/characters/{character}','App\Http\Controllers\Character\ShowController')->name('character.show');
Route::get('/characters/{character}/edit','App\Http\Controllers\Character\EditController')->name('character.edit');
Route::patch('/character/{character}','App\Http\Controllers\Character\UpdateController')->name('character.update');
Route::delete('/character/{character}','App\Http\Controllers\Character\DestroyController')->name('character.destroy');

Route::get('/fractions','App\Http\Controllers\FractionController@index')->name('fraction.index');
Route::get('/fraction/create','App\Http\Controllers\FractionController@create')->name('fraction.create');
Route::post('/Fractions','App\Http\Controllers\FractionController@store')->name('fraction.store');
Route::get('/fractions/{fraction}','App\Http\Controllers\FractionController@show')->name('fraction.show');
Route::get('/fractions/{fraction}/edit','App\Http\Controllers\FractionController@edit')->name('fraction.edit');
Route::patch('/fraction/{fraction}/edit','App\Http\Controllers\FractionController@update')->name('fraction.update');
Route::delete('/fraction/{fraction}','App\Http\Controllers\FractionController@destroy')->name('fraction.destroy');

Route::get('/socials','App\Http\Controllers\SocialsController@index')->name('socials.index');

Route::get('/profile','App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('/profile/character','App\Http\Controllers\ProfileController@show')->name('profile.character');
Route::get('/profile/edit','App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('/profile/up/{user}','App\Http\Controllers\ProfileController@upload')->name('profile.upload');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/admin','MainController')->name('admin.main');
    Route::get('/admin/character','CharacterController')->name('admin.character');

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
    return view('auth.verify-email');
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


