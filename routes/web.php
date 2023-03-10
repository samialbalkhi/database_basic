<?php

use App\Models\Offer;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\VideoController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('offer.navbar');
});


    Route::get('/viewoffers',[CrudController::class,"getoffers"]);
    Route::group(['prefix'=> LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    Route::get('/create',[CrudController::class,"create"]);
    Route::post('/stor',[CrudController::class,"stor"])->name("offerstor");
    Route::get('/gitalloffer',[CrudController::class,"gitalloffer"])->name("alloffer");
    Route::get('/edit/{id}',[CrudController::class,"editoffer"])->name("editoffer");
    Route::post("/update/{id}",[CrudController::class,"updateoffer"])->name("updateoffer");
    Route::get("delete/{id}",[CrudController::class,"deleteoffer"])->name("deleteoffer");
    Route::get('/youtub',[VideoController::class,"youtub"]);
});
