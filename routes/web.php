<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\administrationController;
use App\Http\Controllers\testController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ajoutDePersonnelController;
use App\Http\Controllers\conseilEtablissementController;
use App\Http\Controllers\conseilUniversiteController;
use App\Http\Controllers\etatDemandeController;
use App\Http\Controllers\listeEnAttenteController;
use App\Http\Controllers\PdfConseilEtablissementController;
use App\Http\Controllers\PdfConseilUniversiteController;
use App\Http\Controllers\commissionScientifiqueController;
use App\Http\Controllers\chefDepartementController;
use App\Http\Controllers\PdfCommissionScientifiqueController;
use App\Http\Controllers\PdfchefDepartementController;
use App\Http\Controllers\listeDesDemandesController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['checkRole:sg'])->group(function () {
    Route::get('/administration', [administrationController::class , 'showAll'])->name('administration');
    // Route::post('/administration', [administrationController::class , 'store'])->name('store');
    Route::get('/delete/{id}',  [administrationController::class , 'deleteData'])->name('delete.data');
    Route::get('/ajout', [ajoutDePersonnelController::class , 'show'])->name('ajoutDePersonnel');
    Route::post('/ajout', [ajoutDePersonnelController::class , 'store'])->name('store');
    Route::get('/listeEnAttente', [listeEnAttenteController::class , 'show'])->name('listeEnAttente');
    Route::post('/candidat/{id}/update-etat', [listeEnAttenteController::class , 'updateEtat'])->name('update-etat');
    Route::get('/edit/{id}', [administrationController::class , 'edit'])->name('editUser');
    Route::post('/update/{id}', [administrationController::class ,'update'])->name('updateUser');

});

    Route::get('/profile', [profileController::class , 'index'])->name('profile');
    Route::get('/conseilEtablissement', [conseilEtablissementController::class , 'showConseil'])->name('conseilEtablissement');
    Route::get('/conseilUniversite', [conseilUniversiteController::class , 'showConseilU'])->name('conseilUniversite');
    Route::post('/pdf', [PDFController::class, 'ajouterInformations'])->name('pdf');
    Route::post('/PdfConseilEtablissementController', [PdfConseilEtablissementController::class, 'ajouterInformations'])->name('PdfConseilEtablissementController');
    Route::post('/PdfConseilUniversitetController', [PdfConseilUniversiteController::class, 'ajouterInformations'])->name('PdfConseilUniversiteController');
    Route::get('/commissionScientifique', [commissionScientifiqueController::class , 'showCommission'])->name('commissionScientifique');
    Route::post('/PdfCommissionScientifiqueController', [PdfCommissionScientifiqueController::class, 'ajouterInformations'])->name('PdfCommissionScientifiqueController');
    Route::get('/chefDepartement', [chefDepartementController::class , 'showDepartement'])->name('chefDepartement');
    Route::post('/PdfchefDepartementController', [PdfchefDepartementController::class, 'ajouterInformations'])->name('PdfchefDepartementController');
    Route::get('/listeDesDemandes', [listeDesDemandesController::class , 'showlisteDesDemandes'])->name('listeDesDemandes');

// Route::middleware(['checkRole:sg,prof,admin'])->group(function () {
    Route::get('/', function () {return view('welcome');} )->name('welcome');
    Route::get('/test', [testController::class , 'index'])->name('test');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
// });
    Route::get('/login', [loginController::class , 'show'])->name('showLogin');
    Route::post('/login', [loginController::class , 'login'])->name('login');   

