
var qrcode = new QRCode(document.getElementById("qrcode"), {
  text: "https://www.chuv.ch/fr/urologie/uro-home/patients-et-familles/maladies-et-affections/urologie-generale",
  width: 70,
  height:70,
  colorDark: "#000000",
  colorLight: "#ffffff",
  
  correctLevel: QRCode.CorrectLevel.H
});



/* ------------------------- */
/* Version en JavaScript pur */
/* ------------------------- */
"use strict";
window.addEventListener("DOMContentLoaded", (event) => {
  animate_text();
});
// -------------------
function animate_text() 
{
  let delay = 100,
      delay_start = 0,
      contents,
      letters;

  document.querySelectorAll(".animate-text").forEach(function (elem) {
    contents = elem.textContent.trim();
    elem.textContent = "";
    letters = contents.split("");
    elem.style.visibility = 'visible';

    letters.forEach(function (letter, index_1) {
      setTimeout(function () {
        // ---------
        // effet machine à écrire (SIMPLE)
        elem.textContent += letter;
        // ---------
        // OU :
        // effet machine à écrire + animation CSS (SPECIAL)
        /*
        var span = document.createElement('span');
        span.innerHTML = letter.replace(/ /,'&nbsp;');
        elem.appendChild(span);
*/
        // ---------
      }, delay_start + delay * index_1);
    });    
    delay_start += delay * letters.length;
  });
}

/* ------------------------- */
/* version jQuery */
/* ------------------------- */
/*
"use strict";
$(document).ready(function() {
  animate_text();
});
// -------------------
function animate_text() 
{
  let delay = 100,
      delay_start = 0,
      contents,
      letters;

  $(".animate-text").each(function(index, obj) {
    contents = $(obj).text().trim();
    $(obj).html(''); // on vide le contenu
    letters = contents.split("");
    $(letters).each(function(index_1, letter) {
      setTimeout(function() {
        // ---------
        // effet machine à écrire simple
        $(obj).html( $(obj).html() + letter ); // on ajoute chaque lettre l une après l autre
        // ---------
        // ---------
      }, delay_start + delay * index_1);
    });
    // le suivant démarre à la fin du précédent
    delay_start += delay * letters.length;
  });
}
*/
