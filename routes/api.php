<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::group([
    'prefix' => 'api','middleware' => 'jwt:api'
], function ($router) {
    Route::get('settings', 'SettingController@getSettings');
    //.....................route for create menus......................
    Route::post('create_main_menu', 'Menus\MenusController@createMainMenu');
    Route::post('create_user_menu', 'Menus\MenusController@createUserMenu');
    Route::post('create_searchable_menu', 'Menus\MenusController@createSearchableMenu');
    Route::post('create_top_menu', 'Menus\MenusController@createTopMenu');
  
    //.....................route for get menus and sub-menus......................
    Route::get('get_main_menu[/{type}]', 'Menus\MenusController@getMainMenu');
    Route::get('get_user_menu[/{type}]', 'Menus\MenusController@getUserMenu');
    Route::get('get_searchable_menu[/{type}]', 'Menus\MenusController@getSearchableMenu');
    Route::get('get_top_menu[/{type}]', 'Menus\MenusController@getTopMenu');

    //.....................route for get single menus......................
    Route::get('single_main_menu/{id}[/{type}]', 'Menus\MenusController@getSingleMainMenu');
    Route::get('single_user_menu/{id}[/{type}]', 'Menus\MenusController@getSingleUserMenu');
    Route::get('single_searchable_menu/{id}[/{type}]', 'Menus\MenusController@getSingleSearchableMenu');
    Route::get('single_top_menu/{id}[/{type}]', 'Menus\MenusController@getSingleTopMenu');

     //.....................route for update menus and sub-menus......................
    Route::post('update_main_menu/{id}', 'Menus\MenusController@updateMainMenu');
    Route::post('update_user_menu/{id}', 'Menus\MenusController@updateUserMenu');
    Route::post('update_searchable_menu/{id}', 'Menus\MenusController@updateSearchableMenu');
    Route::post('update_top_menu/{id}', 'Menus\MenusController@updateTopMenu');

    //.....................route for delete menus......................
    Route::delete('delete_main_menu/{id}[/{type}]', 'Menus\MenusController@deleteMainMenu');
    Route::delete('delete_user_menu/{id}[/{type}]', 'Menus\MenusController@deleteUserMenu');
    Route::delete('delete_searchable_menu/{id}[/{type}]', 'Menus\MenusController@deleteSearchableMenu');
    Route::delete('delete_top_menu/{id}[/{type}]', 'Menus\MenusController@deleteTopMenu');

});