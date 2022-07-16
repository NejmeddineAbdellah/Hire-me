<?php

use App\Http\Controllers\Api\AnnoncecandidatController;
use App\Http\Controllers\Api\AnnonceController;
use App\Http\Controllers\Api\AnnoncerecruteurController;
use App\Http\Controllers\Api\CandidatController;
use App\Http\Controllers\Api\DemandeController;
use App\Http\Controllers\Api\SecteurController;
use App\Http\Controllers\Api\RecruteurController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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
Route::resource('secteur',SecteurController::class, ['only' => ['index','show']]);
Route::resource('annonce',AnnonceController::class, ['only' => ['index','show','showByTitre','showByType']]);
Route::resource('user',UserController::class, ['only' => ['store']]);
Route::resource('recruteur',RecruteurController::class,['only' => ['index','show']]);
Route::resource('candidat',CandidatController::class,['only' => ['index','show']]);
Route::resource('demande',DemandeController::class,['only' => ['index','show']]);
Route::resource('ancandidat',AnnoncecandidatController::class,['only' => ['index','show']]);
Route::resource('anrecruteur',AnnoncerecruteurController::class,['only' => ['index','show']]);
Route::get('use/{id}',[UserController::class,'getusercandidat']);  //get candidat by Id user
Route::get('annoncebysecteur/{titre}',[AnnonceController::class,'showByTitre']);
Route::get('annonceByType/{type}',[AnnonceController::class,'showByType']);
Route::get('getUser/{role}',[UserController::class,'getUserByRole']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);
Route::get('getlatestcandidatannonce',[AnnonceController::class,'getLatestAnnonceCandidat']);
Route::get('getlatestrecruteurannonce',[AnnonceController::class,'getLatestAnnonceRecruteur']);

Route::get('/getdemanderecruteur/{id}',[DemandeController::class,'getDemandesByAnnonceRecruteur']);
Route::get('/getAnnonceCandidatBySecteur/{titre}',[AnnonceController::class,'getAnnonceCandidatBySecteur']);
Route::get('/getAnnonceRecruteurBySecteur/{titre}',[AnnonceController::class,'getAnnonceRecruteurBySecteur']);



Route::group(['middleware'=>['auth:sanctum']],function(){
      
      Route::resource('user',UserController::class, ['only' => ['index','show']]);
      Route::resource('secteur',SecteurController::class, ['only' => ['store','update','destroy']]);
      Route::resource('annonce',AnnonceController::class, ['only' => ['store','update','destroy']]);
      Route::resource('user',UserController::class, ['only' => ['update','destroy']]);
      Route::resource('recruteur',RecruteurController::class,['only' => ['store','update','destroy']]);
      Route::resource('candidat',CandidatController::class,['only' => ['store','update','destroy']]);
      Route::resource('demande',DemandeController::class,['only' => ['store','update','destroy']]);
      Route::resource('ancandidat',AnnoncecandidatController::class,['only' => ['store','update','destroy']]);
      Route::resource('anrecruteur',AnnoncerecruteurController::class,['only' => ['store','update','destroy']]);
      Route::get('getAnnonceByuserId/{id}',[UserController::class,'getAnnonceByuserId']);
      Route::get('/admin', function(){return view('admin');}); 
        
});

