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

Route::get('test', function () {
	return limit_text('Around (30)Years of Tea Business industry and (20)Years of Experienes in Local Tea Market and (5) Years of Experience in International Market and Working Together with Farmers and Good Relationship with Customers. ', 15);
});

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
	Route::get('individual', 'WebController@individual');
	Route::get('changelanguage', 'LanguageController@changeLanguage');
	Route::get('sitemap', 'WebController@sitemap');
	Route::get('new_detail', 'WebController@new_detail');
	Route::get('overAllSearch', 'WebController@overAllSearch');
});
