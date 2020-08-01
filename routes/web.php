<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/country/index','CountryController@index')->name('admin.country.index');
Route::get('/admin/country/create', 'CountryController@create')->name('admin.country.create');
Route::get('/admin/country/details/{_id?}', 'CountryController@show')->name('admin.country.details');

Route::get('/admin/country/{_id?}', 'CountryController@form')->name('admin.country.form');
Route::post('/admin/country/save', 'CountryController@save')->name('admin.country.save');
Route::put('/admin/country/update/{_id}', 'CountryController@update')->name('admin.country.update');
Route::get('/admin/country/delete/{_id}', 'CountryController@delete')->name('admin.country.delete');

Route::get('/admin/language/index','LanguageController@index')->name('admin.language.index');
Route::get('/admin/language/create', 'LanguageController@create')->name('admin.language.create');
Route::get('/admin/language/details/{_id?}', 'LanguageController@show')->name('admin.language.details');

Route::get('/admin/language/{_id?}', 'LanguageController@form')->name('admin.language.form');
Route::post('/admin/language/save', 'LanguageController@save')->name('admin.language.save');
Route::put('/admin/language/update/{_id}', 'LanguageController@update')->name('admin.language.update');
Route::get('/admin/language/delete/{_id}', 'LanguageController@delete')->name('admin.language.delete');


Route::get('/admin/editorial/index','EditorialController@index')->name('admin.editorial.index');
Route::get('/admin/editorial/create', 'EditorialController@create')->name('admin.editorial.create');
Route::get('/admin/editorial/details/{_id?}', 'EditorialController@show')->name('admin.editorial.details');

Route::get('/admin/editorial/{_id?}', 'EditorialController@form')->name('admin.editorial.form');
Route::post('/admin/editorial/save', 'EditorialController@save')->name('admin.editorial.save');
Route::put('/admin/editorial/update/{_id?}', 'EditorialController@update')->name('admin.editorial.update');
Route::get('/admin/editorial/delete/{_id?}', 'EditorialController@delete')->name('admin.editorial.delete');

Route::get('/admin/author/index','AuthorController@index')->name('admin.author.index');
Route::get('/admin/author/create', 'AuthorController@create')->name('admin.author.create');
Route::get('/admin/author/details/{_id?}', 'AuthorController@show')->name('admin.author.details');

Route::get('/admin/author/{_id?}', 'AuthorController@form')->name('admin.author.form');
Route::post('/admin/author/save', 'AuthorController@save')->name('admin.author.save');

Route::put('/admin/author/update/{_id?}', 'AuthorController@update')->name('admin.author.update');
Route::get('/admin/author/delete/{_id?}', 'AuthorController@delete')->name('admin.author.delete');



Route::get('/admin/category/index','CategoryController@index')->name('admin.category.index');
Route::get('/admin/category/create', 'CategoryController@create')->name('admin.category.create');
Route::get('/admin/category/details/{_id?}', 'CategoryController@show')->name('admin.category.details');

Route::get('/admin/category/{_id?}','CategoryController@form')->name('admin.category.form');
Route::post('/admin/category/save', 'CategoryController@save')->name('admin.category.save');

Route::put('/admin/category/update/{_id?}', 'CategoryController@update')->name('admin.category.update');
Route::get('/admin/category/delete/{_id?}', 'CategoryController@delete')->name('admin.category.delete');

Route::get('/admin/book/index','BookController@index')->name('admin.book.index');
Route::get('/admin/book/create', 'BookController@create')->name('admin.book.create');
Route::get('/admin/book/details/{_id?}', 'BookController@show')->name('admin.book.details');

Route::get('/admin/book/{_id?}', 'BookController@form')->name('admin.book.form');
Route::post('/admin/book/save', 'BookController@save')->name('admin.book.save');

Route::put('/admin/book/update/{_id?}', 'BookController@update')->name('admin.book.update');
Route::get('/admin/book/delete/{_id?}', 'BookController@delete')->name('admin.book.delete');


Route::get('/role/index','RoleController@index')->name('role.index');
Route::get('/role/create', 'RoleController@create')->name('role.create');
Route::get('/role/details/{_id?}', 'RoleController@show')->name('role.details');

Route::get('/role/{_id?}', 'RoleController@form')->name('role.form');
Route::post('/role/save', 'RoleController@save')->name('role.save');
Route::put('/role/update/{_id}', 'RoleController@update')->name('role.update');
Route::get('/role/delete/{_id}', 'RoleController@delete')->name('role.delete');

//Books store
Route::get('/books','BookController@BookStore')->name('BooksStore');
Route::get('/books/{id}','BookController@Details')->name('BookDetails');

Route::get('/authors','AuthorController@AuthorStore')->name('AuthorsStore');
Route::get('/authors/{id}','AuthorController@Details')->name('AuthorDetails');


Route::get('/editorials','EditorialController@EditorialStore')->name('EditorialsStore');
Route::get('/editorials/{id}','EditorialController@Details')->name('EditorialsDetails');