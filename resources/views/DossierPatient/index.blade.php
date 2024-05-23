<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <script src="js/tinymce.min.js" type="text/javascript"></script>
    <script src="js/tinymce/plugins/fontselect/plugin.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/dossier.css">
    <title>Dossier Patient</title>
    <link rel="icon" type="image/png" href="/images/personneO.png" id="favicon">
</head>
<body>
<div class="container">
    <nav class="nav-gauche">
        <div class="logo">
            <img src="/images/logo.png" alt="Logo">
        </div>
        <div class="home">
            <a href="./home/index.html"><img src="/images/home.png" alt="Home"></a>
        </div>
        <div class="salles">
            <a href="{{ route('salles.index') }}"><img src="/images/salles.png" alt="Salle"></a>
        </div>
        <div class="dossierP">
            <a href=""><img src="/images/patientnav.png" alt="dossierP"></a>
        </div>
    </nav>
    <div class="cote-droit">
        <nav class="nav">
            <nav class="nav-haut">
                <div class="service">
                    <span class="urgences">Urgences</span>
                    <div class="x">
                        <a href="/home/index.html"><img src="/images/cancel.png" alt="x"></a>
                    </div>
                </div>
                <div class="refresh">
                    <a href="./index.html"><img src="/images/refresh.png" alt="Refresh"></a>
                </div>
                <select class="select-service">
                    @if(session()->has('options'))
                        @foreach(session('options') as $option)
                            <option value="{{ $option->numero }}">{{ $option->numero }} - {{ $option->nom_unite }}</option>
                        @endforeach
                    @else
                        <option value="">Aucune option disponible</option>
                    @endif
                </select>
                <div class="clock" id="dateDisplay">
                    <div id="day" class="column"></div>
                    <div class="column1">
                        <span id="dayAbbr"></span>
                        <span id="month"></span>
                    </div>
                    <div class="linehor"></div>
                    <div id="systemTime" class="heure"></div>
                </div>
                <div class="param">
                    <div id="google_translate_element" class="traduction"></div>
                    <div class="decoP">
                        <a href="{{ route('logoutP') }}?restore_session=true">
                            <img src="/images/shuffle.png" alt="deconnexionP">
                        </a>
                    </div>
                    <div class="deco">
                        <a href="{{ route('logout') }}">
                            <img src="/images/deconnexion.png" alt="deconnexion">
                        </a>
                    </div>
                </div>
            </nav>
            <nav class="nav2">
                <div class="dossierEtat">
                    <img src="/images/icons8NouveauDossier301.png" alt="">
                </div>
                <div class="dossierDate">
                    <div>
                        <div class="centrer_date_urg">
                            <p class="Urgence">Urgence</p>
                            <p class="dossier-heure">1H23</p>
                        </div>
                        <p class="dossier-date">14/03/2024</p>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="dossierSalle">
                    <div>
                        <p class="localisation">Salle 1</p>
                        <p class="hebergement">Héb: 0001</p>
                        <p class="medical">Méd: 0001</p>
                    </div>
                    <div class="line"></div>
                </div>
                @if(isset($patient))
                    <div class="infoPatient">
                    @if($patient->sexe === 'homme')
                        <img src="/images/male.png" alt="">
                    @else
                        <img src="/images/femelle.png" alt="">
                    @endif
                        <div>
                            <p class="nomPrenom">{{ $patient->nom }} {{ $patient->prenom }}</p>
                            <span class="naiss-ip">
                                <p class="naiss">Né{{ $patient->sexe === 'homme' ? '' : 'e' }} le {{ $patient->dateNaissance }}</p>
                                <p class="IP">IP: {{ $patient->id }}</p>
                            </span>
                        </div>
                    </div>
                @else
                    <p>Informations du patient non disponibles.</p>
                @endif
                <div class="mesurePatient">
                    <img onclick="openPopupTaille()" src="/images/icons8Badge322.png" alt="">
                    <div>
                        <p class="poids">Poids 57</p>
                        <p class="taille">Taille 1.62</p>
                    </div>
                </div>
            </nav>
            <nav class="nav3">
                <div class="nav-syntheses">
                    <a href="#" onclick="toggleActive(this, 'sejourM'); return false;" class="active">
                        <img src="/images/synthese.png" alt="">Synthéses
                    </a>
                </div>
                <div class="nav-dossier">
                    <a href="#" onclick="toggleActive(this, 'Dossier'); return false;">
                        <img src="/images/dossier.png" alt="">Dossier
                    </a>
                </div>
                <div class="nav-document">
                    <a href="#" onclick="toggleActive(this, 'document'); return false;">
                        <img src="/images/document.png" alt="">Document
                    </a>
                </div>
                <div class="nav-prescription">
                    <a href="#" onclick="toggleActive(this, 'prescription'); return false;">
                        <img src="/images/stylo.png" alt="">Prescription
                    </a>
                </div>
                <div class="nav-ordSortie">
                    <a href="#" onclick="toggleActive(this, 'ordSortie'); return false;">
                        <img src="/images/ordsortie.png" alt="">Ord.Sortie
                    </a>
                </div>
                <div class="nav-planSoins">
                    <a href="#" onclick="toggleActive(this, 'planDeSoins'); return false;">
                        <img src="/images/plandesoins.png" alt="">Plan de soins
                    </a>
                </div>
            </nav>
            <nav class="nav4">
                <div>
                    <a href="#" class="active4" onclick="toggleActive4(this, 'sejourM'); return false;">
                        <img src="/images/sejourN.png" class="sejour" alt="">Séjour
                    </a>
                </div>
                <div>
                    <a href="#" onclick="toggleActive4(this, 'patientM'); return false;">
                        <img src="/images/patient.png" class="patientim" alt="">Patient
                    </a>
                </div>
            </nav>
        </nav>
        <main class="main-general main-content active" id="sejourM">
            <div class="ligne-1">
                <div class="admission">
                    <a href="#" onclick="openPopupAdmission()"><img src="/images/admission.png" alt="">Admission</a>
                        @if(isset($admission))
                            <div class="admissionContent">
                                <p>Date et heure d'entrée: <span class="carteData">{{ $admission->entree_le }}</span></p>
                                <p>Prise en charge transport: <span class="carteData">{{ $admission->prise_en_charge_transport }}</span></p>
                                <p>Motif décrit par le patient: <span class="carteData">{{ $admission->motif_decrit_par_le_patient }}</span></p>
                                <p>Mode de transport: <span class="carteData">{{ $admission->mode_transport }}</span></p>
                                <p>Mode entrée: <span class="carteData">{{ $admission->mode_entree }}</span></p>
                                <p>Motif de CS:<span class="carteData"> {{ $admission->mode_consult }}</span></p>
                                <p>Motif d'entrée PMSI: <span class="carteData">{{ $admission->motif_entree_pmsi }}</span></p>
                            </div>
                        @else
                            <p>Aucune admission trouvée.</p>
                        @endif
                </div>
                <div class="medecins">
                    <a href="#" onclick="openPopupMedecins()"><img src="/images/medecin.png" alt="">Médecins</a>
                    <div class="medecinContent">
                        <h4>Traitant</h4>
                        @if(isset($medecin))
                            <p>{{ $medecin->medtrait }}</p>
                        @else
                            <p class="nonRen">Non renseigné</p>
                        @endif
                        <h4>Responsables</h4>
                        @if(isset($medecin))
                            <p class="carteData">{{ $medecin->nommedresp }} {{ $medecin->prenommedresp }}</p>
                        @else
                            <p class="nonRen">Non renseigné</p>
                        @endif
                        <h4>Adresseurs</h4>
                        @if(isset($medecin))
                            <p>{{ $medecin->nommedadd }} {{ $medecin->prenommedadd }}</p>
                        @else
                            <p class="nonRen">Non renseigné</p></div>
                        @endif
                    </div>
                </div>
                <div class="personneConfidente">
                    <a href="#" onclick="openPopupPersonneConfidente()"><img src="/images/personneconfidente.png" alt="">Personne confidente</a>
                    @if(isset($personneconfidente))
                        <p class="carteData">{{ $personneconfidente->genre === 'monsieur' ? 'M. ' : 'Mme. ' }} {{ $personneconfidente->nomPC }} {{ $personneconfidente->prenomPC }} ({{ $personneconfidente->relation === 'autres' ? $personneconfidente->autres_relation :  $personneconfidente->relation}})</p>
                    @else
                        <p class="nonRen">Personne confidente non renseignée</p>
                    @endif
                </div>
            </div>
            <div class="ligne-2">
                <div class="allergies">
                    <a href="#" onclick="openPopupAllergies()"><img src="/images/allergie.png" alt="">Allergies</a>
                    @if(isset($allergie))
                        @if($allergie->aucune_allergie_declaree === 'oui')
                            <p>Aucune allergie déclarée.</p>
                        @else
                            @if($allergie->autres_allergies)
                                <p><strong>Type d'allergie (autres) :</strong> {{ $allergie->autres_allergies }}</p>
                            @endif
                            @if($allergie->allergie_medicaments)
                                <p><strong>Type d'allergie (médicaments) :</strong> {{ $allergie->allergie_medicaments }}</p>
                            @endif
                        @endif
                    @else
                        <p>Allergies non renseignées.</p>
                    @endif
                </div>
                <div class="antecedents">
                    <a href="#" onclick="openPopupAntecedents()"><img src="/images/antecedent.png" alt="">Antécedents</a>
                    @if(isset($antecedent))
                        @if($antecedent->aucuneante === 'oui')
                            <p>Aucun antécédent déclaré.</p>
                        @else
                            @if($antecedent->amedForma)
                                <p><strong>Type d'antécédent (médical) :</strong> {{ $antecedent->amedForma }}</p>
                            @endif
                            @if($antecedent->achirForma)
                                <p><strong>Type d'antecedent (chirurgical) :</strong> {{ $antecedent->achirForma }}</p>
                            @endif
                            @if($antecedent->afamForma)
                                <p><strong>Type d'antecedent (familial) :</strong> {{ $antecedent->afamForma }}</p>
                            @endif
                            @if($antecedent->autresForma)
                                <p><strong>Type d'antecedent (autres) :</strong> {{ $antecedent->autresForma }}</p>
                            @endif
                        @endif
                    @else
                        <p>Antécédents non renseignés.</p>
                    @endif
                </div>
                <div class="observations">
                    <a href="#" onclick="openPopupObservations()"><img src="/images/observations.png" alt="">Observations</a>
                    @if(isset($observation))
                        <p>{{ $observation->commurg }}</p>
                    @else
                        <p>Aucune observations.</p>
                    @endif
                </div>
                <div class="vaccins">
                    <a href="#" onclick="openPopupVaccins()"><img src="/images/vaccins.png" alt="">Vaccins</a>
                    @if(isset($vaccins))
                        <p>{{ $vaccins->vaccins }}</p>
                    @else
                        <p>VAT non renseigné.</p>
                    @endif
                </div>
            </div>
            <div class="ligne-3">
                <div class="examenParamedical">
                    <a href="#" onclick="openPopupExamenParaMed()"><img src="/images/infirmier.png" alt="">Examen Paramédical</a>
                    @if(isset($exampara))
                        <p>Prise en charge le: {{ $exampara->iao_datetime }} par: {{$exampara->iao_user}}</p>
                        <p>Score du tri: {{$exampara->options}}</p>
                        <p>Circonstance d'admission: {{ $exampara->circonstance }}</p>
                        <p>Motif de recours: {{ $exampara->motif_recours }}</p>
                        <p>Motif d'acceuil: {{ $exampara->motif_acceuil }}</p>
                        <p>Filière: {{ $exampara->filiere }}</p>
                    @else
                        <p>Aucun examen pramédical trouvé.</p>
                    @endif
                </div>
                <div class="examenMedical">
                    <a href="#" onclick="openPopupExamenMed()"><img src="/images/medecin.png" alt="">Examen Médical</a>
                    @if(isset($examedic))
                        <p>Médecin référent: {{ $examedic->nom_medecin }}</p>
                        <p>Prise en charge le: {{$examedic->medecin_exam}} par: {{$examedic->nom_medecin}}</p>
                        <p>Motif de recours: {{ $examedic->motif_recours_medecin }}</p>
                        <p>Score de gravité (CCMU): 
                            @switch($examedic->ccmu)
                                @case('d')
                                    D - Patient décédé à l'entrée aux urgences sans avoir pu bénéficier de manoeuvres de réanimation
                                    @break
                                @case('p')
                                    P - Idem CCMU 1 avec problème dominant psychiatrique ou psychologique isolé ou associé à une pathologie somatique stable
                                    @break
                                @case('1')
                                    1 - Etat lésionnel ou pronostic fonctionnel jugé stable, avec abstention d'actes complémentaires ou de thérapeutique
                                    @break
                                @case('2')
                                    2 - Etat lésionnel ou pronostic fonctionnel jugé stable, réalisation d'actes complémentaires (hors diagnostiques)
                                    @break
                                @case('3')
                                    3 - Etat lésionnel ou pronostic fonctionnel jugé susceptible de s'aggraver aux urgences
                                    @break
                                @case('4')
                                    4 - Situation pathologique engageant le pronostic vital aux urgences sans manoeuvre de réanimation
                                    @break
                                @case('5')
                                    5 - Situation pathologique engageant le pronostic vital aux urgences avec manoeuvre de réanimation
                                    @break
                                @default
                                    Non défini
                            @endswitch
                        </p>
                    @else
                        <p>Aucun examen médical trouvé.</p>
                    @endif
                </div>
            </div>
            <div class="ligne-4">
                <div class="conclusion">
                    <a href="#" onclick="openPopupConclusion()"><img src="/images/conclusion.png" alt="">Conclusion</a>
                    @if(isset($conclusion))
                        <p>DP: {{ $conclusion->DP }}</p>
                    @else
                        <p>Conclusion pas encore renseignée.</p>
                    @endif
                </div>
                <div class="constantes">
                    <a href="#" onclick="openPopupConstantes()"><img src="/images/ecg.png" alt="">Constantes</a>
                    <p>Constantes à l'entrée:</p>
                        @if(isset($constante))
                            <p>Saturation sous air ambiant: {{ $constante->sair }}</p>
                            <p>Saturation sous O2: {{$constante->so2}}</p>
                            <p>TA systolique: {{ $constante->tas }}</p>
                            <p>TA diastolique: {{ $constante->tad }}</p>
                            <p>Glycémie capillaire: {{ $constante->glycemie }}</p>
                            <p>Pouls: {{ $constante->pouls }}</p>
                            <p>T°C: {{ $constante->deg }}</p>
                            <p>Echelle utilisé: {{ $constante->echelle }}</p>
                            <p>FR: {{ $constante->fr }}</p>
                        @else
                            <p>Aucune constante trouvée.</p>
                        @endif
                </div>
                <div class="fiche">
                    <a href="#"><img src="/images/fiches.png" alt="">Fiches</a>
                    <div>
                        <a href="#"onclick="openPopupFicheUhcd()"><img src="/images/fiches.png" alt="">Fiche uhcd</a>
                        <a href="#"onclick="openPopupFicheUca()"><img src="/images/fiches.png" alt="">Fiche uca</a>
                    </div>
                </div>
                <div class="prescription">
                    <a href="#" onclick="openPopupPrescription()"><img src="/images/prescription.png" alt="">Préscription</a>
                    <div>
                        <a href="">Surveillence</a>
                        <a href="">Médicaments</a>
                        <a href="">Biologies</a>
                        <a href="">RX-Imagerie</a>
                        <a href="">Autres</a>
                    </div>
                </div>
            </div>
            <div class="ligne-5">
                <div class="orientation">
                    <a href="#" onclick="openPopupOrientation()"><img src="/images/orientation.png" alt="">Orientation</a>
                    @if(isset($sortieActive))
                        @if($sortieActive)
                            <h2>Type de sortie: {{ $typeSortie }}</h2>
                            <p>Date et heure de sortie: {{ $sortieActive->created_at }}</p>
                        @else
                            <p>Aucune sortie active trouvée pour ce patient.</p>
                        @endif
                    @endif
                </div>
                <div class="documents">
                    <a href="#"onclick="openPopupDocuments()"><img src="/images/documents.png" alt="">Documents</a>
                </div>
            </div>
        </main>
        <main class="main-generalInfoP main-content" id="patientM">
            <div class="titrePatient">
                <img src="/images/arrow.png" alt="">
                <h3>Information sur le patient</h3>
            </div>
            <div class="infoPatient">
                <img src="/images/icons8Lady501.png" alt="">
                <div>
                    <p class="nomPrenom">MEZOUI AHLEM</p>
                    <span class="naiss-IP">
                        <p class="naiss">Née le 29/02/1989 </p>
                        <p class="IP">IP:12345678</p>
                    </span> 
                </div>
            </div>
            <div class="titrePatient">
                <img src="/images/arrow.png" alt="">
                <h3>Adresse et téléphone</h3>
            </div>
            <div class="adrTel">    
                <div>
                    <img src=".//images/gps.png" alt="">
                    <p>Benaknoun,Alger</p>
                </div>
                <div>
                    <img src=".//images/telephone.png" alt="">
                    <p>0567787902</p>
                </div>
                <div>
                    <img src=".//images/email.png" alt="">
                    <p>AmelMez@gmail.com</p>
                </div>
            </div>
            <div class="titrePatient">
                <img src="/images/arrow.png" alt="">
                <h3>Prise en charge</h3>
            </div>
            <div class="priseEnCharge">
                <img src="/images/icons8-hospital-bed-64.png" alt="">
                <div>
                    <p>UF d'hébergement:<span>1908</span></p><!-- mettre un ifElse -->
                    <p>Chambre: <span>num</span></p>
                    <p>lit:<span>num</span></p>
                </div>
            </div>
        </main>
        <main class="ordSortie main-content" id="ordSortie">
            <form class="ordInput">
                <div class="ordDate">
                    <h3>Ordonnance de Sortie</h3>
                    <input type="date" name="" id="">
                </div>
                <div>
                    <input type="text" id="medicament" placeholder="Médicament" required>
                    <input type="text" id="duree" placeholder="Durée" required>
                    <input type="text" id="type" placeholder="Type" required>
                    <button type="submit"><img src="/images/medicalBook.png" class="ordbook" alt=""></button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>libellé</th>
                            <th>C.</th>
                            <th>S.</th>
                            <th>Etat</th>
                            <th>ALD</th>
                            <th>Non substituable</th>
                            <th>Hors AMM</th>
                            <th>Durée</th>
                            <th>Type</th>
                            <th>Traitement</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="11">Traitement</th>
                        </tr>
                    </thead>
                    <tbody id="medicationTable">
                        <tr>
                            <td class="nomMed">Paracetamol (doliprane,dafalgan) 500mg Gellule - Voie orale tous les 8 heures 5 jours</td>
                            <td></td>
                            <td><img src="/images/icons8-agreement-50.png" alt=""></td>
                            <td>en cours</td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>5 jours</td>
                            <td>medicament</td>
                            <td></td>
                            <td><img src="/images/poubelle.png" alt=""></td>
                        </tr>
                    </tbody>
                </table>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    <button><img src="/images/imprimer.png" alt="print">Imprimer</button>
                </div>
            </form>
        </main>     
        <main id="Dossier" class="main-content">
            <!-- Content for Dossier -->
        </main>
        <main id="document" class="main-content">
            <!-- Content for Document -->
        </main>
        <main id="prescription" class="main-content">
            <!-- Content for Prescription -->
        </main> 
        <main id="planDeSoins" class="main-content">
            <!-- Content for Plan de soins -->
        </main>
        <main class="home"></main>
    </div>
