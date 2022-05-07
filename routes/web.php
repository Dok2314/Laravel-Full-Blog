<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers AS C;

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

Route::group(['prefix' => 'post', 'as' => 'post.'], function(){
   Route::get('/create', [PostController::class, 'postCreateView'])
       ->name('postCreateView');

   Route::post('/create', [PostController::class, 'createPost']);

   Route::get('/posts', [PostController::class, 'postAll'])
        ->name('postAll');

   Route::get('/delete/{post_id}', [PostController::class, 'deletePost'])
        ->name('delete');

   Route::get('/preview/{post_id}', [PostController::class, 'postPreview'])
        ->name('preview');

    Route::post('/preview/{post_id}', [PostController::class, 'postUpdate'])
        ->name('postUpdate');
});

Route::group(['prefix' => 'permission', 'as' => 'permission.'], function(){
    Route::get('/create', [PermissionController::class, 'permissionView'])
        ->name('permissionView');

    Route::post('/create', [PermissionController::class, 'createPermission'])
        ->name('createPermission');

    Route::get('/permissions', [PermissionController::class, 'permissionAll'])
        ->name('permissionAll');

    Route::get('/delete/{permission_id}', [PermissionController::class, 'deletePermission'])
        ->name('deletePermission');

    Route::get('/preview/{permission_id}', [PermissionController::class, 'previewPermission'])
        ->name('previewPermission');

    Route::post('/update/{permission_id}', [PermissionController::class, 'updatePermission'])
        ->name('updatePermission');
});

//'middleware' => 'permission:roles'

Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/', [C\RoleController::class, 'index'])->name('index');
    Route::get('create', [C\RoleController::class, 'create'])->name('create');
    Route::post('create', [C\RoleController::class, 'store']);

    Route::group(['prefix' => '{role}'], function () {
        Route::get('edit', [C\RoleController::class, 'edit'])->name('edit');
        Route::put('edit', [C\RoleController::class, 'update']);
        Route::delete('/', [C\RoleController::class, 'destroy'])->name('delete');
    });
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [C\UserController::class, 'index'])->name('index');
    Route::get('create', [C\UserController::class, 'create'])->name('create');
    Route::post('create', [C\UserController::class, 'store']);

    Route::group(['prefix' => '{user}'], function () {
        Route::get('edit', [C\UserController::class, 'edit'])->name('edit');
        Route::put('edit', [C\UserController::class, 'update']);
        Route::delete('/', [C\UserController::class, 'destroy'])->name('delete');
    });
});
