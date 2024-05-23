<?php

namespace App\Http\Controllers;
use App\Events\PatientMoved;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\Allergie;
use App\Models\Antecedent;
use App\Models\Conclusion;
use App\Models\Constante;
use App\Models\ExamenMedical;
use App\Models\ExamenParamedical;
use App\Models\Medecin;
use App\Models\Observation;
use App\Models\PersonneConfidente;
use App\Models\SortieDeces;
use App\Models\SortieHopital;
use App\Models\SortieMutation;
use App\Models\SortieTransfert;
use App\Models\SortieUHCD;
use App\Models\Vaccin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index($id) {
        // Utilisez $id pour récupérer le patient correspondant dans la base de données
        $patient = Patient::find($id);
    
        // Vérifiez si le patient existe avant de retourner la vue
        if ($patient) {
            return view('DossierPatient.index', compact('patient'));
        } else {
            // Gérez le cas où le patient n'existe pas (par exemple, afficher une page d'erreur)
            return redirect()->back()->with('error', 'Patient non trouvé');
        }
    }

    public function updateSalle(Request $request, Patient $patient)
    {
        $nouvelleSalleId = $request->input('nouvelle_salle_id');

        // Mettre à jour la salle du patient
        $patient->id_salle = $nouvelleSalleId;
        $patient->save();

        // Diffuser l'événement de déplacement du patient via Laravel Reverb
        broadcast(new PatientMoved($patient->id, $nouvelleSalleId))->toOthers();

        // Retourner une réponse JSON pour indiquer le succès ou la confirmation
        return response()->json(['message' => 'Salle du patient mise à jour avec succès']);
    }

    public function storeAdmission(Request $request, $id) {
        $id_infirmier = null;
        $id_medecin = null;
    
        // Récupérer les identifiants de l'infirmier et du médecin à partir de la session en cours
        $user = Auth::user();
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    
        // Vérifier si la case à cocher est présente dans la requête
        $accompagnantEnSalleDAttente = $request->has('accompagnants_en_salle_d_attente') ? 
                                        $request->input('accompagnants_en_salle_d_attente') : 
                                        'non';
    
        // Créer l'admission en utilisant les données de la requête et les identifiants récupérés
        $admission = Admission::create([
            'entree_le' => $request->input('entree_le'), 
            'brancard' => $request->input('brancard'), 
            'accompagnant_en_salle_d_attente' => $accompagnantEnSalleDAttente, 
            'mode_entree' => $request->input('mode_entree'), 
            'mode_consult' => $request->input('mode_consult'), 
            'mode_transport' => $request->input('mode_transport'), 
            'prise_en_charge_transport' => $request->input('prise_en_charge_transport'), 
            'motif_decrit_par_le_patient' => $request->input('motif_decrit_par_le_patient'), 
            'motif_entree_pmsi' => $request->input('motif_entree_pmsi'), 
            'id_infirmier' => $id_infirmier, 
            'id_patient' => $id, 
            'id_medecin' => $id_medecin, 
        ]);
    
        session()->put('admission_data', $request->except('_token'));
    
        return back()->route('DossierPatient.index', ['id' => $id])
            ->with('success', 'Admission créée avec succès');
    }


    public function showPatientDetails($id) {
        $admission = Admission::where('id_patient', $id)->latest()->first();
        $medecin = Medecin::where('id_patient', $id)->latest()->first();
        $personneconfidente = PersonneConfidente::where('id_patient', $id)->latest()->first();
        $allergie = Allergie::where('id_patient', $id)->latest()->first();
        $antecedent = Antecedent::where('id_patient', $id)->latest()->first();
        $observation = Observation::where('id_patient', $id)->latest()->first();
        $vaccins = Vaccin::where('id_patient', $id)->latest()->first();
        $exampara = ExamenParamedical::where('id_patient', $id)->latest()->first();
        $constante = Constante::where('id_patient', $id)->latest()->first();
        $examedic = ExamenMedical::where('id_patient', $id)->latest()->first();
        $conclusion = Conclusion::where('id_patient', $id)->latest()->first();
        $sortiehopital = SortieHopital::where('id_patient', $id)->latest()->first();
        $sortieuhcd = SortieUHCD::where('id_patient', $id)->latest()->first();
        $sortietransfert = SortieTransfert::where('id_patient', $id)->latest()->first();
        $sortiemutation = SortieMutation::where('id_patient', $id)->latest()->first();
        $sortiedeces = SortieDeces::where('id_patient', $id)->latest()->first();
    
        $sortieActive = null;
        $typeSortie = null;
    
        if ($sortiedeces) {
            $sortieActive = $sortiedeces;
            $typeSortie = 'Décès';
        } elseif ($sortiemutation) {
            $sortieActive = $sortiemutation;
            $typeSortie = 'Mutation';
        } elseif ($sortietransfert) {
            $sortieActive = $sortietransfert;
            $typeSortie = 'Transfert';
        } elseif ($sortieuhcd) {
            $sortieActive = $sortieuhcd;
            $typeSortie = 'UHCD';
        } elseif ($sortiehopital) {
            $sortieActive = $sortiehopital;
            $typeSortie = 'Hôpital';
        }
        
        if (!$admission && !$medecin && !$personneconfidente && !$allergie && !$antecedent && !$observation && !$vaccins && !$exampara && !$constante && !$examedic && !$conclusion && !$sortiehopital && !$sortieuhcd && !$sortietransfert && !$sortiemutation && !$sortiedeces) {
            return redirect()->back()->with('error', 'Aucune donnée trouvée pour ce patient.');
        }
    
        return view('DossierPatient.index', compact('admission', 'medecin', 'personneconfidente', 'allergie', 'antecedent', 'observation', 'vaccins', 'exampara', 'constante', 'examedic', 'conclusion', 'sortieActive', 'typeSortie'));
    }    

    

