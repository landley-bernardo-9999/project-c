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

Route::get('/dashboard', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/dashboard', function () {
    if(Auth::guest()){
        return view('auth.login');
    }
    else
        return view('/dashboard');
});

Auth::routes(['verify'=>true]);

Route::get('/dashboard', 'HomeController@index')->middleware('verified');

Route::get('/', 'HomeController@index')->middleware('verified');

Route::resources([
                    'rooms' => 'RoomController',
                    'residents' => 'ResidentController',
                    'transactions' => 'TransactionController',
                    'owners' => 'OwnerController',
                    'repairs' => 'RepairController',
                    'violations' => 'ViolationController',
                    'supplies' => 'SupplyController',
                    'personnels' => 'PersonnelController',
                    'stocks' => 'StockController',
                    'inventory' => 'InventoryController'
                ]);

Route::get('/search/rooms{s?}', 'RoomController@index')->where('s', '[\w\d]+');

Route::get('/search/residents{s?}', 'ResidentController@index')->where('s', '[\w\d]+');

Route::get('/search/repairs{s?}', 'RepairController@index')->where('s', '[\w\d]+');

Route::get('/search/owners{s?}', 'OwnerController@index')->where('s', '[\w\d]+');

Route::get('/search/violations{s?}', 'ViolationController@index')->where('s', '[\w\d]+');

Route::get('/search/personnels{s?}', 'PersonnelController@index')->where('s', '[\w\d]+');

Route::get('/search/supplies{s?}', 'SupplyController@index')->where('s', '[\w\d]+');