<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salles</title>
    <link rel="stylesheet" href="css/salles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/salles.png" id="favicon">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <!--<script src="script.js"></script>-->
</head>
<body>
    <!--j'ai ajouté 1 container principal et un autre droit pour la position des 2 cotés le nav qui est a gauche et le nav +main -->
<div class="container">
    <nav class="nav-gauche">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            </div>
        <div class="home">
            <a href="./home/index.html"><img src="images/home.png" alt="Home"></a>
        </div>
        <div class="salles">
            <a href="index.html"><img src="images/salles.png" alt="Salle"></a>
        </div>
    </nav> 
    <div class="cote-droit">
    
            <nav class="nav-haut">
                <div class="service">
                    <span class="urgences">Urgences</span>
                    <div class="x"><a href="./home/index.html"><img src="images/cancel.png" alt="x"></a></div>
                </div>
                <div class="refresh">
                    <a href="./index.html"><img src="images/refresh.png" alt="Refresh"></a>
                </div>
                <select id="select-service" class="select-service"> 
                    @isset($options)
                        @foreach($options as $option)
                            <option value="{{ $option->numero }}">{{ $option->numero }}- {{$option->nom_unite}}</option>
                        @endforeach
                    @else
                        <option value="">No options available</option>
                    @endisset
                </select>
                <div class="clock">
                        <div id="day" class="column"></div>
                        <div class="column1">
                          <span id="dayAbbr"></span>
                          <span id="month"></span>
                        </div>
                        <div class="linehor"></div>
                        <div id="systemTime" class="heure"></div>
                    </div>

                <div class="param">
                    <div class="traduction">
                        <a href="salles/indexEn.html"><img src="images/translationW.png" alt="traduction"></a>
                    </div>
                    <div class="decoP">
                        <a href="{{ route('logoutP') }}?restore_session=true"><img src="images/shuffle.png" alt="deconnexionP"></a>
                    </div>
                    <div class="deco">
                        <a href="{{ route('logout') }}"><img src="images/deconnexion.png" alt="deconnexion"></a>
                    </div>
                </div>
                <div class="compte">
                    <span class="nom-prenom">
                        {{ session('nom_prenom') }}
                    </span>
                    <span class="fonction">
                        {{ session('role') }}
                    </span>
                </div>
            </nav> 
        <div class="nav-main">
            <nav class="nav-general">
                <div class="sortie-container">
                    <button class="sortie"><a href="listeps/index.html">Sorties</a></button>
                    <div class="circle"></div>
                </div>
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Rechercher...">
                    <span id="clearInput" class="clear-icon">&#10006;</span>
                </div>
                <div class="ajout-container">
                    <button class="ajout"><a href="#" onclick="openPopupOrientation()">Ajouter Patient</a></button>
                </div>
                <div class="menu-container">
                    <ul>
                        <li><a href="#">URG+UHCD</a></li>
                        <li><a href="#">URG</a></li>
                        <li><a href="#">URGM</a></li>
                        <li><a href="#">URGC</a></li>
                        <li><a href="#">UHCDH</a></li>
                        <li><a href="#">UHCDF</a></li>
                    </ul>
                </div>
                <div class="btn-activite">
                    <a href="statistiques.html" class="lien-activite">
                        <img src="images/graphe.png" alt="Activité" class="icon">
                        Activité
                    </a>
                </div>  
            </nav>
            <main class="section-1">
                <section class="acceuil">
                <div class="cote_gauche">
                    <div class="salle_iao zone" data-salle-id="1">
                        <p class="titre">Salle IAO</p>
                    </div>
                    <div class="zone_attente">
                        <p class="titre">Zone d'attente</p>
                        <div class="attente_assise zone" data-salle-id="2">
                            <p class="titre_secondaire">Attente assise</p>
                            @if (isset($patients))
                            @foreach($patients as $patient)
                            <div class="carte-patient" id="carte-patient-{{ $patient->id }}" data-patient-id="{{ $patient->id }}" ondragstart="drag(event)" draggable="true">
    <table>
        <tr>
            <td class="nomPrenomP">
                <a href="{{ route('dossier_patient', ['id' => $patient->id]) }}">{{ $patient->nom }} {{ $patient->prenom }}</a>
            </td>
        </tr>
        <tr>
            <td class="sexAge">
                <img src="{{ asset('images/' . $patient->icone) }}" alt="">
                <p>{{ $patient->age }}</p>
            </td>
        </tr>
        <tr class="chrono">
            <td></td>
            <td>00:00</td>
            <td>00:00</td>
        </tr>
        <tr class="params">
            <td><img src="images/infirmier.png" alt=""></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
@endforeach
                        @endif
                        
                        </div>
                        <div class="attente_couchee zone" data-salle-id="3">
                            <p class="titre_secondaire">Attente couchée</p>
                        </div>
                    </div>
                </div>
                <div class="cote_droit"> 
                    <div class="zone_soins">
                        <p class="titre">Zone de soins</p>
                        <div class="salles_soins">
                            <div class="soin1 zone" data-salle-id="4">
                                <p class="titre_secondaire">Salle de soin 1</p>
                            </div>
                            <div class="soin2 zone" data-salle-id="5">
                                <p class="titre_secondaire">Salle de soin 2</p>
                            </div>
                            <div class="dechocage zone" data-salle-id="6">
                                <p class="titre_secondaire">Salle de déchocage</p>
                            </div>
                            <div class="platre zone" data-salle-id="7">
                                <p class="titre_secondaire">Salle de platre</p>
                            </div>
                        </div>
                    </div>
                    <div class="uhcd">
                        <p class="titre">UHCD</p>
                        <div class="uhcds">
                            <div class="uhcdh zone" data-salle-id="8">
                                <p class="titre_secondaire">UHCDH</p>
                            </div>
                            <div class="uhcdf zone" data-salle-id="9">
                                <p class="titre_secondaire">UHCDF</p>
                            </div>
                        </div>
                    </div>
                    <div class="plateau_technique">
                        <p class="titre">Plateau technique</p>
                        <div class="plateau">
                            <div class="radio zone" data-salle-id="10">
                                <p class="titre_secondaire">Radio</p>
                            </div>
                            <div class="echo zone" data-salle-id="11">
                                <p class="titre_secondaire">Echo</p>
                            </div>
                            <div class="scanner zone" data-salle-id="12">
                                <p class="titre_secondaire">Scanner</p>
                            </div>
                            <div class="irm zone" data-salle-id="13">
                                <p class="titre_secondaire">IRM</p>
                            </div>
                            <div class="autres zone" data-salle-id="14">
                                <p class="titre_secondaire">Autres</p>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <section class="sortieH">
                    <div class="item">
                        <img src="images/Sorties.png" alt="Transfer">
                        <p class="type_sortie">Transfert</p>
                    </div>
                      <div class="item">
                        <img src="images/Sorties.png" alt="Sortie hospital">
                        <p class="type_sortie">Sortie hôpital</p>
                      </div>
                      <div class="item">
                        <img src="images/Sorties.png" alt="Sortie mutation">
                        <p class="type_sortie">Sortie Mutation</p>
                      </div>
                      <div class="item">
                        <img src="images/Sorties.png" alt="UHCD">
                        <p class="type_sortie"
                        >UHCD</p>
                    </div>
                </section> 
            </main>
            @include('Salles.popup')    
        </div>
<script src="js/salles.js"></script>

</body>
</html>