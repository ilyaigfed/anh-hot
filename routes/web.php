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

Route::get("/", "PageController@index")->name("client.index");
Route::get("/contact", "PageController@contact")->name("client.contact");
Route::get("/reviews", "PageController@reviews")->name("client.reviews");

Route::post("/contact", "ClientFormController@contact")->name("client.form.contact");
Route::post("/subscribe", "ClientFormController@subscribe");

Route::get('/admin-panel{any}', 'PageController@admin')->where('any', '.*');
