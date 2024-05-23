<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrateur</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="icon" type="image/png" href="images/logo_admin.png" id="favicon">
</head>
<body>

<div class="container">
 <div id="nav-gauche"  class="nav-gauche-ferme" >
    <div><img src="images/logo.png" alt=""></div>
    <div class="nav-gauche-bas" >
        
        <a href="#" class="icone" onclick="afficherFormulaire('userForm') "><img src="images/AjouterUtili.png" alt=""class="add"><span class="icon-text">Ajouter un utilisateur</span></a>
        <a href="#" class="icone" onclick=" afficherFormulaire('ufForm') "><img src="images/UF.png" alt=""class="add"><span class="icon-text">Ajouter une unité fonctionnelle</span></a>
        <a href="#" class="icone" onclick="afficherFormulaire('medecinsListe')"><img src="images/listeMed.png" alt=" "class="list"><span class="icon-text">Liste des médecins</span></a>
        <a href="#" class="icone" onclick="afficherFormulaire('infirmiersListe')"><img src="images/listeInf.png" alt="" class="list"><span class="icon-text">Liste des infirmiers</span></a>
        <a href="#" class="icone" onclick="afficherFormulaire('adminListe')"><img src="images/listeAdmin.png" alt="" class="list"><span class="icon-text">Liste des administrateurs</span></a>
      </div>
 </div>
 <div class="cote-droit">
    <nav class="nav-haut">
        <div class="service">
            <span class="urgences">Administrateur</span>
        
        </div> 
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
           
        <div id='google_translate_element' class="traduction"></div>
          
            <div class="decoP">
                <a href="{{ route('logoutP') }}"><img src="images/shuffle.png" alt="deconnexionP"></a>
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

 <main >
  <section id="medecinsListe" class="hidden">
    <div class="liste">
       <h3>Liste des médecins</h3>
       <table class="tableau-sans-bordure">
          <tr>
             <th>Nom</th>
             <th>Spécialité</th>
             <th>Actions</th>
          </tr>
          @if(isset($medecins))
              @foreach($medecins as $medecin)
                 <tr>
                    <td>{{ $medecin->nom_prenom }}</td>
                    <td>{{ $medecin->specialite }}</td>
                    <td class="iconsAction">
                       <a href="#" onclick="openPopupModifierMdp()">
                          <img src="images/icons8-padlock-52.png" alt="Modifier Mot de Passe">
                       </a>
                       <a href="#" onclick="openPopupModifier()">
                          <img src="images/editBlanc.png" alt="Modifier">
                       </a>
                       <a href="#" onclick="openPopupSupprimer()">
                          <img src="images/icons8-trash-bin-48.png" alt="Supprimer">
                       </a>
                    </td>
                 </tr>
              @endforeach
          @endif
       </table>
    </div>
</section>
 
<section id="infirmiersListe" class="hidden">
    <div class="liste">
       <h3>Liste des infirmiers</h3>
       <table class="tableau-sans-bordure">
          <tr>
             <th>Nom</th>
             <th>Actions</th>
          </tr>
          @if(isset($infirmiers))
              @foreach($infirmiers as $infirmier)
                 <tr>
                    <td>{{ $infirmier->nom_prenom }}</td>
                    <td class="iconsAction">
                       <a href="#" onclick="openPopupModifierMdp()">
                          <img src="images/icons8-padlock-52.png" alt="Modifier Mot de Passe">
                       </a>
                       <a href="#" onclick="openPopupModifier()">
                          <img src="images/editBlanc.png" alt="Modifier">
                       </a>
                       <a href="#" onclick="openPopupSupprimer()">
                          <img src="images/icons8-trash-bin-48.png" alt="Supprimer">
                       </a>
                    </td>
                 </tr>
              @endforeach
          @endif
       </table>
    </div>
</section>

<section id="adminListe" class="hidden">
        <!-- Contenu de la liste des infirmiers -->
        <div class="liste">
            <h3>Liste des administrateurs</h3>
            <table class="tableau-sans-bordure">
              <tr>
                <th>Nom</th>
                <th>Actions</th>
              </tr>
              @if(isset($admins))
              @foreach($admins as $admin)
                 <tr>
                    <td>{{ $admin->nom_prenom }}</td>
                    <td class="iconsAction">
                       <a href="#" onclick="openPopupModifierMdp()">
                          <img src="images/icons8-padlock-52.png" alt="Modifier Mot de Passe">
                       </a>
                       <a href="#" onclick="openPopupModifier()">
                          <img src="images/editBlanc.png" alt="Modifier">
                       </a>
                       <a href="#" onclick="openPopupSupprimer()">
                          <img src="images/icons8-trash-bin-48.png" alt="Supprimer">
                       </a>
                    </td>
                 </tr>
              @endforeach
          @endif
            </table>
          </div>
      </section>