</div>
  
<div id="popupTaille"class="popupTaille">
    <div class="popupTaille-content">
        <nav class="nav-Taille">
            <div class="titre-taille">
                <h3>Taille</h3>
            </div>
            <a href="#" onclick="closePopupTaille()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form action="" class="form-taille">
                <div>
                    <label for="poids">Poids</label>
                    <input type="text" id="poids" name="poids"> kg
                </div>
                <div>
                    <label for="taille">Taille</label>
                    <input type="text" id="taille" name="taille"> cm
                </div>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>
        </main>
    </div>
</div>

<div id="popupOrientation" class="popupOrientation">
    <div class="popupOrientation-content">
        <nav class="nav-orientation">
            <div class="titre-orientation">
                <div class="logoOrientation">
                    <img src="/images/orientation.png" alt="LogoOrientation">
                </div>
                <h3>Orientation</h3>
            </div>
            <a href="#" onclick="closePopupOrientation()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <div class="nav-main">
            <nav class="nav-DetailOrientation">
                <a href="#" class="active1"><img src="/images/questionMarque.png" alt="Nondeter">Non déterminée</a>
                <a href="#" onclick="toggleActive1(this, 'sortie-hopital')"><img src="/images/Sortie.png" alt="sortie">Sortie hôpital</a>
                <a href="#" onclick="toggleActive1(this, 'uhcd')"><img src="/images/uhcd.png" alt="uhcd">UHCD</a>
                <a href="#" onclick="toggleActive1(this, 'transfert')"><img src="/images/transfert.png" alt="Nondeter">Transfert</a>
                <a href="#" onclick="toggleActive1(this, 'sortie-mutation')"><img src="/images/Sortie.png" alt="sortie">Sortie Mutation</a>
                <a href="#" onclick="toggleActive1(this, 'deces')"><img src="/images/deces.png" alt="Nondeter">Décès</a>
            </nav>
            <main class="mainOrientation">
                <!-- Formulaire pour "Sortie hôpital" -->
                <form class="form-sortie-hopital" id="form-sortie-hopital" style="display: none;" method="POST">
                    @csrf
                    <div class="div-sortie-hopital">
                        <label for="orientationsortie">Orientation (précision)</label>
                        <select id="orientationsortie" class="orientationsortie" name="orientationsortie" required>
                            <option value=""></option>
                            <option value="PSA">PSA: partie sans attendre prise en charge</option>
                            <option value="REO">REO: reorientation directe sans soin</option>
                            <option value="DOM">DOM: retour au domicile</option>
                            <option value="SCAM">SCAM: sortie contre avis médical</option>
                            <option value="FUG">FUG: sortie du service à l'insu du personnel soignant</option>
                            <option value="HAD">HAD: hospitalisation à domicile</option>
                            <option value="HMS">HMS: hospitalisation médico sociale</option>
                        </select>
                    </div>
                    <div class="div-sortie-hopital">
                        <label for="personne-prevenue">Personne prévenue</label>
                        <textarea id="personne-prevenue" class="personne-prevenue" name="personne-prevenue" required></textarea>
                    </div>
                    <div class="div-sortie-hopital-center">
                        <label for="certificat-refus">Certificat de refus de soins<br> et/ou d'hospitalisation signé</label>
                        <div>
                            <input type="radio" class="certificat-refus" id="oui" name="certificat-refus" value="oui">Oui
                            <input type="radio" class="certificat-refus" id="non" name="certificat-refus" value="non">Non
                        </div>
                    </div>
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </form>
                <!-- Formulaire pour "UHCD" -->
                <form class="form-uhcd" id="form-uhcd" style="display: none;" method="POST">
                    @csrf
                    <div class="G-groupe">
                        <label class="label-groupe">Groupe</label>
                        <div class="radio-group">
                            <div>
                                <input type="radio" class="group" id="group1" name="options_uhcd" value="G1">
                                <label class="group1" for="group1">
                                    <div class="container-10">
                                        <span class="g">G1 </span>
                                    </div>
                                    <div class="grouptxt"> Groupe 1</div>
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="group" id="group2" name="options_uhcd" value="G2">
                                <label for="group2">
                                    <div class="container-60">
                                        <span class="g">G2</span>
                                    </div>
                                    <div class="grouptxt">Groupe 2</div>
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="group" id="group3" name="options_uhcd" value="G3">
                                <label for="group3">
                                    <div class="container-19">
                                        <span class="g">G3</span>
                                    </div>
                                    <div class="grouptxt"> Groupe 3</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="list">
                        <div class="vide"></div>
                        <div class="groupe-list">
                            <ul>
                                <li>Groupe 1: retour domicile prévu sous 24H</li>
                                <li>Groupe 2: période d'observation</li>
                                <li>Groupe 3: patient hospitalisé dans l'attente de place</li>
                            </ul>
                        </div>
                    </div>
                    <div class="div-checkbox">
                        <label>Place trouvée</label>
                        <input type="checkbox" value="oui" name="place_trouvee">
                        <input type="hidden" value="non" name="place_trouvee">
                    </div>
                    <div class="G-date_mutation">
                        <label>Date et heure prévue de mutation</label>
                        <input type="datetime-local" id="date_heure_mutation" class="date_heure_mutation" name="date_heure_mutation" min="" placeholder="jj/mm/aaaa --:--">
                        <p id="messageErreur" style="color: red; display: none;">La date de mutation ne peut pas être ultérieure à aujourd'hui.</p>
                    </div>
                    <div class="G-mobilité">
                        <label>Mobilité</label>
                        <select name="mobilitéuhcd" class="mobilité">
                            <option value="" selected disabled></option>
                            <option value="pieds">à pieds</option>
                            <option value="chaise">en chaise</option>
                            <option value="brancard">sur brancard</option>
                        </select>
                    </div>
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit" id="boutonVerifier"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </form>
                <!-- Formulaire pour "Transfert" -->
                <form class="form-transfert" id="form-transfert" style="display: none;" method="POST">
                    @csrf
                    <div class="div-transfert">
                        <label for="destination">Destination</label>
                        <input type="text" id="destination" name="destination">
                    </div>
                    <div class="div-transfert">
                        <label for="etablissement-destination">Etablissement de destination</label>
                        <input type="text" id="etablissement-destination" name="etablissement-destination">
                    </div>
                    <div class="div-checkbox">
                        <label for="place_trouveeT">Place trouvée</label>
                        <input type="checkbox" id="place_trouveeT" name="place_trouveeT" value="oui">
                        <input type="hidden" id="place_trouveeT" name="place_trouveeT" value="non">
                    </div>
                    <div class="div-transfert">
                        <label for="dh-prevueT">Date et heure prévue de transfert</label>
                        <input type="datetime-local" id="dh-prevueT" name="dh-prevueT">
                    </div>
                    <div class="div-checkbox">
                        <label for="patienta">Patient accompagné</label>
                        <input type="checkbox" id="patienta" name="patienta" value="oui">
                        <input type="hidden" id="patienta" name="patienta" value="non">
                    </div>
                    <div class="div-transfert">
                        <label for="obc">Observations accompagnant</label>
                        <textarea id="obc" name="obc"></textarea>
                    </div>
                    <div class="div-transfert">
                        <label for="mobilite">Mobilité</label>
                        <select name="mobilitétransfert" class="mobilité">
                            <option value="" selected disabled></option>
                            <option value="pieds">à pieds</option>
                            <option value="chaise">en chaise</option>
                            <option value="brancard">sur brancard</option>
                        </select>
                    </div>
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </form>
                <!-- Formulaire pour "Sortie mutation" -->
                <form class="form-sortie-mutation" id="form-sortie-mutation" style="display: none;" method="POST">
                    @csrf
                    <div class="div-sortie-mutation">
                        <label for="specialite">Spécialité de la responsabilité médicale</label>
                        <input type="text" id="specialite" name="specialite">
                    </div>
                    <div class="div-sortie-mutation">
                        <label for="responsabilite-hebergement">Responsabilité d'hébergement</label>
                        <input type="text" id="responsabilite-hebergement" name="responsabilite-hebergement">
                    </div>
                    <div class="div-checkbox">
                        <label for="placetrouveeM">Place trouvée</label>
                        <input type="hidden" id="placetrouveeM" name="placetrouveeM" value="non">
                        <input type="checkbox" id="placetrouveeM" name="placetrouveeM" value="oui">
                    </div>
                    <div class="div-sortie-mutation">
                        <label for="dh-prevueT">Date et heure prévue de transfert</label>
                        <input type="datetime-local" id="dh-prevueT" name="dhprevueT">
                    </div>
                    <div class="div-sortie-mutation">
                        <label for="mobiliteM">Mobilité</label>
                        <select id="mobiliteM" name="mobiliteM">
                            <option value="" selected disabled></option>
                            <option value="pieds">à pieds</option>
                            <option value="chaise">en chaise</option>
                            <option value="brancard">sur brancard</option>
                        </select><br>
                    </div>
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </form>
                <!-- Formulaire pour "Décès" -->
                <form class="form-deces" id="form-deces" style="display: none;" method="POST">
                    @csrf
                    <div class="div-form-deces">
                        <label for="dh-deces">Date et heure de décès</label>
                        <input type="datetime-local" id="dh-deces" name="dh-deces">
                    </div>
                    <div class="div-form-deces">
                        <label for="certificat-deces">Certificat de décès signé par</label>
                        <input type="text" id="certificat-deces" name="certificat-deces">
                    </div>
                    <div class="div-checkbox">
                        <label for="transfert-corps">Transfert du corps</label>
                        <div>
                            <input type="radio" id="transfert-corpsD" value="Domicile" name="transfert-corps">Domicile
                            <input type="radio" id="transfert-corpsM" value="Morgue" name="transfert-corps">Morgue
                        </div>
                    </div>
                    <div class="div-checkbox">
                        <div class="vide"></div>
                        <div>
                            <input type="hidden" id="famille_prevenue" name="famille_prevenue" value="non">
                            <input type="checkbox" id="famille_prevenue" name="famille_prevenue" value="oui">Famille prévenue
                            <input type="hidden" id="famille_presente" name="famille_presente" value="non">
                            <input type="checkbox" id="famille_presente" name="famille_presente" value="oui">Famille présente
                        </div>
                    </div>
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>

