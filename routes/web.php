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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', array('uses' => 'LoginController@showLogin'))->name('home');
// route to show the login form
Route::get('login', array('uses' => 'LoginController@showLogin'))->name('login.showLogin');
// route to process the form
Route::post('login', array('uses' => 'LoginController@doLogin'))->name('login.doLogin');
// route to procss logout
Route::get('logout', array('uses' => 'LoginController@doLogout'))->name('login.doLogout');

Route::get('home', array('uses' => function(){
    //return view('welcome');
    //return redirect()->route('route.name');
    return redirect()->route('company.create');
}))->name('home.index');

Route::group(['middleware' => 'memberMiddleWare'], function(){
    Route::match(['get', 'post'], 'users/list', array('uses' => 'UserController@listUsers'))->name('user.list');
    Route::match(['get', 'post'], 'companies/list', array('uses' => 'CompanyController@listCompanies'))->name('company.list');
    Route::match(['get', 'post'], 'departments/list', array('uses' => 'DepartmentController@listDepartments'))->name('department.list');
    Route::match(['get', 'post'], 'factories/list', array('uses' => 'FactoryController@listFactories'))->name('factory.list');
    Route::match(['get', 'post'], 'lines/list', array('uses' => 'LineController@listLines'))->name('line.list');
});

Route::group(['middleware' => 'superAdminMiddleware'], function(){
    Route::get('backstage/user-roles/create', array('uses' => 'UserRoleController@create'))->name('userRole.create');
    Route::post('backstage/user-roles/create', array('uses' => 'UserRoleController@store'))->name('userRole.store');
    Route::match(['get', 'post'], 'user-roles/list', array('uses' => 'UserRoleController@listUserRoles'))->name('userRole.list');
    Route::get('backstage/user-roles/{userRole}/destroy', array('uses' => 'UserRoleController@destroy'))->name('userRole.destroy');
    
    Route::get('backstage/companies/create', array('uses' => 'CompanyController@create'))->name('company.create');
    Route::post('backstage/companies/create', array('uses' => 'CompanyController@store'))->name('company.store');
    Route::get('backstage/companies/{company}/edit', array('uses' => 'CompanyController@edit'))->name('company.edit');
    Route::post('backstage/companies/{company}/edit', array('uses' => 'CompanyController@update'))->name('company.update');
    
    Route::get('backstage/departments/create', array('uses' => 'DepartmentController@create'))->name('department.create');
    Route::post('backstage/departments/create', array('uses' => 'DepartmentController@store'))->name('department.store');
    Route::get('backstage/departments/{department}/edit', array('uses' => 'DepartmentController@edit'))->name('department.edit');
    Route::post('backstage/departments/{department}/edit', array('uses' => 'DepartmentController@update'))->name('department.update');
    
    Route::get('backstage/factories/create', array('uses' => 'FactoryController@create'))->name('factory.create');
    Route::post('backstage/factories/create', array('uses' => 'FactoryController@store'))->name('factory.store');
    Route::get('backstage/factories/{factory}/edit', array('uses' => 'FactoryController@edit'))->name('factory.edit');
    Route::post('backstage/factories/{factory}/edit', array('uses' => 'FactoryController@update'))->name('factory.update');
    
    Route::get('backstage/lines/create', array('uses' => 'LineController@create'))->name('line.create');
    Route::post('backstage/lines/create', array('uses' => 'LineController@store'))->name('line.store');
    Route::get('backstage/lines/{line}/edit', array('uses' => 'LineController@edit'))->name('line.edit');
    Route::post('backstage/lines/{line}/edit', array('uses' => 'LineController@update'))->name('line.update');
    
    Route::get('backstage/operations/create', array('uses' => 'OperationController@create'))->name('operation.create');
    Route::post('backstage/operations/create', array('uses' => 'OperationController@store'))->name('operation.store');
    Route::get('backstage/operations/{operation}/edit', array('uses' => 'OperationController@edit'))->name('operation.edit');
    Route::post('backstage/operations/{operation}/edit', array('uses' => 'OperationController@update'))->name('operation.update');
    
    Route::get('backstage/machine-types/create', array('uses' => 'MachineTypeController@create'))->name('machineType.create');
    Route::post('backstage/machine-types/create', array('uses' => 'MachineTypeController@store'))->name('machineType.store');
    Route::get('backstage/machine-types/{machineType}/edit', array('uses' => 'MachineTypeController@edit'))->name('machineType.edit');
    Route::post('backstage/machine-types/{machineType}/edit', array('uses' => 'MachineTypeController@update'))->name('machineType.update');
    
    Route::get('backstage/operation-combine-types/create', array('uses' => 'OperationCombineType@create'))->name('operationCombineType.create');
    Route::post('backstage/operation-combine-types/create', array('uses' => 'OperationCombineType@store'))->name('operationCombineType.store');
    Route::get('backstage/operation-combine-types/{operationCombineType}/edit', array('uses' => 'OperationCombineType@edit'))->name('operationCombineType.edit');
    Route::post('backstage/operation-combine-types/{operationCombineType}/edit', array('uses' => 'OperationCombineType@update'))->name('operationCombineType.update');
});
