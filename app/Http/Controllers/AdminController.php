<?php

namespace App\Http\Controllers;
use App\Models\UniteFonctionnelle;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $medecins = User::where('role', 'medecin')->get();
        $infirmiers = User::where('role', 'infirmier')->get();
        $admins = User::where('role', 'admin')->get();
        return view('Administrateur.index', compact('medecins', 'infirmiers', 'admins'));
        // Logique pour afficher le tableau de bord de l'admin

    }

    public function store(Request $request) {
        $user = User::create([
            'nom_prenom' => $request->input('nom_prenom'),
            'dateNaissance' => $request->input('dateNaissance'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'adresse' => $request->input('adresse'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
            'specialite' => $request->input('specialite'),
        ]);

        return view('Administrateur.index')->with('success', "L'utilisateur a bien été ajouté..");
    }

    public function storeUniteFonctionnelle(Request $request) {
        // Validation des données du formulaire
        // storeUniteFonctionnelle ==> store_unite_fonctionnelle
        $request->validate([
            'type_unite' => 'required',
            'numero' => 'required',
            'nom_unite' => 'required',
        ]);

        // Création d'une nouvelle instance d'UniteFonctionnelle
        $uniteFonctionnelle = new UniteFonctionnelle();
        $uniteFonctionnelle->type_unite = $request->input('type_unite');
        $uniteFonctionnelle->numero = $request->input('numero');
        $uniteFonctionnelle->nom_unite = $request->input('nom_unite');

        // Enregistrement dans la base de données
        $uniteFonctionnelle->save();

        // Redirection vers une page appropriée avec un message de succès
        return redirect()->route('Administrateur.index')->with('success', "L'unité fonctionnelle a bien été ajoutée...");
    }

    public function getMedecins() {
        $medecins = User::where('role', 'medecin')->get();
        $infirmiers = User::where('role', 'infirmier')->get();
        $admins = User::where('role', 'admin')->get();
        return view('Administrateur.index', compact('medecins', 'infirmiers', 'admins'));
    }

}
