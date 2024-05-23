<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles</title>
    <link rel="stylesheet" href="css/salles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/salles.png" id="favicon">
</head>
<body>
    <div id="popupOrientation" class="popupOrientation">
        <div class="popupOrientation-content">
          <nav class="nav-orientation">
            <div class="titre-orientation">
              <img src="images/ajouterpatient.png" alt="LogoAjouterPatient">
              <h3>Ajouter Patient</h3>
            </div>
            <a href="#" onclick="closePopupOrientation()"><img src="images/x copy.png" alt="x"></a>
          </nav>
         
            <form method="post" class="ajoutPatientForm" id="ajoutPatientForm">
                @csrf
                <div class="part1-part2">
              <div class="part1">
                <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" class="uppercase-input" name="nom" required>
            </div>
            <div>
                <label for="nomJeuneFille">Nom de jeune fille :</label>
                <input type="text" id="nomJeuneFille" class="uppercase-input" name="nomJeuneFille">
            </div>
            <div>
                <label for="lieuNaissance">Lieu de naissance :</label>
                <input type="text" id="lieuNaissance" name="lieuNaissance" required>
            </div>
            <div>
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required>
            </div>
            <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            </div>
              </div>
              <div class="part2">
            <div>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="dateNaissance">Date de naissance :</label>
                <input type="date" id="dateNaissance" name="dateNaissance" max="" required>
                <p id="messageErreur" style="color: red; display: none;">La date de naissance ne peut pas être ultérieure à aujourd'hui.</p>
            </div>
            <div>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div>
                <label for="numeroAssurance">Numéro d'assurance :</label>
                <input type="text" id="numeroAssurance" name="numeroAssurance" required>
            </div>
            <div>
                <label for="sexe">Sexe :</label>
                <input type="radio" value="homme" id="sexe" name="sexe" required>Homme
                <input type="radio" value="femme" id="sexe" name="sexe" required>Femme
            </div>
              </div>
            </div>
              <button id="boutonVerifier" type="submit" onclick="myFunction()">Ajouter Patient</button>
            </form>
        </div>
      </div>
      <script src="js/salles.js"></script>
</body>
</html>