
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
  
  function reduireNav() {
    var nav = document.getElementById("nav-gauche");
    nav.classList.add("nav-gauche-ferme");
  }
  function afficherFormulaire(idFormulaire) {
    var formulaires = document.querySelectorAll(' section');
    formulaires.forEach(function(formulaire) {
      if (formulaire.id === idFormulaire) {
        formulaire.classList.remove('hidden');
      } else {
        formulaire.classList.add('hidden');
      }
    });
  }
  
  
  function setNumeroPrefix(prefix) {
    document.getElementById('numero').value = prefix;
  }
  
  /*FONCTION TRADUCTION*/
  /*<![CDATA[*/ var lazyts=!1;window.addEventListener("scroll",function(){(0!=document.documentElement.scrollTop&&!1===lazyts||0!=document.body.scrollTop&&!1===lazyts)&&(!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a)}(),lazyts=!0)},!0); /*]]>*/
  /*<![CDATA[*/ function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'fr',includedLanguages:'en,fr',layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element')}; /*]]>*/
  function openPopupSupprimer(){
    document.getElementById('popupSupprimer').style.display = 'block';
  }
  // Fonction pour fermer la fenêtre pop-up
  function closePopupSupprimer() {
    document.getElementById('popupSupprimer').style.display = 'none';
  }
  
  
  function openPopupModifierMdp() {
    document.getElementById('popupModifierMdp').style.display = 'block';
  }
  // Fonction pour fermer la fenêtre pop-up
  function closePopupModifierMdp() {
    document.getElementById('popupModifierMdp').style.display = 'none';
  }
  
  function openPopupModifier() {
    document.getElementById('popupModifier').style.display = 'block';
  }
  // Fonction pour fermer la fenêtre pop-up
  function closePopupModifier() {
    document.getElementById('popupModifier').style.display = 'none';
  }
  
  
  function afficherMedecin() {
    document.getElementById("specialiteField").classList.remove("hidden");
    document.getElementById("roleSpecificField").classList.add("hidden");
  }
  
  function afficherInfirmier() {
    document.getElementById("specialiteField").classList.add("hidden");
    document.getElementById("roleSpecificField").classList.remove("hidden");
  }
  
  function cacherChamps() {
    document.getElementById("specialiteField").classList.add("hidden");
    document.getElementById("roleSpecificField").classList.add("hidden");
  }
  function annulerAjoutUs() {
    document.getElementById("userForm").classList.add("hidden");
  }
  function annulerAjout() {
    document.getElementById("ufForm").classList.add("hidden");
  }
  