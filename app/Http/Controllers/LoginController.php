<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('Login.index');
    }

    public function loginPost(Request $request) {
        // dd($request);
        $credentials = $request->only('nom_prenom', 'password');
        //  dd($credentials);
        if (Auth::attempt($credentials)) {
            // Vérifier si le paramètre de restauration de session est présent
            if ($request->has('restore_session')) {
                // Récupérer les données utilisateur avant déconnexion
                $userDataBeforeLogout = Session::get('user_data_before_logout');

                if ($userDataBeforeLogout) {
                    // Réappliquer les données de session précédentes
                    Session::put($userDataBeforeLogout);

                    // Supprimer les données stockées avant déconnexion
                    Session::forget('user_data_before_logout');
                }
            }

            return redirect()->intended($this->redirectTo());
        }

        return redirect()->back()->withInput()->withErrors(['login_error' => 'Identifiants invalides']);
    }

        public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            return redirect('/');
        }

        private function redirectTo()
        {
            switch(auth()->user()->role) {
                case 'admin':
                    $user = Auth::user();
                    session(['nom_prenom' => $user->nom_prenom, 'role' => $user->role]);
                    return '/administrateur';
                case 'infirmier':
                    if (auth()->user()->first_login) {
                        return '/changer_mot_de_passe';
                    }
                    // Après l'authentification réussie
                    $user = Auth::user();
                    session(['nom_prenom' => $user->nom_prenom, 'role' => $user->role]);
                    return '/salles';
                case 'medecin' :
                    if (auth()->user()->first_login) {
                        return '/changer_mot_de_passe';
                    }
                    // Après l'authentification réussie
                    $user = Auth::user();
                    session(['nom_prenom' => $user->nom_prenom, 'role' => $user->role]);
                    return '/salles';
                default:
                    return '/';
            }
        }
}
