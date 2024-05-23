<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangerMDPController extends Controller
{
    public function index()
    {
        // Logique pour afficher le formulaire de changement de mot de passe
        return view('ChangerMdp.index');
    }

    public function update(Request $request)
{
    //dd($request->all());

    $request->validate([
        'password' => 'required|string',
        'Newpassword' => 'required|string|confirmed',
    ]);

    $auth = Auth::user();

    if (!Hash::check($request->password, $auth->password)) {
        return back()->with('error', "Le mot de passe actuel est incorrect");
    }

    if (strcmp($request->password, $request->Newpassword) === 0) {
        return back()->with("error", "Le nouveau mot de passe ne peut pas être le même que l'ancien.");
    }

    /** @var \App\Models\User $auth **/
    $auth->password = Hash::make($request->Newpassword);
    $auth->first_login = false; 
    $auth->save();

    // Après l'authentification réussie
    $user = Auth::user();
    session(['nom_prenom' => $user->nom_prenom, 'role' => $user->role]);


    return redirect('/salles')->with('success', "Mot de passe changé avec succès");
}

}
