<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Advert;


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


Route::get('/','FormController@getCategories');
Route::get('form/getsubcategories/{id}','FormController@getSubcategories');

/**
 * Add New Task
 */
Route::post('/advert', function (Request $request) {
    //
});

Route::post('/advert', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'category' => 'required',
        'subcategory' => 'required',
        'description' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $advert = new Advert;
    $advert->name = $request->name;
    $advert->category = $request->category;
    $advert->subcategory = $request->subcategory;
    $advert->description = $request->description;
    $advert->save();

    return redirect('/');
});