<div id="popupConclusion" class="popupConclusion">
    <div class="popupConclusion-content">
        <nav class="nav-conclusion">
            <div class="titre-conclusion">
                <div class="logoConclusion">
                    <img src="/images/conclusion.png" alt="LogoConclusion">
                </div>
                <h3>Conclusion</h3>
            </div>
            <a href="#" onclick="closePopupConclusion()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <h4>Informations sur la conclusion</h4>
            <form method="post" class="form-conclusion">
                @csrf
                <div class="div-form-conclusion">
                    <label for="medecinC">Médecin</label>
                    @if(Auth::check() && Auth::user()->role == 'medecin')
                    <input type="datetime-local" name="medecinC" id="medecinC">par<input type="text" name="medecinCN" id="medecinCN" value="{{ Auth::user()->nom_prenom }}"> 
                    @endif
                </div>
                <div class="div-form-conclusion">
                    <label for="residentC">Résident</label>
                    <input type="datetime-local" name="residentC" id="residentC">par<input type="text" name="residentCN" id="residentCN" placeholder="Nom de l'interne...">
                </div>
                <div class="div-form-conclusion">
                    <label for="conclusionC">Conclusion</label>
                    <textarea name="conclusionC" id="conclusionC"></textarea>
                </div>
                <div class="div-form-conclusion">
                    <label for="gemsa">GEMSA</label>
                    <select name="gemsa" class="gemsa">
                        <option value="" selected disabled></option>
                        <option value="1">1- Patient sortant aprés consultation ou soins</option>
                        <option value="2">2- Patient convoqué pour des soins</option>
                        <option value="3">3- Patient hospitalisé aprés passage au SAU</option>
                        <option value="4">4- Patient nécessitant une prise en charge immédiate</option>
                        <option value="5">5- Patient décédé à l'arrivée</option>
                    </select>
                </div>
                <h4>Diagnostics</h4>
                <div id="diagnosticsContainer" class="diagnosticsContainer">
                    <div>
                        <label for="DP">DP</label>
                        <input type="text" name="DP" placeholder="Diagnostic primaire...">
                    </div>
                    <div>
                        <label for="DAS">DAS</label>
                        <input type="text" name="DAS" placeholder="Diagnostic secondaire...">
                    </div>
                </div>
                <button type="button" id="addDiagnosticButton" class="C-button"><img src="/images/plus.png">Ajouter un diagnostic</button>
                <h4>Actes</h4>
                <div id="ActesContainer" class="ActesContainer">
                    <label for="CAM">CAM</label>
                    <input type="text" name="CAM" id="CAM">
                </div>
                <button type="button" id="addActesButton" class="C-button"><img src="/images/plus.png">Ajouter un acte CAM</button>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>
        </main>
    </div>
