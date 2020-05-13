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

    //admin_panel
    Route::get('/system/admin/home', 'adminController@index')->name('admin.index');
//category 
    Route::get('/system/category', 'adminController@view_category')->name('admin.category');

    Route::get('/system/editcategory/{id}/edit', 'adminController@edit')->name('admin.editcategory');

    Route::post('/system/editcategory/{id}/edit', 'adminController@update_category')->name('admin.editcategory');

    Route::get('/system/deletecategory/{id}/delete', 'adminController@deletecategory')->name('admin.deletecategory');

//tag
    Route::get('/system/tag', 'adminController@view_tag')->name('admin.tag');

    Route::get('/system/edittag/{id}/edit', 'adminController@edit_tag')->name('admin.edittag');

    Route::post('/system/edittag/{id}/edit', 'adminController@update_tag')->name('admin.edittag');

    Route::get('/system/deletetag/{id}/delete', 'adminController@deletetag')->name('admin.deletetag');








    ///user_panel
	Route::get('/system/user/home', 'userController@index')->name('user.index');

    Route::get('/system/category', 'userController@view_category')->name('user.category');

    Route::get('/system/editcategory/{id}/edit', 'userController@edit')->name('user.editcategory');

    Route::post('/system/editcategory/{id}/edit', 'userController@update_category')->name('user.editcategory');

    Route::get('/system/deletecategory/{id}/delete', 'userController@deletecategory')->name('user.deletecategory');
 
 
        
});

//logout
Route::get('/logout', 'logoutController@index');