<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

});

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('users/destroy', 'PatientsController@massDestroy')->name('patients.massDestroy');

    Route::resource('patients', 'PatientsController');


    Route::post('locations_map/filter/district', 'LocationMapController@filterDistrict')->name('locations_map.filter.district');

    Route::post('locations_map/filter/moh', 'LocationMapController@filterMOH')->name('locations_map.filter.moh');

    Route::get('patient/{patient}/report/create','PatientsController@createPatientReport')->name('patient_reports.create');
    Route::post('patient/{patient}/report/create','PatientsController@storePatientReport')->name('patient_reports.store');
    Route::get('patient/{patient}/report/edit','PatientsController@editPatientReport')->name('patient_reports.edit');
    Route::put('patient/{patient}/report/edit','PatientsController@updatePatientReport')->name('patient_reports.update');

    Route::get('patient/incomplete','PatientsController@patientsWithoutReports')->name('patients.incomplete');

});
