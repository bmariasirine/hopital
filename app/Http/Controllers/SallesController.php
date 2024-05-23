<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UniteFonctionnelle;
use App\Models\Patient;
use App\Events\PatientMoved;
use \DateTime;
use App\Models\Room;

class SallesController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        $options = UniteFonctionnelle::all();
    
        // Vérification si la liste des patients est vide
        if ($patients->isEmpty()) {
            return view('Salles.index', [
                'patients' => [],
                'options' => $options,
                'message' => 'Aucun patient trouvé'
            ]);
        }

        //$rooms = Room::with('patients')->get();
    
        foreach ($patients as $patient) {
            $patient->icone = ($patient->sexe === 'femme') ? 'femelle.png' : 'male.png';
            $patient->age = $this->calculateAge($patient->dateNaissance);
        }
    
        // Stocker les données en session
        session(['patients' => $patients]);
        session(['options' => $options]);
    
        return view('Salles.index', compact('patients', 'options'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function logoutP()
    {
        // Stocker toutes les données de session
        $userData = Session::all();
    
        // Stocker les données utilisateur avant déconnexion
        Session::put('user_data_before_logout', $userData);

        // Déconnexion de l'utilisateur
        auth()->logout();

        // Redirection vers la page de connexion
        return redirect('/');
    }

    public function storePatient(Request $request)
    {
        $id_infirmier = null;
        $id_medecin = null;
    
        // Récupérer les identifiants de l'infirmier et du médecin à partir de la session en cours
        $user = Auth::user();
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }

        $patient = Patient::create([
            'nom' => $request->input('nom'), 
            'nomJeuneFille' => $request->input('nomJeuneFille'), 
            'lieuNaissance' => $request->input('lieuNaissance'), 
            'telephone' => $request->input('telephone'), 
            'email' => $request->input('email'), 
            'prenom' => $request->input('prenom'), 
            'dateNaissance' => $request->input('dateNaissance'), 
            'adresse' => $request->input('adresse'), 
            'numeroAssurance' => $request->input('numeroAssurance'), 
            'sexe' => $request->input('sexe'), 
            'id_infirmier' => $id_infirmier, 
            'id_medecin' => $id_medecin, 
            
        ]);
    
        session()->put('patient_data', $request->except('_token'));

        return view('Salles.index')->with('success', 'Patient ajouté avec succès.');
    }
    
    private function calculateAge($dateNaissance) {
        if (!$dateNaissance) {
            return null;
        }
        $birthDate = new DateTime($dateNaissance);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;
    
        return $age;
    }

    public function move(Request $request, Patient $patient)
{
    $request->validate([
        'nouvelle_salle_id' => 'required|integer|exists:salles,id',
    ]);

    $nouvelleSalleId = $request->input('nouvelle_salle_id');

    $patient->id_salle = $nouvelleSalleId;
    $patient->save();

    // Diffuser l'événement de déplacement du patient via Laravel Reverb
    broadcast(new PatientMoved($patient->id, $nouvelleSalleId))->toOthers();

    return response()->json(['message' => 'Patient moved successfully']);
}

}
