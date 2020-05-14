<?php



Route::get('/', function () {
    return redirect('system/user/login');
});

//login
Route::get('/system/user/login', 'LoginController@index')->name('login.index');
Route::post('/system/user/login', 'LoginController@verification')->name('login.index');

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
    Route::get('/system/tag', 'adminController@view_tag')->name('admin.view_tag');

    Route::get('/system/edittag/{id}/edit', 'adminController@edit_tag')->name('admin.edittag');

    Route::post('/system/edittag/{id}/edit', 'adminController@update_tag')->name('admin.edittag');

    Route::get('/system/deletetag/{id}/delete', 'adminController@deletetag')->name('admin.deletetag');

    Route::get('/system/tag/add', 'adminController@add')->name('admin.add');
    
    Route::post('/system/tag/add', 'adminController@insert')->name('admin.add');
    







    ///user_panel
	Route::get('/system/user/home', 'userController@index')->name('user.index');

    Route::get('/system/user/category', 'userController@view_category')->name('user.category');

    Route::get('/system/user/editcategory/{id}/edit', 'userController@edit')->name('user.editcategory');

    Route::post('/system/user/editcategory/{id}/edit', 'userController@update_category')->name('user.editcategory');

    Route::get('/system/user/deletecategory/{id}/delete', 'userController@deletecategory')->name('user.deletecategory');
 
//tag
    Route::get('/system/user/tag', 'userController@view_tag')->name('user.view_tag');

    Route::get('/system/user/edittag/{id}/edit', 'userController@edit_tag')->name('user.edittag');

    Route::post('/system/user/edittag/{id}/edit', 'userController@update_tag')->name('user.edittag');

    Route::get('/system/user/deletetag/{id}/delete', 'userController@deletetag')->name('user.deletetag');

    Route::get('/system/user/tag/add', 'userController@add')->name('user.add');
    
    Route::post('/system/user/tag/add', 'userController@insert')->name('user.add');
    

        
});

//logout
Route::get('/logout', 'logoutController@index');