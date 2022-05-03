<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function (){
   return view('homePage');
})->name('home');

Route::group(['prefix' => 'authorize', 'middleware' => 'guest', 'as' => 'user.'], function(){
    Route::get('/registration', [RegistrationController::class, 'registrationView'])
    ->name('registration');

    Route::get('/login', [LoginController::class, 'loginView'])
        ->name('login');
});

Route::group(['prefix' => 'authorize', 'as' => 'user.'], function(){
    Route::group(['middleware' => 'auth'], function(){
       Route::view('/admin', 'authorize.admin')
           ->name('admin');
    });

    Route::get('/logout', function (){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');

   Route::post('/registration',[RegistrationController::class, 'registration']);
   Route::post('/login',[LoginController::class, 'login']);
});

Route::group(['prefix' => 'category', 'as' => 'CRUD.'], function(){
    Route::get('/create', [CategoriesController::class, 'categoryView'])
        ->name('categoryCreateView');

    Route::post('/create', [CategoriesController::class, 'create'])
    ->name('create');

    Route::get('/categories', [CategoriesController::class, 'categoryAll'])
        ->name('categoryAll');

    Route::get('/delete/{category_id}', [CategoriesController::class, 'categoryDelete'])
        ->name('categoryDelete');

    Route::get('/preview/{category_id}', [CategoriesController::class, 'categoryPreview'])
        ->name('categoryPreview');

    Route::post('/preview/{category_id}', [CategoriesController::class, 'categoryUpdate'])
        ->name('categoryUpdate');
});
