<?php
use App\Http\Controllers\ControleurConnexion;
use App\Http\Controllers\ControleurClient;
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
Route::get("profil",[ControleurClient::class,"profil"])->middleware("estConnecte");
Route::post("MajInfosPersos",[ControleurClient::class,"MajInfosPersos"])->middleware("estConnecte");
Route::get('Enregistrerforma',[ControleurClient::class,"Majforma"])->middleware("estConnecte");
Route::get('SupprimerForma',[ControleurClient::class,"SuppForma"])->middleware("estConnecte");
Route::get("ValiderModif",[Controleurclient::class,"ValiderModif"])->middleware("estConnecte");
Route::get('SupprimerExpe',[ControleurClient::class,"SupprimerExpe"])->middleware("estConnecte");
Route::get("EnregistrerExpe",[ControleurClient::class,"EnregistrerExpe"])->middleware("estConnecte");
Route::get("ValiderModifExpe",[ControleurClient::class,"ValiderModifExpe"])->middleware("estConnecte");
Route::post("MajInfosPersosEntre",[ControleurClient::class,"MajInfosPersosEntre"])->middleware("estConnecte");
Route::get("matching",[controleurClient::class,"matching"])->middleware("estConnecte");
Route::post('detail_entre',[ControleurClient::class,"details_entre"])->middleware("estConnecte");