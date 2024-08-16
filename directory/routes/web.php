<?php

use Illuminate\Support\Facades\Route;
use App\Models\Institute;

Route::resource('institutes', 'App\Http\Controllers\InstituteController');

Route::get('/', function () {
    // invoke the index method of the InstituteController
    return redirect()->route('institutes.index');
    
});