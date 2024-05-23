// Fonction pour détecter le mode de couleur préféré du système
function detectPreferredColorScheme() {
  return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

// Fonction pour changer l'icône en fonction du mode système
function changeFavicon() {
  const favicon = document.getElementById('favicon');
  const systemColorScheme = detectPreferredColorScheme();
  if (systemColorScheme === 'dark') {
    favicon.href = 'images/salles.png'; // Chemin vers l'icône en mode sombre
  } else {
    favicon.href = 'images/sallesN.png'; // Chemin vers l'icône en mode clair
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

// Fonction pour ouvrir la fenêtre pop-up
function openPopupOrientation() {
    document.getElementById('popupOrientation').style.display = 'block';
}
// Fonction pour fermer la fenêtre pop-up
function closePopupOrientation() {
    document.getElementById('popupOrientation').style.display = 'none';
}

// Obtenir la date d'aujourd'hui au format YYYY-MM-DD pour définir la limite maximale du champ de date
const aujourdHui = new Date();
const annee = aujourdHui.getFullYear();
let mois = aujourdHui.getMonth() + 1;
mois = mois < 10 ? '0' + mois : mois; // Pour s'assurer que le mois est sur deux chiffres
let jour = aujourdHui.getDate();
jour = jour < 10 ? '0' + jour : jour; // Pour s'assurer que le jour est sur deux chiffres

const dateLimiteMax = `${annee}-${mois}-${jour}`; // Ajout de backticks pour la concaténation de chaînes

// Définir la limite maximale du champ de date sur la date d'aujourd'hui
document.getElementById('dateNaissance').setAttribute('max', dateLimiteMax);

// Récupérer les éléments HTML nécessaires
const dateNaissanceInput = document.getElementById('dateNaissance');
const boutonVerifier = document.getElementById('boutonVerifier');
const messageErreur = document.getElementById('messageErreur');

// Fonction pour vérifier la date de naissance et afficher le message d'erreur si nécessaire
function verifierDateNaissance() {
  const dateNaissance = new Date(dateNaissanceInput.value);
  if (dateNaissance > aujourdHui) {
      messageErreur.style.display = 'block';
  } else {
      messageErreur.style.display = 'none';
  }
}

// Ajouter un écouteur d'événement au bouton de vérification
boutonVerifier.addEventListener('click', verifierDateNaissance);


const searchInput = document.getElementById('searchInput');
const clearInput = document.getElementById('clearInput');

searchInput.addEventListener('input', function() {
  if (this.value.length > 0) {
    clearInput.style.display = 'block';
  } else {
    clearInput.style.display = 'none';
  }
});

clearInput.addEventListener('click', function() {
  searchInput.value = '';
  clearInput.style.display = 'none';
});


document.getElementById('telephone').addEventListener('input', function() {
  var value = this.value.replace(/\D/g, '');
  this.value = value;
});

document.getElementById('numeroAssurance').addEventListener('input', function() {
  var value = this.value.replace(/\D/g, '');
  this.value = value;
});

document.getElementById('boutonVerifier').addEventListener('click', function(event) {
  var nomInput = document.getElementById('nom');
  var nomJeuneFilleInput = document.getElementById('nomJeuneFille');
  nomInput.value = nomInput.value.toUpperCase();
  nomJeuneFilleInput.value = nomJeuneFilleInput.value.toUpperCase();
  
  var telephoneInput = document.getElementById('telephone');
  var numeroAssuranceInput = document.getElementById('numeroAssurance');
  if (!/^\d+$/.test(telephoneInput.value)) {
      alert("Le champ Téléphone ne doit contenir que des chiffres.");
      event.preventDefault();
  }
  if (!/^\d+$/.test(numeroAssuranceInput.value)) {
      alert("Le champ Numéro d'assurance ne doit contenir que des chiffres.");
      event.preventDefault();
  }
});

document.getElementById('prenom').addEventListener('input', function() {
  var value = this.value;
  this.value = value.charAt(0).toUpperCase() + value.slice(1);
});

document.getElementById('lieuNaissance').addEventListener('input', function() {
  var value = this.value;
  this.value = value.charAt(0).toUpperCase() + value.slice(1);
});

document.addEventListener("DOMContentLoaded", function() {
  var nomPrenomSpan = document.querySelector('.nom-prenom');
  var nomPrenomText = nomPrenomSpan.textContent.trim();
  var nomPrenomWords = nomPrenomText.split(' ');
  nomPrenomSpan.textContent = nomPrenomWords[0].toUpperCase() + ' ' + nomPrenomWords.slice(1).join(' ');
});


function myFunction() {
  alert("Patient ajouté avec succès..");
}

document.addEventListener("DOMContentLoaded", function() {
  const cartes = document.querySelectorAll('.carte-patient');
  const zones = document.querySelectorAll('.zone');

  cartes.forEach(carte => {
      carte.addEventListener('dragstart', dragStart);
      carte.addEventListener('dragend', dragEnd);
  });

  zones.forEach(zone => {
      zone.addEventListener('dragover', dragOver);
      zone.addEventListener('dragenter', dragEnter);
      zone.addEventListener('dragleave', dragLeave);
      zone.addEventListener('drop', drop);
  });

  function dragStart(e) {
      this.classList.add('en-glissement');
      e.dataTransfer.setData("text/plain", e.target.id);
  }

  function dragEnd(e) {
      this.classList.remove('en-glissement');
  }

  function dragOver(e) {
      e.preventDefault();
  }

  function dragEnter(e) {
      e.preventDefault();
      this.classList.add('zone-survol');
  }

  function dragLeave(e) {
      this.classList.remove('zone-survol');
  }

  function drop(e) {
    e.preventDefault();
    this.classList.remove('zone-survol');
    const carte = document.querySelector('.en-glissement');
    const nouvelleSalleId = this.dataset.salleId; // Récupérer l'ID de la nouvelle salle
    const patientId = carte.dataset.patientId; // Récupérer l'ID du patient
    
    // Envoyer les données au serveur pour la synchronisation en temps réel
    fetch(`/salles`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ nouvelle_salle_id: nouvelleSalleId })
    })
    .then(response => {
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }
      return response.json();
  })
  .then(data => {
      console.log('Patient moved successfully:', data);
      // Mettre à jour l'interface utilisateur localement si nécessaire
      this.appendChild(carte);
  })
  .catch(error => {
      console.error('Error moving patient:', error);
      // Afficher l'erreur à l'utilisateur
      response.text().then(errorMessage => {
          alert('Une erreur est survenue lors du déplacement du patient : ' + errorMessage);
      });
  });
  
}

});


