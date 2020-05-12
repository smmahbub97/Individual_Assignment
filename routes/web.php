<?php



Route::get('/', function () {
    return redirect('system/supportstaff/login');
});

//login
Route::get('/system/supportstaff/login', 'LoginController@index')->name('login.index');
Route::post('/system/supportstaff/login', 'LoginController@verification')->name('login.index');

//register
Route::get('/system/register', 'registerController@index')->name('register.index');
Route::post('/system/register', 'registerController@verification')->name('register.index');

Route::group(['middleware'=>['sess']], function(){

    //admin_home
    Route::get('/system/admin/home', 'adminController@index')->name('admin.index');
    
    Route::get('/system/manager/home', 'managerController@index')->name('manager.index');

    Route::get('/system/category', 'adminController@view_category')->name('admin.category');
   
   /* //view all list for admin
    Route::get('/system/supportstaff', 'adminController@view_all_staff')->name('admin.allstaff');
    //add new
    Route::get('/system/supportstaff/add', 'adminController@add')->name('admin.add');
    //insert
    Route::post('/system/supportstaff/add', 'adminController@insert')->name('admin.add');
    //delete bussmanager for admin
    Route::get('/system/busmanager/{id}/delete', 'adminController@deletemanager')->name('admin.deletemanager');
    //manager_home
    
    Route::get('/system/buscounter', 'managerController@view_counter')->name('manager.allcounter');

    Route::get('/system/buscounter/add', 'managerController@add_bus')->name('manager.addbus');

    Route::post('/system/buscounter/add', 'managerController@insert_bus')->name('manager.addbus');

    Route::get('/system/buscounter/{id}/edit', 'managerController@edit_bus')->name('manager.editbus');
    
    Route::post('/system/buscounter/{id}/edit', 'managerController@update_bus')->name('manager.editbus');
*/
    
});

//logout
Route::get('/logout', 'logoutController@index');