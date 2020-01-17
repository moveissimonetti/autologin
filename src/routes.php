<?php

Route::middleware('web')->group(function () {
    Route::get('/autologin/{id}', 'Roomies\Autologin\AutologinHandler')->middleware('signed')->name('autologin');
});