</div>

<div id="popupAdmission" class="popupAdmission">
    <div class="popupAdmission-content">
        <nav class="nav-admission">
            <div class="titre-admission">
                <div class="logoAdmission">
                    <img src="/images/admission.png" alt="logoAdmission">
                </div>
                <h3>Admission</h3>
            </div>
            <a href="#" onclick="closePopupAdmission()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <nav class="nav-admidetail">
                <div>
                    <a href="#" class="admidetail" onclick="toggleActiveadmidetail(this)">Admission</a>
                </div>
                <div>
                    <a href="#" onclick="toggleActiveadmidetail(this)">Accompagnants</a>
                </div>
            </nav>
            <h4>Entrée</h4>
            <form id="admissionForm" class="form-admission" method="POST">
                @csrf
                <div class="div-admission">
                    <label for="entreele">Entrée le</label>
                    <input type="datetime-local" name="entree_le" id="entreele" value="{{ isset($admissionData['entree_le']) ? $admissionData['entree_le'] : '' }}">
                </div>
                <div class="div-checkbox">
                    <label for="brancard">Brancard</label>
                    <input type="checkbox" name="brancard" id="brancard" value="oui" value="{{ isset($admissionData['brancard']) ? $admissionData['brancard'] : '' }}">
                </div>
                <div class="div-checkbox">
                    <label for="accompagnants_en_salle_d_attente">Accompagnants en salle d'attente</label>
                    <input type="checkbox" name="accompagnants_en_salle_d_attente" id="accompagnants_en_salle_d_attente" value="oui" value="{{ isset($admissionData['accompagnants_en_salle_d_attente']) ? $admissionData['accompagnants_en_salle_d_attente'] : '' }}">
                </div>
                <div class="div-admission">
                    <label for="modeentree">Mode d'entrée</label>
                    <input type="text" name="mode_entree" id="modeentree" value="{{ isset($admissionData['mode_entree']) ? $admissionData['mode_entree'] : '' }}">
                </div>
                <div class="div-admission">
                    <label for="motifcs">Motif de consultation</label>
                    <input type="text" name="mode_consult" id="motifcs" value="{{ isset($admissionData['mode_consult']) ? $admissionData['mode_consult'] : '' }}">
                </div>
                <div class="div-admission">
                    <label for="modetransport">Mode de transport</label>
                    <select name="mode_transport" id="modetransport" value="{{ isset($admissionData['mode_transport']) ? $admissionData['mode_transport'] : '' }}">
                        <option value=""></option>
                        <option value="samu">SAMU</option>
                        <option value="ambulance privée">Ambulance privée</option>
                        <option value="vsl">VSL</option>
                        <option value="taxi">Taxi</option>
                        <option value="autres">Autres</option>
                    </select>
                </div>
                <div class="div-admission">
                    <label for="prisechargetransp">Prise en charge transport</label>
                    <input type="text" name="prise_en_charge_transport" id="prisechargetransp" value="{{ isset($admissionData['prise_en_charge_transport']) ? $admissionData['prise_en_charge_transport'] : '' }}">
                </div>
                <div class="div-admission">
                    <label for="motif_decrit_par_le_patient">Motif décrit par le patient</label>
                    <textarea name="motif_decrit_par_le_patient" id="motif_decrit_par_le_patient" value="{{ isset($admissionData['motif_decrit_par_le_patient']) ? $admissionData['motif_decrit_par_le_patient'] : '' }}"></textarea>
                </div>
                <div class="div-admission">
                    <label for="pmsi">Motif d'entrée PMSI</label>
                    <input type="text" name="motif_entree_pmsi" id="pmsi" value="{{ isset($admissionData['motif_entree_pmsi']) ? $admissionData['motif_entree_pmsi'] : '' }}">
                </div>
                <div class="G-button">
                    <button type="submit">Admettre</button>
                    <button type="reset" onclick="closePopupAdmission()">Annuler</button>
                </div>
            </form>
        </main>
    </div>
</div>

