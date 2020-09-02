<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'layout' => 'layouts/user',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','userAuth'],
    ],
    function () {
       Route::group(['prefix' => 'user'], function () {
            Route::livewire('/', 'user.home')->name('home.page');
            Route::get('/logout', function(){
                Auth::logout();
                return redirect(route('logout'));
            })->name('logout');
       });
    }
);
