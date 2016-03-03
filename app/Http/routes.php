<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function ( $app ) {

	/*
    Route::auth();
    Route::get('/home', 'HomeController@index');

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
*/



    //Auth
    $app->get('logout', 'Auth\AuthController@logout');
    $app->get('login', 'Auth\AuthController@login');
    $app->get('register', 'Auth\AuthController@register');
    $app->post('login', 'Auth\AuthController@postLogin');
    $app->post('register', 'Auth\AuthController@store');
	$app->get('password/reset', 'Auth\AuthController@getPassword');
	$app->post('password/email', 'Auth\AuthController@postPassword');


    /* auth */
    $app->group(['middleware' => 'auth'], function ( $app ) {
    	
        $app->get('/', 'DashboardController@index');
        $app->get('home', 'DashboardController@index');
        $app->get('dashboard', 'DashboardController@index');

        //Staff
        $app->get('users'               , 'UserController@index');
        $app->get('users/create'        , 'UserController@create');
        $app->get('users/{token}/edit'  ,'UserController@edit');
        $app->post('users'              , 'UserController@store');
        $app->put('users/{id}'          , 'UserController@update');
        $app->put('users/{id}/password' , 'UserController@updatePassword');
        $app->delete('users/{id}'       ,'UserController@destroy');

        //Customer
        $app->get('customers'               , 'CustomerController@index');
        $app->get('customers/create'        , 'CustomerController@create');
        $app->get('customers/{token}/edit'  , 'CustomerController@edit');
        $app->post('customers'              , 'CustomerController@store');
        $app->put('customers/{id}'          , 'CustomerController@update');
        $app->put('customers/{id}/password' , 'CustomerController@updatePassword');
        $app->delete('customers/{id}'       , 'CustomerController@destroy');


        //CMS POST
        $app->get('posts'               , 'PostController@index');
        $app->get('posts/create'        , 'PostController@create');
        $app->get('posts/{token}/edit'  , 'PostController@edit');
        $app->post('posts'              , 'PostController@store');
        $app->put('posts/{id}'          , 'PostController@update');
        $app->delete('posts/{id}'       , 'PostController@destroy');
        //CMS NEWS
        $app->get('news'                , 'NewsController@index');
        $app->get('news/create'         , 'NewsController@create');
        $app->get('news/{token}/edit'   , 'NewsController@edit');
        $app->post('news'               , 'NewsController@store');
        $app->put('news/{id}'           , 'NewsController@update');
        $app->delete('news/{id}'        , 'NewsController@destroy');
        $app->post('news/{token}/upload' , 'NewsController@upload');

        //Locations
        $app->get('locations'           , 'LocationController@index');
        $app->get('locations/create'    , 'LocationController@create');
        $app->get('locations/{token}/edit','LocationController@edit');
        $app->post('locations'          , 'LocationController@store');
        $app->put('locations/{id}'      , 'LocationController@update');
        $app->delete('locations/{id}'   ,'LocationController@destroy');

        //people
        $app->get('players'             , 'PersonController@indexPlayer');
        $app->get('players/create'      , 'PersonController@createPlayer');
        $app->get('players/{token}/edit','PersonController@editPlayer');
        $app->post('players'            , 'PersonController@storePlayer');
        $app->put('players/{id}'        , 'PersonController@updatePlayer');
        $app->delete('players/{id}'     ,'PersonController@destroyPlayer');

        //people  category
        $app->get('players/categories'                , 'PersonCategoryController@index');
        $app->get('players/categories/create'         , 'PersonCategoryController@create');
        $app->get('players/categories/{token}/edit'   , 'PersonCategoryController@edit');
        $app->post('players/categories'               , 'PersonCategoryController@store');
        $app->put('players/categories/{id}'           , 'PersonCategoryController@update');
        $app->delete('players/categories/{id}'        , 'PersonCategoryController@destroy');

        //teams
        $app->get('teams'               , 'TeamController@index');
        $app->get('teams/create'        , 'TeamController@create');
        $app->get('teams/{token}/edit'  ,'TeamController@edit');
        $app->post('teams'              , 'TeamController@store');
        $app->put('teams/{id}'          , 'TeamController@update');
        $app->delete('teams/{id}'       ,'TeamController@destroy');

        //teams & categories
        $app->get('teams/categories'                , 'TeamCategoryController@index');
        $app->get('teams/categories/create'         , 'TeamCategoryController@create');
        $app->get('teams/categories/{token}/edit'   , 'TeamCategoryController@edit');
        $app->post('teams/categories'               , 'TeamCategoryController@store');
        $app->put('teams/categories/{id}'           , 'TeamCategoryController@update');
        $app->delete('teams/categories/{id}'        , 'TeamCategoryController@destroy');
        

        //items
        $app->get('items'               , 'ItemController@index');
        $app->get('items/create'        , 'ItemController@create');
        $app->get('items/{token}/edit'  ,'ItemController@edit');
        $app->post('items'              , 'ItemController@store');
        $app->put('items/{id}'          , 'ItemController@update');
        $app->delete('items/{id}'       ,'ItemController@destroy');

        //items categories
        $app->get('items/categories'               , 'ItemCategoryController@index');
        $app->get('items/categories/create'        , 'ItemCategoryController@create');
        $app->get('items/categories/{token}/edit'  , 'ItemCategoryController@edit');
        $app->post('items/categories'              , 'ItemCategoryController@store');
        $app->put('items/categories/{id}'          , 'ItemCategoryController@update');
        $app->delete('items/categories/{id}'       , 'ItemCategoryController@destroy');


    });

});