<section id="userForm" class="hidden">
        <form method="post" class="form-userForm" >
        @csrf
      <h3>Ajouter un compte </h3>
  <div>
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom_prenom" required>
  </div>
  <div>
    <label for="dateNaissance">Date de naissance :</label>
    <input type="date" id="dateNaissance" name="dateNaissance" required>
</div>
  <div>
      <label for="telephone">Téléphone :</label>
      <input type="text" id="telephone" name="telephone" required>
  </div>
  <div>
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>
  </div>
  <div>
      <label for="adresse">Adresse :</label>
      <input type="text" id="adresse" name="adresse" required>
  </div>
  
  <div>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
  </div>
  <div>
      <label for="role">Role:</label>
      <input type="radio" id="medecin" name="role" value="medecin" onclick="afficherMedecin()"> Médecin
      <input type="radio" id="infirmier" name="role" value="infirmier" onclick="afficherInfirmier()"> Infirmier
      <input type="radio" id="admin" name="role" value="admin" onclick="cacherChamps()"> Administrateur
  </div>  
      <div id="specialiteField" class="hidden">
        <label for="specialite">Spécialité :</label>
        <input type="text" id="specialite" name="specialite"><br>
      </div>

      <div class="bouton">
        <input type="submit" value="Ajouter" class="btn-form">
        <button type="button" onclick="annulerAjoutUs()" class="btn-form">Annuler</button>
      </div>
    </form>
</section>
<section id="ufForm"  class="hidden" >
    <form method="post" class="form-ufForm">
      @csrf
        <h3>Ajouter une unité fonctionnelle</h3>
        <div>
            <label for="type_unite">Type unité</label>
            <input type="radio" id="medicales" name="type_unite" value="medicales" onclick="setNumeroPrefix('13')">Médicales
            <input type="radio" id="chirurgicales" name="type_unite" value="chirurgicales" onclick="setNumeroPrefix('19')">Chirurgicales
        </div>
        <div>
            <label for="nom_unite">Nom unité</label>
            <input type="text" id="nom_unite" name="nom_unite">
        </div>
        <div>
            <label for="numero">Numero</label>
            <input type="number" id="numero" name="numero">
        </div>
        <div class="bouton">
            <input type="submit" value="Ajouter" class="btn-form">
            <button type="button" onclick="annulerAjout()" class="btn-form">Annuler</button>
        </div>
    </form>
</section>
  </main>
<div  id="popupSupprimer" class="popupSupprimer"style="display: none;">
    <div class="popupSupprimer-content">
        <form action="" class="form-supprimer">
            <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
        <div class="G-button">
            <button type="button"  onclick="closePopupSupprimer()">Non</button>
            <button type="submit"><img src="image/saveclose.png" alt="saveclose">Oui</button>
        </div></form>
  </div>
</div>
<div id="popupModifier" class="popupModifier "style="display: none;">
<div class="popupModifier-content">
  <form action=""class="form-modifier">
    <div>
      <label for="telephone">Nouveau numéro de téléphone :</label>
      <input type="text" id="telephone" name="telephone" required>
  </div>
  <div>
      <label for="email">Nouvelle adresse mail :</label>
      <input type="email" id="email" name="email" required>
  </div>
  <div>
      <label for="adresse"> Nouvelle adresse :</label>
      <input type="text" id="adresse" name="adresse" required>
  </div>
<div>
    <label for="specialite">Spécialité :</label>
<input type="text">
  </div>

  <div>
      <label for="password"> Nouveau mot de passe :</label>
      <input type="password" id="password" name="password" required>
  </div>
  <div class="G-button">
    <button type="button"  onclick="closePopupModifier()">Annuler</button>
    <button type="submit"><img src="image/saveclose.png" alt="saveclose">Modifier</button>
</div>
  </form>
</div>
</div>
  <div id="popupModifierMdp" class="popupModifierMdp"style="display: none;"> 
     <div class="popupModifierMdp-content">
    <form action="" class="form-modifierMdp">
      <div>
      <label for="nouveauMdp">Nouveau mot de passe:</label> <input type="password" name="nouveauMdp"></div>
    <div class="G-button">
        <button type="button" onclick="closePopupModifierMdp()" >Annuler</button>
        <button type="submit"><img src="image/saveclose.png" alt="saveclose">Modifier</button>
    </div></form></div>

</div>
</div>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="js/admin.js"></script>
</body>
</html>
