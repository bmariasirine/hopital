// Fonction pour détecter le mode de couleur préféré du système
function detectPreferredColorScheme() {
    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  }
  
  // Fonction pour changer l'icône en fonction du mode système
  function changeFavicon() {
    const favicon = document.getElementById('favicon');
    const systemColorScheme = detectPreferredColorScheme();
    if (systemColorScheme === 'dark') {
      favicon.href = 'images/logo.png'; // Chemin vers l'icône en mode sombre
    } else {
      favicon.href = 'images/logoN.png'; // Chemin vers l'icône en mode clair
    }
  }
  
  // Appel de la fonction lors du chargement de la page
  window.onload = changeFavicon;
