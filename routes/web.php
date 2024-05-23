<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangerMDPController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\PatientController;

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/', [LoginController::class,'loginPost'])->name('loginPost');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/administrateur', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/administrateur', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/administrateur/medecins', [AdminController::class, 'getMedecins'])->name('admin.getMedecins');
    Route::post('/unites-fonctionnelles', [AdminController::class, 'storeUniteFonctionnelle'])->name('admin.storeUniteFonctionnelle');
    
    Route::get('/changer_mot_de_passe', [ChangerMDPController::class,'index'])->name('changerMdp.index');
    Route::post('/changer_mot_de_passe', [ChangerMDPController::class, 'update'])->name('changerMdp.update');
    
    Route::get('/salles', [SallesController::class, 'index'])->name('salles.index');
    Route::post('/salles', [SallesController::class, 'storePatient'])->name('salles.storePatient');
    Route::post('/salles', [SallesController::class, 'updateSalle'])->name('patients.move');

    
    Route::get('/dossier-patient/{id}', [PatientController::class, 'index'])->name('dossier_patient');
    Route::post('/dossier-patient/{id}/admission', [PatientController::class, 'storeAdmission'])->name('dossier_patient.storeAdmission');
    Route::post('/dossier-patient/{id}/medecin', [PatientController::class, 'storeMedecin'])->name('dossier_patient.storeMedecin');
    Route::post('/dossier-patient/{id}/personne-confidente', [PatientController::class, 'storePersonneConfidente'])->name('dossier_patient.storePersonneConfidente');
    Route::post('/dossier-patient/{id}/allergie', [PatientController::class, 'storeAllergie'])->name('dossier_patient.storeAllergie');
    Route::post('/dossier-patient/{id}/antecedent', [PatientController::class, 'storeAntecedent'])->name('dossier_patient.storeAntecedent');
    Route::post('/dossier-patient/{id}/observation', [PatientController::class, 'storeObservation'])->name('dossier_patient.storeObservation');
    Route::post('/dossier-patient/{id}/vaccin', [PatientController::class, 'storeVaccin'])->name('dossier_patient.storeVaccin');
    Route::post('/dossier-patient/{id}/iao-and-constante', [PatientController::class, 'storeIAOAndConstante'])->name('dossier_patient.storeIAOAndConstante');
    Route::post('/dossier-patient/{id}/examen-medical', [PatientController::class, 'storeExamenMedical'])->name('dossier_patient.storeExamenMedical');
    Route::post('/dossier-patient/{id}/conclusion', [PatientController::class, 'storeConclusion'])->name('dossier_patient.storeConclusion');
    Route::post('/dossier-patient/{id}/sortie', [PatientController::class, 'storeSortie'])->name('dossier_patient.storeSortie');
    Route::get('/dossier-patient/{id}/details', [PatientController::class, 'showPatientDetails'])->name('dossier_patient.showPatientDetails');

    Route::get('/logoutP', [SallesController::class,'logoutP'])->name('logoutP');
});