public function storeMedecin(Request $request, $id) {
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $medecin = Medecin::create([
        'medtrait' => $request->input('medtrait'), 

        // Responsables
        'nommedresp' => $request->input('nommedresp'), 
        'prenommedresp' => $request->input('prenommedresp'), 
        'addmedresp' => $request->input('addmedresp'), 
        'telmedresp' => $request->input('telmedresp'), 
        'emailmedresp' => $request->input('emailmedresp'), 

        // Adresseurs
        'nommedadd' => $request->input('nommedadd'), 
        'prenommedadd' => $request->input('prenommedadd'), 
        'addmedadd' => $request->input('addmedadd'), 
        'telmedadd' => $request->input('telmedadd'), 
        'emailmedadd' => $request->input('emailmedadd'), 

        // Foreign keys
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('medecin_data', $request->except('_token'));

    return back()->route('DossierPatient.index', ['id' => $id])
        ->with('success', 'Médecin créé avec succès');
}

public function storePersonneConfidente(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $personneconfidente = PersonneConfidente::create([
        'souhaite' => $request->input('souhaite'), 
        'genre' => $request->input('genre'), 
        'nomPC' => $request->input('nomPC'), 
        'prenomPC' => $request->input('prenomPC'), 
        'relation' => $request->input('relation'), 
        'autres_relation' => $request->input('autres_relation'), 
        'adressePC' => $request->input('adressePC'), 
        'telephonePC' => $request->input('telephonePC'), 
        'emailPC' => $request->input('emailPC'), 
        'directives' => $request->input('directives'), 
        'exemplaires_directives' => $request->input('exemplaires-directives'), 
        'date_hospitalisation' => $request->input('datehospitalise'), 
        'lieu_hospitalisation' => $request->input('lieuhospitalise'), 
        'date_confiance' => $request->input('dateconfiance'), 
        'lieu_confiance' => $request->input('lieuconfiance'), 
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('personneconfidente_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
    ->with('success', 'PersonneConfidente créé avec succès');

}

public function storeAllergie(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $allergie = Allergie::create([
        'aucune_allergie_declaree' => $request->input('aucuneall'), 
        'date_declaration_allergie' => $request->input('dateall'), 
        'allergie_medicaments' => $request->input('medForm'), 
        'autres_allergies' => $request->input('otherForm'), 
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('allergie_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
    ->with('success', 'allergie créé avec succès');

}

public function storeAntecedent(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $antecedent = Antecedent::create([
        'aucuneante' => $request->input('aucuneante'), 
        'dateantc' => $request->input('dateantc'), 
        'amedForma' => $request->input('amedForma'), 
        'achirForma' => $request->input('achirForma'), 
        'afamForma' => $request->input('afamForma'), 
        'autresForma' => $request->input('autresForma'), 
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('antecedent_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
    ->with('success', 'antecedent créé avec succès');

}

public function storeObservation(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $obsservation = Observation::create([
        'commurg' => $request->input('commurg'), 
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('observation_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
    ->with('success', 'antecedent créé avec succès');

}

public function storeVaccin(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $vaccin = Vaccin::create([
        'vaccins' => $request->input('vaccins'), 
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('vaccin_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
    ->with('success', 'antecedent créé avec succès');

}

public function storeIAOAndConstante(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer l'examen paramédical en utilisant les données de la requête et les identifiants récupérés
    $exampara = ExamenParamedical::create([
        'iao_datetime'=> $request->input('iao_datetime'),
        'iao_user'=> $request->input('iao_user'),
        'brancardiao'=> $request->input('brancardiao'), 
        'filiere'=> $request->input('filiere'),
        'circonstance'=> $request->input('circonstance'),
        'motif_recours_iao'=> $request->input('motif_recours_iao'),
        'motif_acceuil_iao'=> $request->input('motif_acceuil_iao'),
        'prise_en_charge_iao'=> $request->input('prise_en_charge_iao'),
        'vat_du_jour'=> $request->input('vat_du_jour'), 
        'options'=> $request->input('options'),
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    // Créer les constantes en utilisant les données de la requête et les identifiants récupérés
    $constante = Constante::create([
        'sair' =>$request->input('sair'),
        'so2' =>$request->input('so2'),
        'commentaireair' =>$request->input('commentaireair'),
        'tas' =>$request->input('tas'),
        'tad' =>$request->input('tad'),
        'commentaireta' =>$request->input('commentaireta'),
        'glycemie' =>$request->input('glycemie'),
        'commentairegly' =>$request->input('commentairegly'),
        'pouls' =>$request->input('pouls'),
        'commentairepouls' =>$request->input('commentairepouls'),
        'deg' =>$request->input('deg'),
        'commentairedeg' =>$request->input('commentairedeg'),
        'echelle' =>$request->input('echelle'),
        'commentaireechelle' =>$request->input('commentaireechelle'),
        'fr' =>$request->input('fr'),
        'commentairefr' =>$request->input('commentairefr'),
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('exampara_data', $request->except('_token'));
    session()->put('constante_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
        ->with('success', 'Examen paramédical et constantes créés avec succès');
}


public function storeExamenMedical(Request $request, $id) {

    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $examedic = ExamenMedical::create([
        'medecin_exam'=>$request->input('medecin_exam'),
        'nom_medecin'=>$request->input('nom_medecin'),
        'interne_exam'=>$request->input('interne_exam'),
        'nom_interne'=>$request->input('nom_interne'),
        'motif_recours_medecin'=>$request->input('motif_recours_medecin'),
        'ccmu'=>$request->input('ccmu'),
        'historique_maladie'=>$request->input('historique_maladie'),
        'examen_clinique'=>$request->input('examen_clinique'),
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);

    session()->put('examedic_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
        ->with('success', 'antecedent créé avec succès');
}

public function storeConclusion(Request $request, $id) {

    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();
        
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Créer le médecin en utilisant les données de la requête et les identifiants récupérés
    $conclusion = Conclusion::create([
        'medecinC' =>$request->input('medecinC'),
        'medecinCN' =>$request->input('medecinCN'),
        'residentC' =>$request->input('residentC'),
        'residentCN' =>$request->input('residentCN'),
        'conclusionC' =>$request->input('conclusionC'),
        'gemsa' =>$request->input('gemsa'),
        'DP' =>$request->input('DP'),
        'DAS' =>$request->input('DAS'),
        'CAM' =>$request->input('CAM'),
        'id_medecin' => $id_medecin, 
        'id_infirmier' => $id_infirmier, 
        'id_patient' => $id, 
    ]);
    
    session()->put('conclusion_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
        ->with('success', 'conclusion créé avec succès');
}


public function storeSortie(Request $request, $id)
{
    $id_infirmier = null;
    $id_medecin = null;

    // Vérifier si un utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();

        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'infirmier') {
            $id_infirmier = $user->id;
        } elseif ($user->role === 'medecin') {
            $id_medecin = $user->id;
        }
    }

    // Déterminer le modèle en fonction de la présence de certaines clés dans la requête
    if ($request->has('orientationsortie')) {
        $model = SortieHopital::class;
        $data = [
            'orientationsortie' => $request->input('orientationsortie'),
            'personne_prevenue' => $request->input('personne-prevenue'),
            'certificat_refus' => $request->input('certificat-refus'),
        ];
    } elseif ($request->has('options_uhcd')) {
        $model = SortieUHCD::class;
        $data = [
            'options_uhcd' => $request->input('options_uhcd'),
            'place_trouvee' => $request->input('place_trouvee'),
            'date_heure_mutation' => $request->input('date_heure_mutation'),
            'mobiliteuhcd' => $request->input('mobilitéuhcd'),
        ];
    } elseif ($request->has('destination')) {
        $model = SortieTransfert::class;
        $data = [
            'destination' => $request->input('destination'),
            'etablissement_destination' => $request->input('etablissement-destination'),
            'place_trouveeT' => $request->input('place_trouveeT'),
            'dh_prevueT' => $request->input('dh-prevueT'),
            'patienta' => $request->input('patienta'),
            'obc' => $request->input('obc'),
            'mobilite_transfert' => $request->input('mobilitétransfert'),
        ];
    } elseif ($request->has('specialite')) {
        $model = SortieMutation::class;
        $data = [
            'specialite' => $request->input('specialite'),
            'responsabilite-hebergement' => $request->input('responsabilite-hebergement'),
            'placetrouveeM' => $request->input('placetrouveeM'),
            'dhprevueT' => $request->input('dhprevueT'),
            'mobiliteM' => $request->input('mobiliteM'),
        ];
    } elseif ($request->has('dh-deces')) {
        $model = SortieDeces::class;
        $data = [
            'dh_deces' => $request->input('dh-deces'),
            'certificat_deces' => $request->input('certificat-deces'),
            'transfert_corps' => $request->input('transfert-corps'),
            'famille_prevenue' => $request->input('famille_prevenue'),
            'famille_presente' => $request->input('famille_presente'),
        ];
    } else {
        return redirect()->back()->with('error', 'Type de sortie non valide.');
    }

    // Préparer les données pour la création
    $insertData = array_merge($data, [
        'id_medecin' => $id_medecin,
        'id_infirmier' => $id_infirmier,
        'id_patient' => $id,
    ]);
    // Créer la sortie en utilisant les données de la requête et les identifiants récupérés
    $sortie = $model::create($insertData);

    // Mettre les données de la sortie en session
    session()->put(class_basename($model).'_data', $request->except('_token'));

    return redirect()->route('DossierPatient.index', ['id' => $id])
        ->with('success', ucfirst(class_basename($model)).' créé avec succès');
}
}



