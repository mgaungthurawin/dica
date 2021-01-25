<?php

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::group(['prefix' => 'admin'], function () {
	Auth::routes();
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('getProductByCategory', 'HelperController@getProductByCategory');
Route::get('getProcessingByCategory', 'HelperController@getProcessingByCategory');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Backend'],
	function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::delete('media/{id}', 'MediaController@destroy');
	Route::resource('user', 'UserController');
	Route::resource('category', 'CategoryController');
	Route::resource('location', 'LocationController');
	Route::resource('new', 'NewController');
	Route::resource('product', 'ProductController');
	Route::resource('company', 'CompanyController');
	Route::get('{type}/create', 'CompanyController@create');
    // Route::resource('processing', 'ProcessingController');
    Route::get('export-excel', 'CompanyController@exportExcel')->name('company.export-excel');
	Route::get('/processing', 'ProcessingController@index');
	Route::get('/processing/add', 'ProcessingController@add');
	Route::post('/processing/add', 'ProcessingController@store');
	Route::get('/processing/edit/{id}', 'ProcessingController@edit'); // edit form
	Route::post('/processing/edit/{id}', 'ProcessingController@update'); // update
	Route::delete('/processing/delete/{id}', 'ProcessingController@destroy'); // delete
	Route::get('/company/{category_id}/{prefix}/food', 'CompanyController@food');
});

Route::group(['namespace' => 'Frontend'], function() {
	Route::get('search', 'WebController@search');
	Route::get('{category_id}/material', 'WebController@material');
	Route::get('{category_id}/search_result', 'WebController@search_result');
	Route::get('{company_id}/industry', 'WebController@industry');
	Route::get('{new_id}/new', 'NewController@new');
});

Route::group(['namespace' => 'Frontend'], function () {
	Route::get('/', 'WebController@index');
	Route::get('outline', 'WebController@outline');
	Route::get('usedatabase', 'WebController@usedatabase');
	Route::get('contact', 'ContactController@contact');
	Route::post('contactemail', 'ContactController@contactEmail');
	Route::get('login', 'WebController@login');
	Route::get('register', 'WebController@register');
	Route::get('textile', 'WebController@textile');
	Route::get('food', 'WebController@food');
	Route::get('news', 'WebController@news');
	Route::get('{new_id}/new_detail', 'WebController@new_detail');

	Route::get('individual', 'WebController@individual');
	Route::get('changelanguage', 'LanguageController@changeLanguage');
	Route::get('sitemap', 'WebController@sitemap');
	Route::get('overAllSearch', 'WebController@overAllSearch');
});
// Hello
// Hello World
