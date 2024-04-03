<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('app');
})
->name('application');


Route::post('/submit-form', [FormController::class, 'submitForm']);
?>