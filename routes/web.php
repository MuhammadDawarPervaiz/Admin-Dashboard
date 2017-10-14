<?php
	
	// Admin
		Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	// Dashboard
		Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
		// Route::post('/latest_order', 'DashboardController@latest_order');	// For some Ajax
		Route::post('dashboard', 'DashboardController@index');

	// Order
		Route::get('add_order', 'OrderController@index_add');
		Route::get('view_order', 'OrderController@index_view');
		Route::get('add_cus', 'OrderController@add_cus');
		Route::post('add_order', 'OrderController@add_order');
		Route::post('update_order', 'OrderController@update');
		Route::post('view_order', 'OrderController@destroy');
		Route::post('/add_cat', 'OrderController@add_cat');
		Route::post('/add_brands', 'OrderController@add_brand');
		Route::post('delete_problem', 'OrderController@delete_problem');

	// Category
		Route::get('add_category', 'CategoryController@index_add');
		Route::get('view_category', 'CategoryController@index_view');
		Route::post('view_category', 'CategoryController@destroy');
		Route::post('update_category', 'CategoryController@update');
		Route::post('add_category', 'CategoryController@add_category');

	// Brand
		Route::get('add_brand', 'BrandController@index_add');
		Route::get('view_brand', 'BrandController@index_view');
		Route::post('update_brand', 'BrandController@update');
		Route::post('view_brand', 'BrandController@destroy');
		Route::post('add_brand', 'BrandController@add_brand');

	// Customer
		Route::get('add_customer', 'CustomerController@index_add');
		Route::get('view_customer', 'CustomerController@index_view');
		Route::post('view_customer', 'CustomerController@destroy');
		Route::post('add_customer', 'CustomerController@add_customer');
		Route::post('update_customer', 'CustomerController@update');

	// Status
		Route::get('add_status', 'StatusController@index_add');
		Route::get('view_status', 'StatusController@index_view');
		Route::post('view_status', 'StatusController@destroy');
		Route::post('update_status', 'StatusController@update');
		Route::post('add_status', 'StatusController@add_status');
		Route::post('default_status', 'StatusController@default_status');

	// Report
		//Route::get('view_report', 'ReportController@index_view');
		Route::get('report', 'ReportController@report');

	// Settings
		Route::get('general_settings', 'CompanyDetailsController@index_general');
		Route::get('user_settings', 'CompanyDetailsController@index_user');
		Route::post('general_settings', 'CompanyDetailsController@create_general');

	Auth::routes();
	Route::get('/home', 'HomeController@index');