<div id="popupExamenMed" class="popupExamenMed">
    <div class="popupExamenMed-content">
        <nav class="nav-examenMed">
            <div class="titre-examenMed">
                <div class="logoExamenMed">
                    <img src="/images/medecin.png" alt="logoExamenMed">
                </div>
                <h3>Examen médical</h3>
            </div>
            <a href="#" onclick="closePopupExamenMed()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <nav class="nav-examenMedDet">
                <div>
                    <a href="#" class="activemeddet" onclick="toggleActivemeddet(this)">Examen Clinique</a>
                </div>
                <div>
                    <a href="#" onclick="toggleActivemeddet(this)">Suivi médical / Avis spécialiste / Résultat d'examen</a>
                </div>
            </nav>
            <form method="post" class="form-ExamenMed">
                @csrf
                <div class="div-ExamenMed">
                    <label for="medecinExam">Médecin</label>
                    @if(Auth::check() && Auth::user()->role == 'medecin')
                        <input type="datetime-local" name="medecin_exam" id="medecinExam"> par <input type="text" name="nom_medecin" id="nomMedecin" value="{{ Auth::user()->nom_prenom }}">
                    @endif
                </div>
                <div class="div-ExamenMed">
                    <label for="interneExam">Interne</label>
                    <input type="datetime-local" name="interne_exam" id="interneExam"> par <input type="text" name="nom_interne" id="nomInterne" placeholder="Nom de l'interne...">
                </div>
                <div class="div-ExamenMed">
                    <label for="motif_recours">Motif de recours</label>
                    <input type="text" name="motif_recours_medecin" id="motifrecours">
                </div>
                <div class="div-ExamenMed">
                    <label for="ccmu">Score de gravité (CCMU)</label>
                    <select id="ccmu" name="ccmu">
                        <option value="" selected disabled></option>
                        <option value="d">D - Patient décédé à l'entrée aux urgences sans avoir pu bénéficier de manoeuvres de réanimation</option>
                        <option value="p">P - Idem CCMU 1 avec problème dominant psychiatrique ou psychologique isolé ou associé à une pathologie somatique stable</option>
                        <option value="1">1 - Etat lésionnel ou pronostic fonctionnel jugé stable, avec abstention d'actes complémentaires ou de thérapeutique</option>
                        <option value="2">2 - Etat lésionnel ou pronostic fonctionnel jugé stable, réalisation d'actes complémentaires (hors diagnostiques)</option>
                        <option value="3">3 - Etat lésionnel ou pronostic fonctionnel jugé susceptible de s'aggraver aux urgences</option>
                        <option value="4">4 - Situation pathologique engageant le pronostic vital aux urgences sans manoeuvre de réanimation</option>
                        <option value="5">5 - Situation pathologique engageant le pronostic vital aux urgences avec manoeuvre de réanimation</option>
                    </select>
                </div>
                <h4>Examen Clinique</h4>
                <div class="div-ExamenClin">
                    <label for="historique_maladie">Historique de la maladie</label>
                    <textarea name="historique_maladie" id="historiquemaladie"></textarea>
                </div>
                <div class="div-ExamenClin">
                    <label for="examen_clinique">Examen Clinique</label>
                    <textarea name="examen_clinique" id="ExamenClinique"></textarea>
                </div>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>
        </main>
    </div>    
</div>

<div id="popupExamenParaMed" class="popupExamenParaMed">
    <div class="popupExamenParaMed-content">
        <nav class="nav-examenParaMed">
            <div class="titre-examenParaMed">
                <div class="logoExamenParaMed">
                    <img src="/images/infirmier.png" alt="logoExamenParaMed">
                </div>
                <h3>Examen paramédical</h3>
            </div>
            <a href="#" onclick="closePopupExamenParaMed()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <nav class="nav-examenParaMedDet">
                <div>
                    <a href="#" class="activeparameddet" onclick="toggleActiveadparamidetail(this)">IAO</a>
                </div>
                <div>
                    <a href="#" onclick="toggleActiveadparamidetail(this)">Commentaires</a>
                </div>
                <div>
                    <a href="#" onclick="toggleActiveadparamidetail(this)">Actes infirmier</a>
                </div>
            </nav>
            <h4>Formulaire IAO</h4>
            <form method="post" class="form-iao">
            @csrf
                <div class="form-iao-gauche">
                    <div class="div-form-iao">
                        <label for="iao">IAO</label>
                        @if(Auth::check())
                            <input type="datetime-local" name="iao_datetime" id="iao_datetime">par
                            <input type="text" name="iao_user" id="iao_user" value="{{ Auth::user()->nom_prenom }}">
                        @endif
                    </div>
                    <div class="div-form-iao">
                        <label for="brancardiao">Brancard</label>
                        <input type="hidden" name="brancardiao" id="brancardiao" value="non">
                        <input type="checkbox" name="brancardiao" id="brancardiao" value="oui">
                    </div>
                    <div class="div-form-iao">
                        <label for="filiere">Filière</label>
                        <input type="text" name="filiere" id="filiere">
                    </div>
                    <div class="div-form-iao">
                        <label for="circonstance">Circonstance</label>
                        <input type="text" name="circonstance" id="circonstance">
                    </div>
                    <div class="div-form-iao">
                        <label for="motif_recours_iao">Motif de recours</label>
                        <input type="text" name="motif_recours_iao" id="motifrecoursiao">
                    </div>
                    <div class="div-form-iao">
                        <label for="motifacceuil">Motif d'acceuil</label>
                        <textarea name="motif_acceuil_iao" id="motifacceuil"></textarea>
                    </div>
                    <div class="div-form-iao">
                        <label for="prisechargeiao">Prise en charge</label>
                        <input type="text" name="prise_en_charge_iao" id="prisechargeiao">
                    </div>
                    <div class="div-form-iao-checkbox">
                        <label for="vat">VAT du jour</label>
                        <div>
                            <input type="radio" name="vat_du_jour" id="vat_oui" value="oui">Oui
                        </div>
                        <div>
                            <input type="radio" name="vat_du_jour" id="vat_non" value="non">Non
                        </div>
                        <div>
                            <input type="radio" name="vat_du_jour" id="vat_nesaitpas" value="nesaitpas">Ne sait pas
                        </div>
                    </div>
                </div>
                <div class="form-iao-droit">
                    <div class="label-carré">
                        <p class="label-groupe">Etat:</p>
                            <div id="carré"></div>
                    </div>
                    <div class="radio-group">
                        <div>
                            <input type="radio" class="group" id="1" value="#ff0000" name="options" onclick="afficherCarré(this)">
                            <label class="group1" for="1">
                                <div class="container-1">
                                    <span class="g1">1 </span>
                                </div>
                            </label>
                        </div>
                        <div>
                            <input type="radio" class="group" id="2" value="#ff9900" name="options" onclick="afficherCarré(this)">
                            <label for="2">
                                <div class="container-2">
                                <span class="g2">2</span>
                                </div>
                            </label>
                        </div>
                    <div>
                    <input type="radio" class="group" id="3" value="#fffb00" name="options" onclick="afficherCarré(this)">
                    <label for="3">
                        <div class="container-3">
                            <span class="g3">3</span>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" class="group" id="4" value="#6b6b6b" name="options" onclick="afficherCarré(this)">
                    <label for="4">
                        <div class="container-4">
                            <span class="g4">4</span>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" class="group" id="5" value="#283dfa" name="options" onclick="afficherCarré(this)">
                    <label class="group5" for="5">
                        <div class="container-5">
                            <span class="g5">5</span>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" value="#da8df8" class="group" id="6" name="options" onclick="afficherCarré(this)">
                    <label class="group6" for="6">
                        <div class="container-6">
                            <span class="g6">6</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <h4>Constantes à l'entrée</h4>
        <button type="reset" class="C-button1"><img src="/images/poubelle.png" alt="poubelle">Annuler le protocole à l'entrée saisi</button>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="sair">Saturation sous air ambiant</label>
                <input type="text" name="sair" id="sair"><p class="unité-mesure">%</p>
                <input type="text" name="commentaireair" id="commentaireair" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Saturation en O2</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
            <div class="div-constantes-content">
                <label for="so2">Saturation sous O2</label>
                <input type="text" name="so2" id="so2"><p class="unité-mesure">%</p>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="tas">TA Systolique</label>
                <input type="text" name="tas" id="tas"><p class="unité-mesure">cm Hg</p>
                <input type="text" name="commentaireta" id="commentaireta" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>TA</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
                <div></div>
            </div>
            <div class="div-constantes-content">
                <label for="tad">TA Diastolique</label>
                <input type="text" name="tad" id="tad"><p class="unité-mesure">cm Hg</p>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="glycemie">Glycémie capillaire</label>
                <input type="text" name="glycemie" id="glycemie"><p class="unité-mesure">g/L</p>
                <input type="text" name="commentairegly" id="commentairegly" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Glycémie capillaire</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="pouls">Pouls</label>
                <input type="text" name="pouls" id="pouls"><p class="unité-mesure">pouls/ min</p>
                <input type="text" name="commentairepouls" id="commentairepouls" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Pouls</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="deg">T°C</label>
                <input type="text" name="deg" id="deg"><p class="unité-mesure">°C</p>
                <input type="text" name="commentairedeg" id="commentairedeg" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>T°C</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="echelle">Echelle utilisé</label>
                <input type="text" name="echelle" id="echelle"><p class="unité-mesure"></p>
                <input type="text" name="commentaireechelle" id="commentaireechelle" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Evaluation de la douleur (v2)</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
        </div>
        <div class="div-constantes-container">
            <div class="div-constantes-content">
                <label for="fr">FR</label>
                <input type="text" name="fr" id="fr"><p class="unité-mesure">/ min</p>
                <input type="text" name="commentairefr" id="commentairefr" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>FR</p></div>
            </div>
            <div class="div-constantes-content-button">
                <div></div>
                <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button>
            </div>
        </div>
        <div class="G-button">
            <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
            <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
        </div>
    </form>
    </main>
    </div>    
