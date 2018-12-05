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



Auth::routes(['verify'=>true]);

Route::get('/', 'HomeController@index')->name('home')->middleware('verified');;

Route::resources([
                    'rooms' => 'RoomController',
                    'residents' => 'ResidentController',
                    'owners' => 'OwnerController',
                    'repairs' => 'RepairController',
                    'violations' => 'ViolationController',
                    'supplies' => 'SupplyController',
                    'personnels' => 'PersonnelController',
                ]);

Route::get('/search/rooms{s?}', 'RoomController@index')->where('s', '[\w\d]+');