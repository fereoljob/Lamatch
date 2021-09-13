<?php
use App\Http\Controllers\ControleurConnexion;
use App\Http\Controllers\ControleurClient;
use App\Http\Controllers\ControleurAdmin;
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

Route::get("/",[ControleurConnexion::class,"login"])->middleware("estDejaConnecte");
Route::post("connecter",[ControleurConnexion::class,"verifUser"]);
Route::get("Accueil",[ControleurConnexion::class,"Accueil"])->middleware("estConnecte");
Route::get("deconnecter",[ControleurConnexion::class,"logout"]);
Route::get("profil",[ControleurClient::class,"profil"])->middleware("estConnecte")->middleware("estClient");
Route::post("MajInfosPersos",[ControleurClient::class,"MajInfosPersos"])->middleware("estConnecte")->middleware("estClient");
Route::get('Enregistrerforma',[ControleurClient::class,"Majforma"])->middleware("estConnecte")->middleware("estClient");
Route::get('SupprimerForma',[ControleurClient::class,"SuppForma"])->middleware("estConnecte")->middleware("estClient");
Route::get("ValiderModif",[Controleurclient::class,"ValiderModif"])->middleware("estConnecte")->middleware("estClient");
Route::get('SupprimerExpe',[ControleurClient::class,"SupprimerExpe"])->middleware("estConnecte")->middleware("estClient");
Route::get("EnregistrerExpe",[ControleurClient::class,"EnregistrerExpe"])->middleware("estConnecte")->middleware("estClient");
Route::get("ValiderModifExpe",[ControleurClient::class,"ValiderModifExpe"])->middleware("estConnecte")->middleware("estClient");
Route::post("MajInfosPersosEntre",[ControleurClient::class,"MajInfosPersosEntre"])->middleware("estConnecte")->middleware("estClient");
Route::get("matching",[controleurClient::class,"matching"])->middleware("estConnecte")->middleware("estClient");
Route::post('detail_entre',[ControleurClient::class,"details_entre"])->middleware("estConnecte");
Route::post('detail_candi',[ControleurClient::class,"details_candi"])->middleware("estConnecte");
Route::get('gestion_company',[ControleurAdmin::class,"gestion_company"])->middleware("estConnecte")->middleware("estAdmin");
Route::get('gestion_candidates',[ControleurAdmin::class,"gestion_candidates"])->middleware("estConnecte")->middleware("estAdmin");
