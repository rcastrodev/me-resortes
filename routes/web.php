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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/certificado/{id}', 'PagesController@certificado')->name('certificado');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::get('/aplicaciones', 'PagesController@aplicaciones')->name('aplicaciones');
Route::get('/videos', 'PagesController@videos')->name('videos');
Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('/ficha-tecnica/{id}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');

Route::post('vp', 'VPController@addVP')->name('vp.store');
Route::get('vp', 'VPController@getSession')->name('vp');
Route::delete('vp/{id}', 'VPController@destroy')->name('vp.destroy');

Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::post('home/content/{id}', 'HomeController@certificateDestroy')->name('home.content.certificate-destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page Applications */
    Route::get('application/content', 'ApplicationController@content')->name('application.content');
    Route::post('application/content/generic-section/store', 'ApplicationController@store')->name('application.content.generic-section.store');
    Route::post('application/content/generic-section/update', 'ApplicationController@update')->name('application.content.generic-section.update');
    Route::post('application/updateInfo', 'ApplicationController@updateInfo')->name('application.update-info');
    Route::delete('application/content/{id}', 'ApplicationController@destroy')->name('application.content.destroy');
    Route::get('application/content/slider/get-list', 'ApplicationController@sliderGetList')->name('application.slider.get-list');
    Route::get('application/content/sector/get-list', 'ApplicationController@sectorGetList')->name('application.slider.get-list');
    /** Fin Applications*/

    /** Page videos */
    Route::get('video/content', 'VideoController@content')->name('video.content');
    Route::post('video/content/generic-section/store', 'VideoController@store')->name('video.content.generic-section.store');
    Route::post('video/content/generic-section/update', 'VideoController@update')->name('video.content.generic-section.update');
    Route::delete('video/content/{id}', 'VideoController@destroy')->name('video.content.destroy');
    Route::get('video/content/slider/get-list', 'VideoController@getList')->name('video.slider.get-list');
    /** Fin videos*/

    /** Page Quality */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/generic-section/store', 'QualityController@store')->name('quality.content.generic-section.store');
    Route::post('quality/store2', 'QualityController@store2')->name('quality.content.store2');
    Route::post('quality/update2', 'QualityController@update2')->name('quality.content.update2');
    Route::post('quality/updateInfo', 'QualityController@updateInfo')->name('quality.update-info');
    Route::post('quality/content/generic-section/update', 'QualityController@update')->name('quality.content.generic-section.update');
    Route::delete('quality/content/{id}', 'QualityController@destroy')->name('quality.content.destroy');
    Route::get('quality/content/items/get-list', 'QualityController@itemGetList')->name('quality.items.get-list');
    Route::get('quality/content/certifications/get-list', 'QualityController@certificationsGetList');
    Route::get('quality/content/machinery/get-list', 'QualityController@machineryGetList');
    /** Fin Quality*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
