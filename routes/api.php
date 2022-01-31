<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\VenteController;


use App\Http\Middleware\CORS;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([
//     'middleware' => CORS::class,
//     'prefix' => 'auth'

// ], function ($router) {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     /** CLients */
//     Route::resource('/client', ClientController::class);
//     /** Articles */
//     //Route::resource('/articles', ArticleController::class);
//     Route::get('/nbArticles', [ArticleController::class, 'nbArticleEnStock']);
//     /** FOURNISSEUR */
//     Route::resource('/fournisseurs', FournisseurController::class);
//     /** Categories */
//     Route::resource('/categories', CategorieController::class);
//     Route::resource('/projets', ProjetController::class);
//     Route::resource('/reglements', ReglementController::class);
// });
// Route::resource('articles', [ArticleControlle::class, 'middleware' => 'auth.role:admin,caissier']);

  Route::group(['prefix' => 'auth'], function($router) {
    Route::resource('/articles', ArticleController::class);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/user-list', [AuthController::class, 'getUsers']);

    /** CLients */
    Route::resource('/clients', ClientController::class);
    /** Articles */
    //Route::resource('/articles', ArticleController::class);
    Route::get('/nbArticles', [ArticleController::class, 'nbArticleEnStock']);
    Route::post('/update-article/{article}', [ArticleController::class, 'updateArticle']);
    
    Route::get('/valeurTotalStock', [ArticleController::class, 'valeurTotalStock']);

    Route::get('/nbArticleBycategorie/{categories}', [CategorieController::class, 'nbArticleBycategorie']);
    Route::get('/getNombreCategorie', [CategorieController::class, 'getNombreCategorie']);
    
    /** FOURNISSEUR */
    Route::resource('/fournisseurs', FournisseurController::class);
    Route::get('/nbFournisseur', [FournisseurController::class, 'nbFournisseur']);
    /** Categories */
    Route::resource('/categories', CategorieController::class);
    Route::resource('/projets', ProjetController::class);
    Route::resource('/entrees', EntreeController::class);
    Route::resource('/ventes', VenteController::class);
   });