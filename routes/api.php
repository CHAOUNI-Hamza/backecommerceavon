<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\SubscribeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



/**
 * start route Auth
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/auth'

], function ($router) {

    Route::get('index', [ AuthController::class, 'index' ])->name('tesqdqstt');
    Route::post('login', [ AuthController::class, 'login' ])->name('testt'); 
    Route::post('register',[ AuthController::class, 'register' ])->name('test');
    Route::post('update/{id}',[ AuthController::class, 'update' ])->name('dfgf');
    Route::get('trashed',[ AuthController::class, 'trashed' ])->name('sdgdfg');
    Route::delete('destroy/{id}',[ AuthController::class, 'destroy' ])->name('dsfgfg');
    Route::post('restore/{id}',[ AuthController::class, 'restore' ])->name('dfsgdfg');
    Route::post('forced/{id}',[ AuthController::class, 'forced' ])->name('dgsdfg'); 
    Route::post('logout',[ AuthController::class, 'logout' ])->name('tester'); 
    Route::post('refresh',[ AuthController::class, 'refresh' ])->name('teddster'); 
    Route::get('me', [ AuthController::class, 'me' ])->name('teestt');
    // security
    Route::post('/forgot-password',[ AuthController::class, 'forgotpassword' ])->name('sdfdf'); 
    Route::post('/reset-password',[ AuthController::class, 'resetpassword' ])->name('qsdsqsd'); 

});


/**
 * start route Product
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/product'

], function ($router) {

    Route::get('index', [ ProductController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ ProductController::class, 'store' ])->name('tefst');
    Route::get('show/{slug}',[ ProductController::class, 'show' ])->name('tefddst');
    Route::post('update/{id}',[ ProductController::class, 'update' ])->name('dff');
    Route::get('trashed',[ ProductController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ ProductController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ ProductController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ ProductController::class, 'forced' ])->name('dgfqsddg');

});


/**
 * start route Category
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/category'

], function ($router) {

    Route::get('index', [ CategoryController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ CategoryController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ CategoryController::class, 'update' ])->name('dff');
    Route::get('trashed',[ CategoryController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ CategoryController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ CategoryController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ CategoryController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Sex
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/sex'

], function ($router) {

    Route::get('index', [ SexController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ SexController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ SexController::class, 'update' ])->name('dff');
    Route::get('trashed',[ SexController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ SexController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ SexController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ SexController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Article
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/article'

], function ($router) {

    Route::get('index', [ ArticleController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ ArticleController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ ArticleController::class, 'update' ])->name('dff');
    Route::get('trashed',[ ArticleController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ ArticleController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ ArticleController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ ArticleController::class, 'forced' ])->name('dgfqsddg');

});


/**
 * start route Client
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/client'

], function ($router) {

    Route::get('index', [ ClientController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ ClientController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ ClientController::class, 'update' ])->name('dff');
    Route::get('trashed',[ ClientController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ ClientController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ ClientController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ ClientController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Contact
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/contact'

], function ($router) {

    Route::get('index', [ ContactController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ ContactController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ ContactController::class, 'update' ])->name('dff');
    Route::get('trashed',[ ContactController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ ContactController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ ContactController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ ContactController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Type
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/type'

], function ($router) {

    Route::get('index', [ TypeController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ TypeController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ TypeController::class, 'update' ])->name('dff');
    Route::get('trashed',[ TypeController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ TypeController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ TypeController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ TypeController::class, 'forced' ])->name('dgfqsddg');

});


/**
 * start route Color
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/color'

], function ($router) {

    Route::get('index', [ ColorController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ ColorController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ ColorController::class, 'update' ])->name('dff');
    Route::get('trashed',[ ColorController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ ColorController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ ColorController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ ColorController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Size
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/size'

], function ($router) {

    Route::get('index', [ SizeController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ SizeController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ SizeController::class, 'update' ])->name('dff');
    Route::get('trashed',[ SizeController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ SizeController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ SizeController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ SizeController::class, 'forced' ])->name('dgfqsddg');

});

/**
 * start route Carousel
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/carousel'

], function ($router) {

    Route::get('index', [ CarouselController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ CarouselController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ CarouselController::class, 'update' ])->name('dff');
    Route::get('trashed',[ CarouselController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ CarouselController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ CarouselController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ CarouselController::class, 'forced' ])->name('dgfqsddg');

});



/**
 * start route Carousel
 */
Route::group([

    'middleware' => 'api',
    'prefix' => 'v1/subscribe'

], function ($router) {

    Route::get('index', [ SubscribeController::class, 'index' ])->name('tesfdqstt');
    Route::post('store',[ SubscribeController::class, 'store' ])->name('tefst');
    Route::post('update/{id}',[ SubscribeController::class, 'update' ])->name('dff');
    Route::get('trashed',[ SubscribeController::class, 'trashed' ])->name('sdqdff');
    Route::delete('destroy/{id}',[ SubscribeController::class, 'destroy' ])->name('ddsqdsdfgfg'); 
    Route::post('restore/{id}',[ SubscribeController::class, 'restore' ])->name('dqddsgdfg'); 
    Route::post('forced/{id}',[ SubscribeController::class, 'forced' ])->name('dgfqsddg');

});
