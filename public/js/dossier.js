// Fonction pour détecter le mode de couleur préféré du système
function detectPreferredColorScheme() {
    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  }
   
  // Fonction pour changer l'icône en fonction du mode système
  function changeFavicon() {
    const favicon = document.getElementById('favicon');
    const systemColorScheme = detectPreferredColorScheme();
    if (systemColorScheme === 'dark') {
      favicon.href = '/images/personneO.png'; // Chemin vers l'icône en mode sombre
    } else {
      favicon.href = '/images/patient.png'; // Chemin vers l'icône en mode clair
    }
  }
  
  // Appel de la fonction lors du chargement de la page
  window.onload = changeFavicon;
  
// Fonction pour détecter le mode de couleur préféré du système
function detectPreferredColorScheme() {
  return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

// Fonction pour changer l'icône en fonction du mode système
function changeFavicon() {
  const favicon = document.getElementById('favicon');
  const systemColorScheme = detectPreferredColorScheme();
  if (systemColorScheme === 'dark') {
    favicon.href = 'images/personneO.png'; // Chemin vers l'icône en mode sombre
  } else {
    favicon.href = 'images/patient.png'; // Chemin vers l'icône en mode clair
  }
}

// Appel de la fonction lors du chargement de la page
window.onload = changeFavicon;

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
  
  function updateClock() {
    const now = new Date();
    const day = now.getDate();
    const dayAbbr = capitalizeFirstLetter(now.toLocaleDateString('fr-FR', { weekday: 'short' }));
    const month = capitalizeFirstLetter(now.toLocaleDateString('fr-FR', { month: 'long' }));
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const time = `${hours < 10 ? '0' + hours : hours}:${minutes < 10 ? '0' + minutes : minutes}`;
  
    document.getElementById('day').textContent = day;
    document.getElementById('dayAbbr').textContent = dayAbbr;
    document.getElementById('month').textContent = month;
    document.getElementById('systemTime').textContent = time;
  }
  
  setInterval(updateClock, 1000);
  updateClock();

 /* function toggleActive(element, divId) {
    const navLinks = document.querySelectorAll('.nav3 a');
    const contentDivs = document.querySelectorAll('.main-content');
    
    // Remove 'active' class from all links
    navLinks.forEach(link => {
      link.classList.remove('active');
    });

    // Add 'active' class to the clicked link
    element.classList.add('active');

    // Hide all content divs
    contentDivs.forEach(div => {
      div.classList.remove('active');
    });

    // Show the content div associated with the clicked link
    document.getElementById(divId).classList.add('active');
  }
/*
  function toggleActive4(element) {
  const navLinks = document.querySelectorAll('.nav4 a');
      
  navLinks.forEach(link => {
    link.classList.remove('active4');
  });

  element.classList.add('active4');
  }
*/

  function toggleActivemeddet(element) {
    const navLinks = document.querySelectorAll('.nav-examenMedDet a');
        
    navLinks.forEach(link => {
      link.classList.remove('activemeddet');
    });
  
    element.classList.add('activemeddet');
    }

    function toggleActiveadmidetail(element) {
      const navLinks = document.querySelectorAll('.nav-admidetail a');
          
      navLinks.forEach(link => {
        link.classList.remove('admidetail');
      });
    
      element.classList.add('admidetail');
      }

      function toggleActiveadparamidetail(element) {
        const navLinks = document.querySelectorAll('.nav-examenParaMedDet a');
            
        navLinks.forEach(link => {
          link.classList.remove('activeparameddet');
        });
      
        element.classList.add('activeparameddet');
        }
  // Fonction pour ouvrir la fenêtre pop-up
  function openPopupOrientation() {
      document.getElementById('popupOrientation').style.display = 'block';
  }
  // Fonction pour fermer la fenêtre pop-up
  function closePopupOrientation() {
      document.getElementById('popupOrientation').style.display = 'none';
  }

  // Fonction pour ouvrir la fenêtre pop-up
  function openPopupConclusion() {
    document.getElementById('popupConclusion').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupConclusion() {
    document.getElementById('popupConclusion').style.display = 'none';
}

  // Fonction pour ouvrir la fenêtre pop-up
  function openPopupAdmission() {
    document.getElementById('popupAdmission').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupAdmission() {
    document.getElementById('popupAdmission').style.display = 'none';
}

// Fonction pour ouvrir la fenêtre pop-up
function openPopupExamenMed() {
  document.getElementById('popupExamenMed').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupExamenMed() {
  document.getElementById('popupExamenMed').style.display = 'none';
}

function openPopupExamenParaMed() {
  document.getElementById('popupExamenParaMed').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupExamenParaMed() {
  document.getElementById('popupExamenParaMed').style.display = 'none';
}

function openPopupPersonneConfidente() {
  document.getElementById('popupPersonneConfidente').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupPersonneConfidente() {
  document.getElementById('popupPersonneConfidente').style.display = 'none';
}

function openPopupAllergies() {
  document.getElementById('popupAllergies').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupAllergies() {
  document.getElementById('popupAllergies').style.display = 'none';
}

function openPopupAntecedents() {
  document.getElementById('popupAntecedents').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupAntecedents() {
  document.getElementById('popupAntecedents').style.display = 'none';
}

function openPopupMedecins() {
  document.getElementById('popupMedecins').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupMedecins() {
  document.getElementById('popupMedecins').style.display = 'none';
}

function openPopupObservations() {
  document.getElementById('popupObservations').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupObservations() {
  document.getElementById('popupObservations').style.display = 'none';
}

function openPopupVaccins() {
  document.getElementById('popupVaccins').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupVaccins() {
  document.getElementById('popupVaccins').style.display = 'none';
}

function openPopupConstantes() {
  document.getElementById('popupConstantes').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupConstantes() {
  document.getElementById('popupConstantes').style.display = 'none';
}
function openPopupPrescription() {
  document.getElementById('popupPrescription').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupPrescription() {
  document.getElementById('popupPrescription').style.display = 'none';
}
function openPopupDocuments() {
  document.getElementById('popupDocuments').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupDocuments(){
  document.getElementById('popupDocuments').style.display = 'none';
}

function openPopupFicheUhcd() {
  document.getElementById('popupFicheUhcd').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupFicheUhcd() {
  document.getElementById('popupFicheUhcd').style.display = 'none';
}
function openPopupFicheUca() {
  document.getElementById('popupFicheUca').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupFicheUca() {
  document.getElementById('popupFicheUca').style.display = 'none';
}
function closePopupFicheUhcd() {
  document.getElementById('popupFicheUhcd').style.display = 'none';
}
function openPopupTaille() {
  document.getElementById('popupTaille').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupTaille() {
  document.getElementById('popupTaille').style.display = 'none';
}


function toggleActive1(element, formId) {
  const navLinks = document.querySelectorAll('.nav-DetailOrientation a');
  navLinks.forEach(link => {
      link.classList.remove('active1');
  });
  element.classList.add('active1');
  // Masquer tous les formulaires
  const allForms = document.querySelectorAll('form');
  allForms.forEach(form => {
      form.style.display = 'none';
  });
  // Afficher le formulaire correspondant
  const formToShow = document.getElementById('form-' + formId);
  if (formToShow) {
      formToShow.style.display = 'flex';
  }
}
function toggleActive2(element, formId) {
  const navLinks = document.querySelectorAll('.lien-prescription a');
  navLinks.forEach(link => {
      link.classList.remove('active2');
  });
  element.classList.add('active2');
  // Masquer tous les formulaires
  const allForms = document.querySelectorAll('form');
  allForms.forEach(form => {
      form.style.display = 'none';
  });
  // Afficher le formulaire correspondant
  const formToShow = document.getElementById('form-' + formId);
  if (formToShow) {
      formToShow.style.display = 'flex';
  }
}

const aujourdHui = new Date();
const annee = aujourdHui.getFullYear();
let mois = aujourdHui.getMonth() + 1;
mois = mois < 10 ? '0' + mois : mois; // Pour s'assurer que le mois est sur deux chiffres
let jour = aujourdHui.getDate();
jour = jour < 10 ? '0' + jour : jour; // Pour s'assurer que le jour est sur deux chiffres

const dateLimiteMin = `${annee}-${mois}-${jour}`; // Ajout de backticks pour la concaténation de chaînes

// Définir la limite maximale du champ de date sur la date d'aujourd'hui
document.getElementById('date_heure_mutation').setAttribute('min', dateLimiteMin);

// Récupérer les éléments HTML nécessaires
const dateNaissanceInput = document.getElementById('date_heure_mutation');
const boutonVerifier = document.getElementById('boutonVerifier');
const messageErreur = document.getElementById('messageErreur');

// Fonction pour vérifier la date de naissance et afficher le message d'erreur si nécessaire
function verifierDateNaissance() {
  const dateNaissance = new Date(dateNaissanceInput.value);

  // Vérifier si la date de naissance est antérieure à aujourd'hui
  if (dateNaissance < aujourdHui) {
    messageErreur.style.display = 'block';
  } else {
    messageErreur.style.display = 'none';
  }
}

// Ajouter un écouteur d'événement au bouton de vérification
boutonVerifier.addEventListener('click', verifierDateNaissance);

document.getElementById("addDiagnosticButton").addEventListener("click", function() {
  // Créer les éléments label et input pour le nouveau diagnostic
  var newDiagnostic = document.createElement("div");
  newDiagnostic.classList.add("diagnostic");
  newDiagnostic.innerHTML = `
      <label for="DP">DP</label>
      <input type="text" name="DP" placeholder="Diagnostic primaire..."><br>

      <label for="DAS">DAS</label>
      <input type="text" name="DAS" placeholder="Diagnostic secondaire..."><br>
  `;
  
  // Ajouter le nouveau diagnostic au formulaire
  document.getElementById("diagnosticsContainer").appendChild(newDiagnostic);
});


document.getElementById("addActesButton").addEventListener("click", function() {
  // Créer les éléments label et input pour le nouveau diagnostic
  var newDiagnostic = document.createElement("div");
  newDiagnostic.classList.add("actes");
  newDiagnostic.innerHTML = `
  <label for="CAM">CAM</label>
  <input type="text" name="CAM" id="CAM"><br>
  `;
  
  // Ajouter le nouveau diagnostic au formulaire
  document.getElementById("ActesContainer").appendChild(newDiagnostic);
});


tinymce.init({
  selector: "textarea",
 width: "70%",
  height:"20vh",
  menubar: false,
  statusbar: false,
  toolbar: "fontselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent",
  plugins: "textcolor",
  font_formats: 'Roboto=roboto, Arial=arial, sans-serif; Arial=arial, helvetica, sans-serif; Courier New=courier new, courier, monospace; Georgia=georgia, serif; Impact=impact, sans-serif; Times New Roman=times new roman, times, serif; Trebuchet MS=trebuchet ms, sans-serif; Verdana=verdana, sans-serif', // Ajouter d'autres polices avec Roboto
  content_style: "body { font-family: 'Roboto', sans-serif; }" // Appliquer Roboto à tout le contenu
});

function ajouter() {
  tinymce.triggerSave(true, true);
  alert(document.getElementById("motifdecritpatient").value);
}

document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  
  form.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent default form submission
      
      // Get all input fields
      const inputs = document.querySelectorAll('input[type="text"]');
      
      inputs.forEach(function (input) {
          if (input.value.trim() !== '') {
              const parentDiv = input.closest('.div-constantes');
              const modifierButton = parentDiv.querySelector('button');
              modifierButton.style.display = 'none';
          }
      });
      
      // Now you can submit the form if needed
      // form.submit();
  });
});

// Récupérer les éléments du DOM
const autresRadio = document.querySelector('input[value="autres"]');
const autresInput = document.getElementById('autresInput');

// Écouter les changements sur le bouton radio "Autres"
autresRadio.addEventListener('change', function() {
    // Activer ou désactiver le champ de texte en fonction de l'état du bouton radio
    autresInput.disabled = !this.checked;
    // Réinitialiser le contenu du champ de texte lorsqu'il est désactivé
    autresInput.value = '';
});

function openMedForm() {
  // Fonction pour afficher le formulaire d'allergie aux médicaments
  document.getElementById("medForm").style.display = "block";
  document.getElementById("otherForm").style.display = "none";
}

function openOtherForm() {
  // Fonction pour afficher le formulaire d'autres allergies
  document.getElementById("otherForm").style.display = "block";
  document.getElementById("medForm").style.display = "none";
}

function openAMedForm() {
  // Fonction pour afficher le formulaire d'allergie aux médicaments
  document.getElementById("amedForm").style.display = "flex";
  document.getElementById("autresForm").style.display = "none";
  document.getElementById("achirForm").style.display = "none";
  document.getElementById("afamForm").style.display = "none";
}

function openAChirForm() {
  // Fonction pour afficher le formulaire d'autres allergies
  document.getElementById("amedForm").style.display = "none";
  document.getElementById("autresForm").style.display = "none";
  document.getElementById("achirForm").style.display = "flex";
  document.getElementById("afamForm").style.display = "none";
}

function openAFamForm() {
  // Fonction pour afficher le formulaire d'allergie aux médicaments
  document.getElementById("amedForm").style.display = "none";
  document.getElementById("autresForm").style.display = "none";
  document.getElementById("achirForm").style.display = "none";
  document.getElementById("afamForm").style.display = "flex";
}

function openAutresForm() {
  // Fonction pour afficher le formulaire d'autres allergies
  document.getElementById("amedForm").style.display = "none";
  document.getElementById("autresForm").style.display = "flex";
  document.getElementById("achirForm").style.display = "none";
  document.getElementById("afamForm").style.display = "none";
}
/*FONCTION TRADUCTION*/
/*<![CDATA[*/ var lazyts=!1;window.addEventListener("scroll",function(){(0!=document.documentElement.scrollTop&&!1===lazyts||0!=document.body.scrollTop&&!1===lazyts)&&(!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a)}(),lazyts=!0)},!0); /*]]>*/
/*<![CDATA[*/ function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'fr',includedLanguages:'en,fr',layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element')}; /*]]>*/

//formulaire medicament
document.getElementById("ajouterMed").addEventListener("click", function(event){  
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer les valeurs des champs de formulaire
  var nom= document.getElementById("nomMedic").value;
  var dose = document.getElementById("doseMedic").value;
  var voie= document.getElementById("voieAdmini").value;
  var frecDose =document.getElementById("frecDose").value;
  var dureTrait= document.getElementById("dureTrait").value;

  // Afficher les données sur la page
  var resultDiv = document.createElement("div");
  var resultString =  nom + "," + dose +" par "  + voie + ","+ frecDose + " pendant " + dureTrait;

  // Ajouter la ligne dans la section des résultats
  var resultDiv = document.getElementById("affichage");
  var resultParagraph = document.createElement("p");
  resultParagraph.textContent = resultString;
  resultDiv.appendChild(resultParagraph);

  document.getElementById("nomMedic").value = "";
  document.getElementById("doseMedic").value = "";
  document.getElementById("voieAdmini").value="";
  document.getElementById("frecDose").value="";
  document.getElementById("instrucSpecMedic").value="";
  document.getElementById("dureTrait").value="";
});
//formulaire Rx-Imagerie
document.getElementById("ajouterImagerie").addEventListener("click", function(event) {
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer les valeurs des champs de formulaire
  var type = document.getElementById("typeImgr").value;
  var regImagerie = document.getElementById("regImgr").value;

  // Afficher les données sur la page
  var resultDiv = document.getElementById("affichageImgr");
  var resultString = type + ", " + regImagerie;

  // Ajouter la ligne dans la section des résultats
  var resultParagraph = document.createElement("p");
  resultParagraph.textContent = resultString;
  resultDiv.appendChild(resultParagraph);

  // Réinitialiser les champs du formulaire
  document.getElementById("typeImgr").value = "";
  document.getElementById("regImgr").value = "";
  document.getElementById("indicCliImgr").value = "";
  document.getElementById("instrucSpecImgr").value = "";
});
//formulaire biologie
document.getElementById("ajouterBiol").addEventListener("click", function(event){  
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer les valeurs des champs de formulaire
  var type= document.getElementById("typeAnal").value;
  var testSpecial = document.getElementById("testSpeci").value;


  // Afficher les données sur la page
  var resultDiv = document.createElement("div");
  var resultString =  type + "," + testSpecial;

  // Ajouter la ligne dans la section des résultats
  var resultDiv = document.getElementById("affichageBiol");
  var resultParagraph = document.createElement("p");
  resultParagraph.textContent = resultString;
  resultDiv.appendChild(resultParagraph);

  document.getElementById("typeAnal").value = "";
  document.getElementById("testSpeci").value = "";
  document.getElementById("indicCliBio").value="";
  document.getElementById("instrucSpecBiol").value="";
});
//formulaire surveillance
document.getElementById("ajouterSurv").addEventListener("click", function(event){  
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer les valeurs des champs de formulaire
  var type= document.getElementById("typeSurveil").value;


  // Afficher les données sur la page
  var resultDiv = document.createElement("div");
  var resultString =  type ;

  // Ajouter la ligne dans la section des résultats
  var resultDiv = document.getElementById("affichageSurv");
  var resultParagraph = document.createElement("p");
  resultParagraph.textContent = resultString;
  resultDiv.appendChild(resultParagraph);

  document.getElementById("typeSurveil").value = "";
  document.getElementById("instrucSpecSurviel").value="";
});

function selectionnerEtAfficherFich() {
  // Création d'un élément <input> de type 'file'
  var input = document.createElement('input');
  input.type = 'file';

  // Ajout d'un événement 'change' pour capturer la sélection des fichiers
  input.addEventListener('change', function() {
      var fichier = input.files[0]; // Récupération du premier fichier sélectionné
      if (fichier) {
          var urlFichier = URL.createObjectURL(fichier); // Création d'une URL temporaire pour le fichier sélectionné
          document.getElementById('urlFichier').value = urlFichier; // Affichage de l'URL dans l'input
          window.open(urlFichier, '_blank'); // Ouverture du fichier avec l'application par défaut
      }
  });

  // Simulation d'un clic sur l'élément <input> pour ouvrir la fenêtre de sélection de fichiers
  input.click();
}

function selectionnerEtAfficherDoc() {
  // Création d'un élément <input> de type 'file'
  var input = document.createElement('input');
  input.type = 'file';
  
  // Ajout d'un événement 'change' pour capturer la sélection des fichiers
  input.addEventListener('change', function() {
      var fichier = input.files[0]; // Récupération du premier fichier sélectionné
      if (fichier) {
          var cheminFichier = fichier.name; // Récupération du chemin local du fichier
          document.getElementById('cheminFichier').value = cheminFichier; // Affichage du chemin dans l'input
      }
  });


  // Simulation d'un clic sur l'élément <input> pour ouvrir la fenêtre de sélection de fichiers
  input.click();
}
//examen paramedical 
function afficherCarré(element, carréId) {
  var carré = document.getElementById(carréId);
  var textToDisplay = element.getAttribute('data-id');
  carré.textContent = textToDisplay;
  carré.style.backgroundColor = element.value;
  carré.style.boxShadow = "0px 1px 10px 0px rgba(209,209,209,1)";
}
/*
function toggleActive4(element, divId) {
  const navLinks = document.querySelectorAll('.nav4 a');
  const contentDivs = document.querySelectorAll('.main-content');
  
  // Remove 'active4' class from all links
  navLinks.forEach(link => {
    link.classList.remove('active4');
  });

  // Add 'active4' class to the clicked link
  element.classList.add('active4');

  // Hide all content divs
  contentDivs.forEach(div => {
    div.classList.remove('active');
  });

  // Show the content div associated with the clicked link
  document.getElementById(divId).classList.add('active');
}*/
function toggleActive4(element, divId) {
  const navLinks4 = document.querySelectorAll('.nav4 a');
  const navLinks3 = document.querySelectorAll('.nav3 a');
  const contentDivs = document.querySelectorAll('.main-content');
  
  // Remove 'active4' class from all links in nav4
  navLinks4.forEach(link => {
    link.classList.remove('active4');
  });

  // Remove 'active' class from all links in nav3
  navLinks3.forEach(link => {
    link.classList.remove('active');
  });

  // Add 'active4' class to the clicked link
  element.classList.add('active4');

  // Hide all content divs
  contentDivs.forEach(div => {
    div.classList.remove('active');
  });

  // Show the content div associated with the clicked link
  document.getElementById(divId).classList.add('active');
}

function toggleActive(element, divId) {
  const navLinks3 = document.querySelectorAll('.nav3 a');
  const navLinks4 = document.querySelectorAll('.nav4 a');
  const contentDivs = document.querySelectorAll('.main-content');
  
  // Remove 'active' class from all links in nav3
  navLinks3.forEach(link => {
    link.classList.remove('active');
  });

  // Remove 'active4' class from all links in nav4
  navLinks4.forEach(link => {
    link.classList.remove('active4');
  });

  // Add 'active' class to the clicked link
  element.classList.add('active');

  // Hide all content divs
  contentDivs.forEach(div => {
    div.classList.remove('active');
  });

  // Show the content div associated with the clicked link
  document.getElementById(divId).classList.add('active');
}
document.querySelector('.ordInput').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get input values
  const medicament = document.getElementById('medicament').value;
  const duree = document.getElementById('duree').value;
  const type = document.getElementById('type').value;

  // Create new table row
  const newRow = document.createElement('tr');
  newRow.innerHTML = `
      <td class="nomMed">${medicament}</td>
      <td></td>
      <td><img src="images/icons8-agreement-50.png" alt=""></td>
      <td>en cours</td>
      <td><input type="checkbox"></td>
      <td><input type="checkbox"></td>
      <td><input type="checkbox"></td>
      <td>${duree}</td>
      <td>${type}</td>
      <td></td>
      <td><img src="images/poubelle.png" alt=""></td>
  `;

  // Append new row to table
  document.getElementById('medicationTable').appendChild(newRow);

  // Clear form inputs
  document.getElementById('medicament').value = '';
  document.getElementById('duree').value = '';
  document.getElementById('type').value = '';
});