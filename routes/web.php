<?php

use App\Http\Controllers\AccountController;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageControllers;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\UsersController;

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

Route::get('', [PageControllers::class, 'home'])->name('home');

Route::get('about-us', [PageControllers::class, 'aboutUs'])->name('about-us');

Route::get('contacts', [ContactController::class, 'form'])->name('contacts');
Route::post('contacts/save', [ContactController::class, 'formData'])->name('contacts.save');

Route::get('articles', [ArticleController::class, 'articles'])->name('articles');
Route::get('article/{id}', [ArticleController::class, 'article'])->name('article');

Route::middleware('auth')->group(function () {

    Route::get('articles-list', [ArticleController::class, 'index'])->name('articlesList');
    Route::get("articles/create", [ArticleController::class, 'create'])->name("createArticle");
    Route::post("articles", [ArticleController::class, 'store'])->name("storeArticle");
    Route::get("article/{article}/edit", [ArticleController::class, 'edit'])->name("editArticle");
    Route::put("article/{article}", [ArticleController::class, 'update'])->name("updateArticle");
    Route::delete("article/{article}", [ArticleController::class, 'destroy'])->name("destroyArticle");

    Route::get('account', [AccountController::class, 'index'])->name('name');

});

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::get('anime-list', [AnimeController::class, 'index'])->name('anime-list');
Route::get('anime-list/{id}', [AnimeController::class, 'animeByGenre'])->name('animeByGenre');
//Route::get('anime-list', [AnimeController::class, 'saveData']);

Route::get('superheroes', function () {
    $title = 'Supereroi';

    return view('superheroes', compact('title'));
})->name('superheroes');

Route::get('seeder', function () {

    /*     

    App\Models\Article::create([
        'title' => 'Articolo 1',
        'category' => 'Motori',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 2',
        'category' => 'Sport',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 3',
        'category' => 'Cinema',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 4',
        'category' => 'Tecnologia',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 5',
        'category' => 'Cucina',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...',
        'body' => '...',
    ]); 
    
    */
});

Route::get('users', [UsersController::class, 'users'])->name('users');