<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers AS C;
use App\Models AS M;

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
    $articles = M\Article::paginate(10);
    $categories = M\CategoryArticle::take(6)->get();
    $tags = M\Tag::all();

   return view('homePage', compact('articles', 'categories','tags'));
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

   Route::post('/registration',[RegistrationController::class, 'registration'])
       ->middleware('throttle:2,1');
   Route::post('/login',[LoginController::class, 'login']);
});

Route::group(['prefix' => 'categories', 'as' => 'category.'], function(){
    Route::get('/', [C\CategoriesController::class, 'index'])->name('index');
    Route::get('create', [C\CategoriesController::class, 'create'])->name('create');
    Route::post('create', [C\CategoriesController::class, 'store']);

    Route::group(['prefix' => '{category}'], function () {
        Route::get('edit', [C\CategoriesController::class, 'edit'])->name('edit');
        Route::put('edit', [C\CategoriesController::class, 'update']);
        Route::delete('/', [C\CategoriesController::class, 'destroy'])->name('delete');
    });
});

Route::group(['prefix' => 'post', 'as' => 'post.'], function(){
    Route::get('/', [C\PostController::class, 'index'])->name('index');
    Route::get('create', [C\PostController::class, 'create'])->name('create');
    Route::post('create', [C\PostController::class, 'store']);

    Route::group(['prefix' => '{post}'], function () {
        Route::get('edit', [C\PostController::class, 'edit'])->name('edit');
        Route::put('edit', [C\PostController::class, 'update']);
        Route::delete('/', [C\PostController::class, 'destroy'])->name('delete');
    });
});

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

Route::group(['prefix' => 'articles', 'as' => 'articles.'], function (){
   Route::get('/', [C\ArticlesController::class, 'index'])
       ->name('index');
   Route::get('create', [C\ArticlesController::class, 'create'])
       ->name('create');
   Route::post('create', [C\ArticlesController::class, 'store']);

   Route::group(['prefix' => '{article}'], function (){
       Route::get('edit', [C\ArticlesController::class, 'edit'])
           ->name('edit');
       Route::get('preview', [C\ArticlesController::class, 'preview'])
            ->name('preview');
       Route::put('edit', [C\ArticlesController::class, 'update']);
       Route::delete('delete',[C\ArticlesController::class, 'destroy'])
           ->name('delete');
   });
});

Route::group(['prefix' => 'categories_of_articles', 'as' => 'category_article.'], function (){
    Route::get('/', [C\CategoryArticleController::class, 'index'])
        ->name('index');
    Route::get('create', [C\CategoryArticleController::class, 'create'])
        ->name('create');
    Route::post('create', [C\CategoryArticleController::class, 'store']);

    Route::get('/{slug}', [C\CategoryArticleController::class, 'articlesCategory'])
        ->name('articles-category');

    Route::group(['prefix' => '{category_article}'], function (){
        Route::get('edit', [C\CategoryArticleController::class, 'edit'])
            ->name('edit');
        Route::put('edit', [C\CategoryArticleController::class, 'update']);
        Route::delete('delete', [C\CategoryArticleController::class, 'destroy'])
            ->name('delete');
    });
});

Route::group(['prefix' => 'tags', 'as' => 'tags.'], function (){
   Route::get('/', [C\TagController::class, 'index'])
       ->name('index');
   Route::get('create', [C\TagController::class, 'create'])
       ->name('create');
   Route::post('create', [C\TagController::class, 'store']);

    Route::get('/{tag:slug}', [C\TagController::class, 'findArticlesBySlug'])
        ->name('articles');

   Route::group(['prefix' => '{tag}'], function (){
      Route::get('edit', [C\TagController::class, 'edit'])
          ->name('edit');
      Route::put('edit', [C\TagController::class, 'update']);
      Route::delete('delete', [C\TagController::class, 'destroy'])
          ->name('delete');
   });
});

Route::group(['prefix' => 'comments', 'as' => 'comment.'], function (){
   Route::post('create', [C\CommentsController::class, 'store'])
        ->name('create');
});

Route::group(['prefix' => 'likes', 'middleware' => 'auth', 'as' => 'like.'], function(){
    Route::group(['prefix' => '{article}'], function (){
        Route::post('/like', [C\CommentsController::class, 'like'])
            ->name('like');
    });
});