</div>

<div id="popupPersonneConfidente" class="popupPersonneConfidente">
    <div class="popupPersonneConfidente-content">
        <nav class="nav-personneconfidente">
            <div class="titre-personneconfidente">
                <div class="logoPersonneConfidente">
                    <img src="/images/personneconfidente.png" alt="logoPersonneConfidente">
                </div>
                <h3>Personne Confidente</h3>
            </div>
            <a href="#" onclick="closePopupPersonneConfidente()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form method="POST" class="form-personneConfidente">
                @csrf
                <div class="div-personneConfidente-souhait">
                    <div><input type="radio" value="souhaite" name="souhaite" id="souhaite"><p>Souhaite désigner comme personne de confiance</p></div>
                    <div><input type="radio" value="souhaite_pas" name="souhaite" id="souhaitepas"><p>Ne souhaite pas désigner de personne de confiance</p></div>
                </div>
                <div class="div-personneConfidente-sex">
                    <div><input type="radio" value="madame" name="genre" id="M">Madame</div>
                    <div><input type="radio" value="monsieur" name="genre" id="M">Monsieur</div>
                </div>
                <div class="div-personneConfidente">
                    <label for="nomPC">Nom</label>
                    <input type="text" name="nomPC" id="nomPC">
                </div>
                <div class="div-personneConfidente">
                    <label for="prenomPC">Prénom</label>
                    <input type="text" name="prenomPC" id="prenomPC">
                </div>
                <div class="div-personneConfidente-cestqui">
                    <label for="relation">CETTE PERSONNE EST :</label>
                    <div><input type="radio" value="famille" name="relation" id="relation">UN MEMBRE DE LA FAMILLE </div>
                    <div><input type="radio" value="proche" name="relation" id="relation">UN PROCHE  </div>
                    <div><input type="radio" value="medecintraitant" name="relation" id="relation">MON MÉDECIN TRAITANT </div>
                    <div><input type="radio" value="autres" name="relation" id="relation">Autres <input type="text" name="autres_relation" id="autres_relation" class="div-personneConfidente-cestqui-inputAutres" disabled></div>
                </div>
                <div class="div-personneConfidente">
                    <label for="adressePC">Adresse</label>
                    <input type="text" name="adressePC" id="adressePC">
                </div>
                <div class="div-personneConfidente">
                    <label for="telephonePC">Téléphone</label>
                    <input type="tel" name="telephonePC" id="telephonePC">
                </div>
                <div class="div-personneConfidente">
                    <label for="emailPC">Email</label>
                    <input type="email" name="emailPC" id="emailPC">
                </div>
                <div class="div-personneConfidente-exemplaires-directives">
                    <p> Je lui ai fait part de mes directives anticipées ou de mes volontés si je ne suis plus en état de m’exprimer</p>
                    <div><input type="radio" value="Oui" name="directives" id="directives">Oui</div>
                    <div><input type="radio" value="Non" name="directives" id="directives">Non</div>
                </div>
                <div class="div-personneConfidente-exemplaires-directives">
                    <p>  Elle possède un exemplaire de mes directives anticipées</p> 
                    <div><input type="radio" value="oui" name="exemplaires-directives" id="exemplaires-directives">Oui</div>
                    <div><input type="radio" value="non" name="exemplaires-directives" id="exemplaires-directives">Non</div>
                </div>
                <div class="div-personneConfidente-signature">
                    <div class="div-personneConfidente-signature1">
                        <h4>PERSONNE HOSPITALISÉE</h4>
                        <div><label for="">FAIT LE</label><input type="date" name="datehospitalise" id="datehospitalisation"></div>
                        <div><label for="">A</label><input type="text" name="lieuhospitalise" id="lieuhospitalise"></div>
                        <div><p>SIGNATURE</p><div></div></div>
                    </div>
                    <div class="div-personneConfidente-signature1">
                        <h4>PERSONNE DE CONFIANCE</h4>
                        <div><label for="">FAIT LE</label><input type="date" name="dateconfiance" id="dateconfiance"></div>
                        <div><label for="">A</label><input type="text" name="lieuconfiance" id="lieuconfiance"></div>
                        <div><p>SIGNATURE</p><div></div></div>
                    </div>
                </div>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    <button><img src="/images/imprimer.png" alt="print">Imprimer</button>
                </div>
            </form>
        </main>
    </div>    
</div>

<div id="popupAllergies" class="popupAllergies">
    <div class="popupAllergies-content">
        <nav class="nav-allergies">
            <div class="titre-allergies">
                <div class="logoAllergies">
                    <img src="/images/allergie.png" alt="logoAllergies">
                </div>
                <h3>Allergies</h3>
            </div>
            <a href="#" onclick="closePopupAllergies()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form method="POST" id="mainForm" class="form-allergie">
                @csrf
                <div class="allergie">
                    <div class="aucAllergie-date">
                        <div class="aucAllergie">
                            <input type="hidden" name="aucuneall" value="non"><!-- Hidden input for default value -->
                            <input type="checkbox" name="aucuneall" id="aucuneall" value="oui" checked>Aucune allergie déclarée.
                        </div>
                        <input type="date" name="dateall" id="dateall">
                    </div>
                    <button type="button" onclick="toggleForm('medForm')" class="btn-allerg"><img src="/images/allmed.png" alt="allmed">Allergie médicaments</button>
                    <button type="button" onclick="toggleForm('otherForm')" class="btn-allerg"><img src="/images/autresall.png" alt="autresall">Autres allergies</button>
                    <div id="medForm" class="form-toggle" style="display: none;">
                        <textarea name="medForm" id="medForme"></textarea>
                    </div>
                    <div id="otherForm" class="form-toggle" style="display: none;">
                        <textarea name="otherForm" id="otherForme"></textarea>
                    </div>                      
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                    </div>
                </div>
            </form>
        </main>
    </div>    
</div>

<div id="popupAntecedents" class="popupAntecedents">
    <div class="popupAntecedents-content">
        <nav class="nav-antecedents">
            <div class="titre-antecedents">
                <div class="logoAntecedents">
                    <img src="/images/antecedent.png" alt="logoAntecedents">
                </div>
                <h3>Antécedents</h3>
            </div>
            <a href="#" onclick="closePopupAntecedents()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form method="post" id="mainFormc" class="form-antecedent">
                @csrf
                <div class="antecedent">
                    <div class="aucAntecedent-date">
                        <div class="aucAntecedent">
                            <input type="hidden" name="aucuneante" id="aucuneante" value="non">
                            <input type="checkbox" name="aucuneante" class="aucuneante" value="oui" checked>Aucun antécédents déclarés.
                        </div>
                        <input type="date" name="dateantc" id="dateantc">
                    </div>
                    <button type="button" onclick="openForm('amedForma')" class="btn-allerg">Antécédents médicaux</button>
                    <button type="button" onclick="openForm('achirForma')" class="btn-allerg">Antécédents chirurgicaux</button>
                    <button type="button" onclick="openForm('afamForma')" class="btn-allerg">Antécédents familiaux</button>
                    <button type="button" onclick="openForm('autresForma')" class="btn-allerg">Autres antécédents</button>
                </div>
                <div id="formContainer">
                    <div id="amedForma" class="form-togglee" style="display: none;">
                        <textarea name="amedForma" id="amedFormaa"></textarea>
                    </div>
                    <div id="achirForma" class="form-togglee" style="display: none;">
                        <textarea name="achirForma" id="achirFormaa"></textarea>
                    </div> 
                    <div id="afamForma" class="form-togglee" style="display: none;">
                        <textarea name="afamForma" id="afamFormaa"></textarea>
                    </div>
                    <div id="autresForma" class="form-togglee" style="display: none;">
                        <textarea name="autresForma" id="autresFormaa"></textarea>
                    </div>         
                    <div class="G-button">
                        <button type="reset"><img src="/images/restart.png" alt="réinitialiser">Réinitialiser</button>
                        <button type="submit"><img src="/images/saveclose.png" alt="enregistrer">Enregistrer et fermer</button>
                    </div>
                </div>
            </form>
        </main>
    </div>    
</div>

