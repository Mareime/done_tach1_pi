<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\beneficiaireController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\TaxeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controleruser;
// Route to display the login form (GET request)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [ControlerUser::class, 'Verifie_User_existe'])->name('connexion');
// Exportation des comptes
// Route::get('compt/export', [CompteController::class, 'export'])->name('compt.export');
Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');
Route::get('paiements/{id}/export', [PaiementController::class, 'export'])->name('paiements.export');

// Importation des comptes
// Exporter et importer les comptes
Route::get('comptes/export', [CompteController::class, 'export'])->name('compte.export');
Route::post('comptes/import', [CompteController::class, 'import'])->name('compte.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');
Route::get('paiements/{id}/import', [PaiementController::class, 'export'])->name('paiements.import');

Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');

// Importation des comptes
Route::post('comptes/import', [CompteController::class, 'import'])->name('compte.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');
Route::middleware(['auth'])->group(function () {
    Route::get('/compte', function () {
        return view('compte.index'); // Page protégée
    })->name('compte.index');
});
Route::get('/comptes/create', [CompteController::class, 'create'])->name('compte.create');
Route::post('/comptes', [CompteController::class, 'store'])->name('compte.store');
Route::get('/comptes/{compte}/edit', [CompteController::class, 'edit'])->name('compte.edit');
Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name('compte.update');
Route::delete('/comptes/{compte}', [CompteController::class, 'destroy'])->name('compte.destroy');
// pour la table beneficaire
// Route::get('/beneficiaires', [beneficiaireController::class, 'index'])->name('beneficiaire.index');
// Route::get('/beneficiaires/create', [beneficiaireController::class, 'create'])->name('beneficiaire.create');
// Route::post('/beneficiaires', [beneficiaireController::class, 'store'])->name('beneficiaire.store');
// Route::get('/beneficiaires/{beneficiaire}/edit', [beneficiaireController::class, 'edit'])->name('beneficiaire.edit');
// Route::put('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'update'])->name('beneficiaire.update');
// Route::delete('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'destroy'])->name('beneficiaire.destroy');

// Routes pour les paiements
Route::resource('paiements', PaiementController::class);
Route::get('paiements/create',[PaiementController::class,'create'])->name('paiement.create');
Route::post('/paiements',[PaiementController::class,'store'])->name('paiements.store');

// // connexion
// Route::post('/connexion', [ControlerUser::class, 'Verifie_User_existe'])->name('connexion');


// Routes poue les Taxes

Route::resource('taxes', TaxeController::class);
Route::get('/taxes/create', [TaxeController::class, 'create'])->name('taxes.create'); 
Route::post('/taxes', [TaxeController::class, 'store'])->name('taxes.store');
Route::delete('/taxes/{id}', [TaxeController::class, 'destroy'])->name('taxes.destroy');
Route::post('/taxes/import', [TaxeController::class, 'import'])->name('taxes.import'); // Importation des taxes
Route::get('/taxes/export', [TaxeController::class, 'export'])->name('taxes.export'); // Exportation des taxes
Route::resource('taxes', TaxeController::class)->except(['show']);
// Auth
// z
Route::get('/get-user-id', [controleruser::class, 'getUserId'])->name('getUserId');
Route::middleware(['checkSession'])->group(function () {
    Route::get('/beneficiaires', [BeneficiaireController::class, 'index'])->name('beneficiaire.index');
    Route::get('/beneficiaires/create', [BeneficiaireController::class, 'create'])->name('beneficiaire.create');
    Route::post('/beneficiaires', [BeneficiaireController::class, 'store'])->name('beneficiaire.store');
    Route::get('/beneficiaires/{beneficiaire}/edit', [BeneficiaireController::class, 'edit'])->name('beneficiaire.edit');
    Route::put('/beneficiaires/{beneficiaire}', [BeneficiaireController::class, 'update'])->name('beneficiaire.update');
    Route::delete('/beneficiaires/{beneficiaire}', [BeneficiaireController::class, 'destroy'])->name('beneficiaire.destroy');
});
