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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/',[
        'uses' => 'UserController@getLogin',
        'as' => 'Login'
    ]);
    Route::post('/login',[
        'uses' => 'UserController@postLogin',
        'as' => 'post.login'
    ]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/cashier',[
        'uses' => 'CashierController@index',
        'as' => 'cashier.index'
    ]);
    Route::get('/cashier/transaction',[
        'uses' => 'CashierController@transaction',
        'as' => 'cashier.transaction'
    ]);
    Route::get('/cashier/transaction/print/{id}',[
        'uses' => 'CashierController@printTrx',
        'as' => 'print.trx'
    ]);
    Route::get('/cashier/transaction/edit/{id}',[
        'uses' => 'CashierController@editTrx',
        'as' => 'edit.trx'
    ]);
    Route::get('/cashier/transaction/add',[
        'uses' => 'CashierController@addTrx',
        'as' => 'add.trx'
    ]);
    Route::post('/cashier/transaction/insert',[
        'uses' => 'CashierController@insertTrx',
        'as' => 'insert.trx'
        ]);
    Route::put('/cashier/transaction/update',[
        'uses' => 'CashierController@updateTrx',
        'as' => 'update.trx'
    ]);
    Route::get('/cashier/transaction/delete/{id}',[
        'uses' => 'CashierController@deleteTrx',
        'as' => 'delete.trx'
    ]);
    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin',[
        'uses' => 'AdminController@index',
        'as' => 'admin.index'
    ]);
    Route::get('/admin/cashier',[
        'uses' => 'AdminController@cashier',
        'as' => 'admin.cashier'
    ]);
    Route::get('/admin/show/cashier',[
        'uses' => 'AdminController@showCashier',
        'as' => 'show.cashier'
        ]);
    Route::post('/admin/cashier/post',[
        'uses' => 'AdminController@insertCashier',
        'as' => 'post.cashier'
    ]);
    Route::get('/admin/edit/{id}',[
        'uses' => 'AdminController@editCashier',
        'as' => 'edit.cashier'
    ]);
    Route::put('/admin/cashier/update',[
        'uses' => 'AdminController@updateCashier',
        'as' => 'update.cashier'
    ]);
    Route::get('/admin/cashier/delete/{id}',[
        'uses' => 'AdminController@deleteCashier',
        'as' => 'delete.cashier'
        ]);
    Route::get('/admin/parts',[
        'uses' => 'AdminController@getPart',
        'as' => 'admin.part'
    ]);
    Route::post('/admin/part/post',[
        'uses' => 'AdminController@insertPart',
        'as' => 'post.part'
    ]);
    Route::get('/admin/part/edit/{id}',[
        'uses' => 'AdminController@editPart',
        'as' => 'edit.part'
    ]);
    Route::put('/admin/part/update',[
        'uses' => 'AdminController@updatePart',
        'as' => 'update.part'
    ]);
    Route::get('/admin/part/delete/{id}',[
        'uses' => 'AdminController@deletePart',
        'as' => 'delete.part'
    ]);
    Route::get('/admin/show/transaction',[
        'uses' => 'AdminController@showTrx',
        'as' => 'show.trx'
    ]);
    Route::get('/admin/transaction/search',[
        'uses' => 'AdminController@searchTrx',
        'as' => 'search.trx'
    ]);
    Route::get('/admin/transaction/month',[
        'uses' => 'AdminController@monthTrx',
        'as' => 'month.trx'
    ]);
    Route::get('/admin/export/transaction',[
        'uses' => 'AdminController@export_excel',
        'as' => 'export.trx'
    ]);
    Route::get('/admin/delete/transaction/{id}',[
        'uses' => 'AdminController@deleteTrx',
        'as' => 'dlte.trx'
    ]);
});
