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
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/about', 'MiscPagesController@about');

Route::get('/contact', 'ContactUsController@create');

Route::post('/contact', 'ContactUsController@store');

Route::get('/gallery', 'Admin\GalleriesController@showAll')->name('gallery');

Route::get('/gallery/{category}', 'Admin\GalleriesController@showAllInCategory')->name('gallery.category');

Route::get('/learning-materials', 'Admin\LearningMaterialsController@showAll')->name('lm.all');

Route::get('/learning-materials/{category}', 'Admin\LearningMaterialsController@showAllInCategory')->name('lm.category');

Route::get('/posts', 'Admin\PostsController@all')->name('posts');
Route::get('/posts/{slug}', 'Admin\PostsController@details')->name('post-details');

Route::get('/events/{slug}', 'Admin\EventsController@details')->name('event.details');
Route::get('/events', 'Admin\EventsController@all')->name('events.all');

//------------------------------- Member Dashboard ---------------------------------//
Route::get('/dashboard', 'MainPagesController@dashboard')->name('dashboard');
Route::get('/dashboard/profile/', 'MainPagesController@editProfile');
Route::put('/dashboard/profile/', 'MainPagesController@updateProfile');

Route::post('/dashboard/posts/create', 'MainPagesController@store');
Route::get('/dashboard/posts', 'MainPagesController@userPosts')->name('user.posts.index');
Route::match(['delete', 'post'], '/dashboard/posts', 'MainPagesController@destroy')->name('user.posts.delete');
Route::get('/dashboard/posts/create', 'MainPagesController@create')->name('user.posts.create');
Route::get('/dashboard/posts/edit/{slug}', 'MainPagesController@edit')->name('user.posts.edit');
Route::post('/dashboard/posts/edit/{slug}', 'MainPagesController@update')->name('user.posts.update');

Route::get('/dashboard/documents/upload', 'MainPagesController@newDocument')->name('user.docs.create');
Route::post('/dashboard/documents/upload', 'MainPagesController@upload')->name('user.docs.upload');
Route::match(['post', 'delete'], '/dashboard/documents', 'MainPagesController@deleteDoc')->name('user.docs.delete');
Route::get('/dashboard/documents', 'MainPagesController@documents')->name('user.docss.index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    //-------------------- Users ----------------------------//
    Route::get('/users', 'UsersController@index')->name('users');
    Route::match(['delete', 'post'], '/users', 'UsersController@destroy');
    Route::get('/users/add', 'UsersController@create');

    Route::post('/users/add', 'UsersController@store');
    Route::get('/', 'UsersController@dashboard');
    Route::get('/users/edit/{id}', 'UsersController@editUser');

    Route::match(['put', 'post'], '/users/edit/{id}', 'UsersController@update');
    Route::get('/my-account', 'UsersController@editProfile');
    Route::put('/my-account', 'UsersController@updateProfile');

    //-------------------- About ----------------------------//
    Route::view('/about', 'admin.about.index');
    Route::view('/about/add', 'admin.about.add');
    Route::post('/about/add', 'SettingsController@storeAbout');
    Route::match(['put', 'post'], '/about/edit', 'SettingsController@storeAbout');
    Route::get('/about/edit', 'SettingsController@editAbout');

    //--------------------- Mail ----------------------------//
    Route::view('/mail-config', 'admin.mail.index');
    Route::match(['post', 'put'], '/mail-config', 'SettingsController@updateEmail');

    //--------------------- Messages ------------------------//
    Route::get('/contacts', 'SettingsController@showMessages');
    Route::match(['put', 'post'], '/contacts', 'SettingsController@deleteMessage');
    Route::get('/contacts/{slug}', 'SettingsController@showMessage');
    Route::match(['put', 'post'], '/contacts/{slug}', 'SettingsController@deleteMessage');

    //-------------------- Posts ---------------------------//
    Route::get('/posts', 'PostsController@index')->name('posts.index');
    Route::match(['post', 'delete'], '/posts', 'PostsController@destroy');
    Route::post('/posts/create', 'PostsController@store');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
    Route::get('/posts/edit/{slug}', 'PostsController@edit')->name('posts.edit');
    Route::post('/posts/edit/{slug}', 'PostsController@update');

    //--------------------- Events -----------------------------------//
    Route::get('/events', 'EventsController@index')->name('events.index');
    Route::match(['post', 'delete'], '/events', 'EventsController@destroy')->name('event.delete');
    Route::put('/{id}', 'EventsController@publish')->name('event.publish');
    Route::post('/{slug}', 'PostsController@approve')->name('post.approve');
    Route::post('/events/create', 'EventsController@store');
    Route::get('/events/create', 'EventsController@create')->name('events.create');
    Route::get('/events/edit/{slug}', 'EventsController@edit')->name('events.edit');
    Route::match(['post', 'put'], '/events/edit/{slug}', 'EventsController@update');
    Route::get('/events/{slug}', 'EventsController@show')->name('events.show');

    //---------------------- Permissions ----------------------------//
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
    Route::post('/permissions/create', 'PermissionController@store');
    Route::get('/permissions/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
    Route::match(['post', 'delete'], '/permissions', 'PermissionController@destroy');
    Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create');
    Route::match(['post', 'put'], '/permissions/edit/{id}', 'PermissionController@update');

    //----------------------- Roles ----------------------------------//
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::match(['post', 'delete'], '/roles', 'RoleController@destroy');
    Route::post('/roles/create', 'RoleController@store');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::match(['put', 'post'], '/roles/edit/{id}', 'RoleController@update');

    //------------------------- Image Upload --------------------------//
    Route::get('/gallery', 'GalleriesController@index')->name('gallery.index');
    Route::match(['delete', 'post'], '/gallery', 'GalleriesController@destroy')->name('gallery.delete');
    Route::get('/gallery/upload', 'GalleriesController@create')->name('gallery.create');
    Route::post('/gallery/upload', 'GalleriesController@upload')->name('gallery.upload');

    //-------------------------- Document Upload -----------------------//
    Route::get('/learning-materials', 'LearningMaterialsController@index')->name('lm.index');
    Route::match(['delete', 'post'], '/learning-materials', 'LearningMaterialsController@destroy')->name('lm.delete');
    Route::get('/learning-materials/upload', 'LearningMaterialsController@create')->name('lm.create');
    Route::post('/learning-materials/upload', 'LearningMaterialsController@upload')->name('lm.upload');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout');

