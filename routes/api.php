<?php

/**
 * Api routes file
 * base endpoint /api/{route}
 */

Route::post('companies/attach/employess', 'CompanyController@attachEmployees');
Route::post('companies/detach/employess', 'CompanyController@detachEmployees');

Route::resources([
    'companies' => 'CompanyController',
    'employees' => 'EmployeeController'
]);