<div id="popupMedecins" class="popupMedecins">
    <div class="popupMedecins-content">
        <nav class="nav-medecins">
            <div class="titre-medecins">
                <div class="logoMedecins">
                    <img src="/images/medecin.png" alt="logoMedecins">
                </div>
                <h3>Médecins</h3>
            </div>
            <a href="#" onclick="closePopupMedecins()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form action="" method="post" class="form-médecin">
                @csrf
                <h4>Traitant</h4>
                <div>
                    <label for="medtrait">Nom</label>
                    @if(Auth::check() && Auth::user()->role == 'medecin')
                        <input type="text" name="nom_prenom" value="{{ Auth::user()->nom_prenom }}">
                    @endif
                </div>
                <h4>Responsables</h4>
                <div>
                    <label for="nommedresp">Nom</label>
                    <input type="text" name="nommedresp" id="nommedresp">
                </div>
                <div>
                    <label for="prenommedresp">Prénom</label>
                    <input type="text" name="prenommedresp" id="prenommedresp">
                </div>
                <div>
                    <label for="addmedresp">Adresse</label>
                    <input type="text" name="addmedresp" id="addmedresp">
                </div>
                <div>
                    <label for="telmedresp">Téléphone</label>
                    <input type="tel" name="telmedresp" id="telmedresp">
                </div>
                <div>
                    <label for="emailmedresp">email</label>
                    <input type="email" name="emailmedresp" id="emailmedresp">
                </div>
                <h4>Adresseurs</h4>
                <div>
                    <label for="nommedadd">Nom</label>
                    <input type="text" name="nommedadd" id="nommedadd">
                </div>
                <div>
                    <label for="prenommedadd">Prénom</label>
                    <input type="text" name="prenommedadd" id="prenommedadd">
                </div>
                <div>
                    <label for="addmedadd">Adresse</label>
                    <input type="text" name="addmedadd" id="addmedadd">
                </div>
                <div>
                    <label for="telmedadd">Téléphone</label>
                    <input type="tel" name="telmedadd" id="telmedadd">
                </div>
                <div>
                    <label for="emailmedadd">email</label>
                    <input type="email" name="emailmedadd" id="emailmedadd">
                </div>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>       
        </main>
    </div>    
</div>

<div id="popupObservations" class="popupObservations">
    <div class="popupObservations-content">
        <nav class="nav-observations">
            <div class="titre-observations">
                <div class="logoObservations">
                    <img src="/images/observations.png" alt="logoObservations">
                </div>
                <h3>Observations</h3>
            </div>
            <a href="#" onclick="closePopupObservations()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form method="POST" class="form-observation">
                @csrf
                <label for="commurg">Commentaires</label>
                <textarea name="commurg" id="commurg"></textarea>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>       
        </main>
    </div>    
</div>

<div id="popupVaccins" class="popupVaccins">
    <div class="popupVaccins-content">
        <nav class="nav-vaccins">
            <div class="titre-vaccins">
                <div class="logoVaccins">
                    <img src="/images/vaccins.png" alt="logoVaccins">
                </div>
                <h3>Vaccins</h3>
            </div>
            <a href="#" onclick="closePopupVaccins()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
            <form method="POST" class="form-vaccins">
                @csrf
                <label for="vaccins">Vaccins</label>
                <textarea name="vaccins" id="vaccins"></textarea>
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>          
        </main>
    </div>    
</div>

<div id="popupConstantes" class="popupConstantes">
    <div class="popupConstantes-content">
        <nav class="nav-constantes">
            <div class="titre-constantes">
                <div class="logoConstantes">
                    <img src="/images/ecg.png" alt="logoConstantes">
                </div>
                <h3>Constantes</h3>
            </div>
            <a href="#" onclick="closePopupConstantes()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
          
            <h4>Constantes à l'entrée</h4>
            <form method="post" class="form-constantes">
                @csrf
                <button type="reset" class="C-button1"><img src="/images/poubelle.png" alt="poubelle">Annuler le protocole à l'entrée saisi</button>
            <div class="div-constantes-container"> 
            <div class="div-constantes-content">
                <label for="sair">Saturation sous air ambiant</label>
                <input type="text" name="sair" id="sair"><p class="unité-mesure">%</p>
             
                <input type="text" name="commentaireair" id="commentaireair" placeholder="Aucun commentaire saisi">
            
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Saturation en O2</p></div>
            </div>
            <div class="div-constantes-content-button"> <div></div>  <button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>
            <div class="div-constantes-content">
                <label for="so2">Saturation sous O2</label>
                <input type="text" name="so2" id="so2"><p class="unité-mesure">%</p>
            </div>
                </div>
                <div class="div-constantes-container">
                    <div class="div-constantes-content">
                        <label for="tas">TA Systolique</label>
                        <input type="text" name="tas" id="tas"><p class="unité-mesure">cm Hg</p>
                        <input type="text" name="commentaireta" id="commentaireta" placeholder="Aucun commentaire saisi">
                        <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>TA</p></div>
                    </div>
                    <div class="div-constantes-content-button"> <div></div><button  class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button><div></div></div>

                    <div class="div-constantes-content">
                        <label for="tad">TA Diastolique</label>
                        <input type="text" name="tad" id="tad"><p class="unité-mesure">cm Hg</p>
                    </div>
                </div>
                <div class="div-constantes-container">
                    <div class="div-constantes-content">
                <label for="glycemie">Glycémie capillaire</label>
                <input type="text" name="glycemie" id="glycemie"><p class="unité-mesure">g/L</p>
                <input type="text" name="commentairegly" id="commentairegly" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Glycémie capillaire</p></div>
            </div>
            <div class="div-constantes-content-button"> <div></div><button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>
                </div>
            <div class="div-constantes-container">
                <div class="div-constantes-content">
                <label for="pouls">Pouls</label>
                <input type="text" name="pouls" id="pouls" ><p class="unité-mesure">pouls/ min</p>
                <input type="text" name="commentairepouls" id="commentairepouls" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Pouls</p></div>

            </div>
           
            <div class="div-constantes-content-button"> <div></div><button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>
        </div>
            <div class="div-constantes-container">
                <div class="div-constantes-content">
                <label for="deg">T°C</label>
                <input type="text" name="deg" id="deg"><p class="unité-mesure">°C</p>
                <input type="text" name="commentairedeg" id="commentairedeg" placeholder="Aucun commentaire saisi" oninput="checkInput()">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>T°C</p></div>
            </div>
            <div class="div-constantes-content-button"> <div></div><button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>
        </div>

            <div class="div-constantes-container">
                <div class="div-constantes-content">
                <label for="echelle">Echelle utilisé</label>
                <input type="text" name="echelle" id="echelle"><p class="unité-mesure"></p>
                <input type="text" name="commentaireechelle" id="commentaireechelle" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>Evaluation de la douleur (v2)</p></div>
            </div>
                            <div class="div-constantes-content-button"> <div></div><button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>
                        </div>
            <div class="div-constantes-container">
                <div class="div-constantes-content">
                <label for="fr">FR</label>
                <input type="text" name="fr" id="fr"><p class="unité-mesure">/ min</p>
                <input type="text" name="commentairefr" id="commentairefr" placeholder="Aucun commentaire saisi">
                <div class="icon-titre"><img src="/images/lit.png" alt="lit"><p>FR</p></div>
            </div>
                <div class="div-constantes-content-button"> <div></div><button class="const-button"><img src="/images/modifier.png" alt="modifier">Modifier</button></div>

            </div>

                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>   
        </main>
    </div>    
</div>

