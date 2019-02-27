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

Route::group(['middleware' => 'web'], function() {

  // Главная страница
  Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
  // Получить конкретную страницу
  Route::get('/page/{allias}', ['uses' => 'PageController@execute', 'as' => 'page']);
  // Аутентификация
  Route::auth();

});

// Админка
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  //admin/
  Route::get('/', function() {

  });

  // Методы в админке
  Route::group(['prefix'=>'pages'], function() {

    //admin/pages - отобразить админку
    Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);
    //admin/add - добавить в админку
    Route::match(['get', 'post'], '/add', ['uses'=>'PagesController@addPage', 'as'=>'addPage']);
    //admin/edit/{page} - редактировать в админке
    Route::match(['get','post', 'delete'], '/edit/{page}', ['users'=>'PagesController@editPage', 'as'=>'editPage']);
  });

  // Работа с портфолио
  Route::group(['prefix'=>'portfolio'], function() {

    //admin/pages - отобразить админку
    Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);
    //admin/add - добавить в админку
    Route::match(['get', 'post'], '/add', ['uses'=>'PortfolioController@addPortfolio', 'as'=>'addPortfolio']);
    //admin/edit/{page} - редактировать в админке
    Route::match(['get','post', 'delete'], '/edit/{Portfolio}', ['users'=>'PortfolioController@editPortfolio', 'as'=>'editPortfolio']);
  });

  // Работа с Сервисами
  Route::group(['prefix'=>'services'], function() {

    //admin/pages - отобразить админку
    Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);
    //admin/add - добавить в админку
    Route::match(['get', 'post'], '/add', ['uses'=>'ServiceController@addService', 'as'=>'addService']);
    //admin/edit/{page} - редактировать в админке
    Route::match(['get','post', 'delete'], '/edit/{service}', ['users'=>'ServiceController@editService', 'as'=>'editService']);
  });

});
