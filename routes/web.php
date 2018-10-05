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
# Middleware group if user is successfully logged in

    //Route que carga el inicio de session
   
    Route::get('/', function(){
        return view('landing');
    });
    Route::get('/login', function(){
        return view('landing');
    });
    //Route para autenticacion
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    //Route generales con traer vistas y Rest principales
   
    Route::resource('edifices', 'EdificeController');
    Route::resource('roles', 'RoleController');
    Route::resource('places', 'PlaceController');
    Route::resource('users', 'UserController');
    Route::resource('visitors', 'VisitorController');

    Route::get('visitorsList', 'VisitorController@visitorList');

    Route::get('grafic', 'VisitorController@getGrafic');
    
    //Route para traer datos en datatables
    
    Route::get('edifice', 'EdificeController@getEdifice')->name('datatable.edifice');

    Route::get('role', 'RoleController@getRole')->name('datatable.role');
    
    Route::get('place', 'PlaceController@getPlace')->name('datatable.place');
    
    Route::get('visitor', 'VisitorController@getVisitor')->name('datatable.visitor');

    Route::get('visitants', 'VisitorController@getVisitors')->name('datatable.visitors');

    Route::get('usersystem', 'UserController@getUserSystem')->name('datatable.usersystem');


    //Route para eliminar un registro por ajax

    Route::get('destroyedifice', 'EdificeController@destroyEdifice');

    Route::get('destroyrole', 'RoleController@destroyRole');

    Route::get('destroyplace', 'PlaceController@destroyPlace');

    Route::get('destroyvisitor', 'visitorController@destroyVisitor');

    Route::get('destroyusersystem', 'UserController@destroyUserSystem');
    

    //Route peticiones ajax para mostrar detalle de actividad recibiendo variables idcompany y fechaActividad
    
    
    //Route para buscar un visitante registrado
    Route::get('getvisitor', 'VisitorController@getSearchVisitor');
    
    //Route para guardar visitante y asignarlo a oficina
    Route::get('storevisitor', 'VisitorController@storeVisitorPlace');

    //Route para guardar visitante y asignarlo a oficina
    Route::get('outvisitor', 'VisitorController@outVisitor');

    //Route para importar excel

    Route::post('/import', 'PlaceController@importPlace');

    Route::get('/import/get', 'PlaceController@getImport');

    
});