<div id="popupPrescription" class="popupPrescription">
    <div class="popupPrescription-content">
        <nav class="navPrescription">
            <div class="titre-prescription">
                <div class="logoPrescription">
                    <img src="images/prescription.png" alt="logoVaccins">
                </div>
                <h3>Prescription</h3>
            </div>
            <a href="#" onclick="closePopupPrescription()"><img src="images/x.png" alt="x"></a>
        </nav>
        <main>
            <div class="lien-prescription">
                <a href="#"onclick="toggleActive2(this, 'medicament')"class="active2">Médicament </a>
                <a href="#"onclick="toggleActive2(this, 'RxImagerie')">RX-imagerie</a>
                <a href="#"onclick="toggleActive2(this, 'biologie')">Biologie</a>
                <a href="#"onclick="toggleActive2(this, 'surveillence')">Surveillence</a>
                <a href="#"onclick="toggleActive2(this, 'autres')">Autres</a>
            </div>
            <form action="" class="form-medicament"id="form-medicament">
                <div class="div-medicamentM"><label for="medecinP">Médecin</label><input type="datetime-local" name="medecinP" id="medecinP">par<input type="text" name="medecinPN" id="medecinPN"></div>
                <div class="div-medicament"><label for="nomMedic">Nom du médicament</label><input type="text"name="nomMedic" id="nomMedic"placeholder="Nom du médicament" required></div>
                <div class="div-medicament"><label for="doseMedic">Dosage du médicament</label><input type="text" name="doseMedic" id="doseMedic"placeholder="500ml,mg ......" required></div>
                <div class="div-medicament"><label for="voieAdmini">Voie d'administration</label><input type="text"name="voieAdmini" id="voieAdmini" placeholder="Voie orale, injection,autres" ></div>
                <div class="div-medicament"><label for="frecDose">Fréquence de dosage </label><input type="text"name="frecDose" id="frecDose" placeholder="Une fois par jour ,deux fois" required></div>
                <div class="div-medicament"><label for="instrucSpecMedic">Instructions spéciales</label><input type="text"name="instrucSpecMedic" id="instrucSpecMedic" placeholder="Avant ,apres la nourriture"></div>
                <div class="div-medicament"><label for="dureTrait">Durée du traitement</label><input type="text"name="dureTrait" id="dureTrait"></div>
                <button class="presc-boutton" type="submit"><img src="images/icons8-add-50.png" alt="">Ajouter médicament</button>
                <div class="affichage" id="affichage"></div>
                <div class="G-button">
                    <button type="reset"><img src="images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>  
            </form>
            <form action=""class="form-RxImagerie"id="form-RxImagerie"style="display: none;">
                <div class="div-RxImagerieM"><label for="medecinP">Médecin</label><input type="datetime-local" name="medecinP" id="medecinP">par<input type="text" name="medecinPN" id="medecinPN"></div>
                <div class="div-RxImagerie"><label for="typeImgr">Type d'imagerie</label><input type="text"name="typeImgr" id="typeImgr" placeholder="type"></div>
                <div class="div-RxImagerie"><label for="regImgr">Région à imager</label><input type="text"name="regImgr" id="regImgr"></div>
                <div class="div-RxImagerie"><label for="indicCliImgr">Indication clinique</label><input type="text"name="indicCliImgr" id="indicCliImgr" placeholder="Motif..."></div>
                <div class="div-RxImagerie"><label for="dateImgr">Date</label><input type="date"name="dateImgr" id="dateImgr"></div>
                <div class="div-RxImagerie"><label for="instrucSpecImgr">Instructions spéciales</label><input type="text"name="instrucSpecImgr" id="instrucSpecImgr" ></div>
                <button class="presc-boutton" type="submit"><img src="images/icons8-add-50.png" alt="">Ajouter Imagerie</button>
                <div class="affichage" id="affichageImgr"></div>
                <div class="G-button">
                    <button type="reset"><img src="images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>   
            </form>
            <form action="" class="form-biologie"id="form-biologie"style="display: none;">
                <div class="div-biologieM"><label for="medecinP">Médecin</label><input type="datetime-local" name="medecinP" id="medecinP">par<input type="text" name="medecinPN" id="medecinPN"></div>
                <div class="div-biologie"><label for="typeAnal">Type d'analyse</label><input type="text"name="typeAnal" id="typeAnal"placeholder="Sanguine,urinaire ,génetique..."></div>
                <div class="div-biologie"><label for="testSpeci">test spécifique</label><input type="text"name="testSpeci" id="testSpeci"required></div>
                <div class="div-biologie"><label for="indicCliBio">Indication clinique</label><input type="text"name="indicCliBio" id="indicCliBio" placeholder="Motif"></div>
                <div class="div-biologie"><label for="dateBiol">Date</label><input type="date"id="dateBiol"name="dateBiol"></div>
                <div class="div-biologie"><label for="instrucSpecBiol">Instructions spéciales</label><input type="text" id="instrucSpecBiol" name="instrucSpecBiol" placeholder="A jeun"></div>
                <button class="presc-boutton"><img src="images/icons8-add-50.png" alt="">Ajouter biologie</button>
                <div class="affichage" id="affichageBiol"></div>
                <div class="G-button">
                    <button type="reset"><img src="images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div> 
            </form>
            <form action=""class="form-surveillance"id="form-surveillence"style="display: none;">
                <div class="div-surveillanceM"><label for="medecinP">Médecin</label><input type="datetime-local" name="medecinP" id="medecinP">par<input type="text" name="medecinPN" id="medecinPN"></div>
                <div class="div-surveillance"><label for="typeSurveil">Type de surveillance</label><input type="text"name="typeSurveil" id="typeSurveil">
                <button class="presc-boutton" type="submit"><img src="images/icons8-add-50.png" alt="">Ajouter Surveillence</button> </div>
                <div class="div-surveillance"><label for="dateSurveil">Date</label><input type="date"name="dateSurveil" id="dateSurveil"></div>
                <div class="div-surveillance"><label for="instrucSpecSurviel">Instructions spéciales</label><input type="text"name="instrucSpecSurviel" id="instrucSpecSurviel"></div>
                <div class="affichage" id="affichageSurv"></div>
                <div class="G-button">
                    <button type="reset"><img src="images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>
            <form action="" class="form-autres" style="display: none;" id="form-autres" >
                <label for="prescAutres">Autres</label>
                <textarea name="prescAutres" id="prescAutres"></textarea>
                <div class="G-button">
                    <button type="reset"><img src="images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>
            </form>
        </main>
    </div>    
</div>

<div id="popupFicheUhcd" class="popupFiches">
    <div class="popupFiches-content">
        <nav class="nav-fiches">
            <div class="titre-Fiches">
                <div class="logoFiches">
                    <img src="/images/fiches.png" alt="logoFiches">
                </div>
                <h3>Fiches</h3>
            </div>
            <a href="#" onclick="closePopupFicheUhcd()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <nav class="sous-nav-fiches">
            <div class="titre-Fiches">
                <h3>Fiche Uhcd</h3>
            </div>
        </nav>
        <main>
            <form action="" class="form-fiches">
              <div class="div-fiche">
         <label for="dateFiche">Fait le:</label>
         <input type="date" name="dateFiche" id="">
              </div>
              <div class="div-fiche">
                <label for="dateFiche">certitude Diagnostique:</label>
               <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                 <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                </div>
                     </div>
                     <div class="div-fiche">
                        <label for="dateFiche">présence d'un accompagnant:</label>
                        <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                             <input type="radio" name="dateFiche" id=""><p>non</p>
                             <span>0</span>
                        </div>
                    </div>
                             <div class="div-fiche">
                                <label for="dateFiche">Domicile<1:</label>
                                <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                                     <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                                </div>
                            </div>
                                     <div class="div-fiche">
                                        <label for="dateFiche">niveau de compréhension suffisant:</label>
                                        <div> 
                                            <input type="radio" name="dateFiche" id=""><p>oui</p> 
                                            <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                                        </div>
                                    </div>
                                             <div class="div-fiche">
                                               <p>Total:<span>0</span></p>
                                            </div>
                                            <div>
                                                <p>Interpretation score</p>
                                                <p>Si score < 4 alors critres UCA NON REUNIS</p>
                                                <p>Si score > 4 alors critres  REUNIS</p>
                                            </div>
            </form>
            <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
            </div>       
        </main>
    </div>    
</div>

<div id="popupFicheUca" class="popupFiches">
    <div class="popupFiches-content">
        <nav class="nav-fiches">
            <div class="titre-Fiches">
                <div class="logoFiches">
                    <img src="/images/fiches.png" alt="logoFiches">
                </div>
                <h3>Fiches</h3>
            </div>
            <a href="#" onclick="closePopupFicheUca()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <nav class="sous-nav-fiches">
            <div class="titre-Fiches">
                <h3>Fiche UCA</h3>
            </div>
        </nav>
        <main>
            <form action="" class="form-fiches">
                <div class="div-fiche">
           <label for="dateFiche">Fait le:</label>
           <input type="date" name="dateFiche" id="">
                </div>
                <div class="div-fiche">
                  <label for="dateFiche">certitude Diagnostique:</label>
                 <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                   <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                  </div>
                       </div>
                       <div class="div-fiche">
                          <label for="dateFiche">présence d'un accompagnant:</label>
                          <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                               <input type="radio" name="dateFiche" id=""><p>non</p>
                               <span>0</span>
                          </div>
                      </div>
                               <div class="div-fiche">
                                  <label for="dateFiche">Domicile<1:</label>
                                  <div> <input type="radio" name="dateFiche" id=""><p>oui</p>
                                       <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                                  </div>
                              </div>
                                       <div class="div-fiche">
                                          <label for="dateFiche">niveau de compréhension suffisant:</label>
                                          <div> 
                                              <input type="radio" name="dateFiche" id=""><p>oui</p> 
                                              <input type="radio" name="dateFiche" id=""><p>non</p><span>0</span>
                                          </div>
                                      </div>
                                               <div class="div-fiche">
                                                 <p>Total:<span>0</span></p>
                                              </div>
                                              <div>
                                                  <p>Interpretation score</p>
                                                  <p>Si score < 4 alors critres UCA NON REUNIS</p>
                                                  <p>Si score > 4 alors critres  REUNIS</p>
                                              </div>
              </form>
            <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
            </div>       
        </main>
    </div>    
</div>

<div id="popupDocuments" class="popupDocuments">
    <div class="popupDocuments-content">
        <nav class="nav-documents">
            <div class="titre-documents">
                <div class="logoDocuments">
                    <img src="/images/fiches.png" alt="logoDocuments">
                </div>
                <h3>Documents</h3>
            </div>
            <a href="#" onclick="closePopupDocuments()"><img src="/images/x.png" alt="x"></a>
        </nav>
        <main>
          
            <form action="" class="form-documents">
              <div class="div-document">
                <label for="">télecharger le document</label>
                <input type="text" id="cheminFichier" readonly>

                <button type="submit" class="document-button"onclick="selectionnerEtAfficherDoc()"><img src="/images/icons8-download-24.png" alt="">Télecharger</button>
              </div>
           
          
            </form>
            
                <div class="G-button">
                    <button type="reset"><img src="/images/restart.png" alt="reinitialiser">Réinitialiser</button>
                    <button type="submit"><img src="/images/saveclose.png" alt="saveclose">Enregistrer et fermer</button>
                </div>       
        </main>
    </div>    
</div>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="/js/dossier.js"></script>
</body>
</html>