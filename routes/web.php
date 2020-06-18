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

// Main page
Route::get('/', 'HomeController@index')->name('home');

// Delete File
Route::get('/file-check/', 'FilestoreController@CheckFiles') -> name('file-check');
Route::get('/file-check-interface/', 'FilestoreController@CheckFilesInterface') -> name('file-check-interface');

// Send File
Route::post('/file-send/', 'FormController@FormSubmit') -> name('file-send');

// Soft versions
Route::get('/version', 'FormController@Versions') -> name('versions');

// File download
Route::get('/go/{file_link}', 'FilestoreController@index') -> name('go');
Route::get('/download/{file_link}', 'FilestoreController@download') -> name('download_file');

// Domain find
Route::get('/domain_find/{domain}', 'OurDomainsController@domain_find') -> name('domain_find');



Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

//Route::get('/send_message', function (){
//    App\Jobs\SendMessage::dispatch('TEST MESSAGE')->delay(now()->addMinutes(10));
//});

Auth::routes();

// Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
    // Dashboard
    Route::get('/' , 'DashboardController@dashboard') -> name('admin.index');

    //Domains (New var - resource)
    Route::resource('/domains', 'DomainController', [
        'as' => 'admin',
        'except' => ['show']
        ]);


    Route::get('/files' , 'DashboardController@dashboard_filedir') -> name('admin.filesdir');
    Route::get('/settings' , 'DashboardController@dashboard_settings') -> name('admin.settings');
    Route::get('/{id}' , 'DashboardController@dashboard_onefile') -> name('admin.file');
    Route::get('/{id}/downloaders', 'FileDownloadersController@downloaders') -> name('admin.downloaders');

});


