<?php

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'layout' => 'layouts/visitor',

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','redirectIfAuthenticated']
    ],function () {
        Route::livewire('/', 'home.home')->name('home');
        Route::livewire('/login', 'home.login')->name('login');
        Route::livewire('/register', 'home.register')->name('register');

    }
);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','redirectIfAuthenticated']
    ],
    function () {
       //social login
        Route::get('login/{service}', 'SocialLog@redirectToProvider')->name('social.log')->where(['service'=>'^(facebook|google|twitter)$']);
        Route::get('login/{service}/callback', 'SocialLog@handleProviderCallback')->name('social.log.callback')->where(['service'=>'^(facebook|google|twitter)$']);

        //resetting password
        Route::get('/password/get/email','ResetPassword@index')->name('pass.get.email');
        Route::post('/password/send/mail','ResetPassword@sendResetMail')->name('pass.send.mail');
        Route::get('/password/reset/{email}/{token}','ResetPassword@reset')->name('pass.reset');
        Route::get('/password/create/new','ResetPassword@createNewPassword')->name('pass.create');
        Route::post('/password/save','ResetPassword@savePassword')->name('pass.save');
    }
);

