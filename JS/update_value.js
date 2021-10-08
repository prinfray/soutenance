btn_modify = document.querySelectorAll('.modify-btn'); 

btn_modify.forEach(btn => {
    btn.addEventListener("click", function() {
        id_note_modify = btn.getAttribute("data-note-modify");
        selector_note = '#note-'+ id_note_modify;
        update_element(btn,id_note_modify,selector_note);
      });
});


function update_element(btn_validate,id_note,selector_note){

    document.querySelector(selector_note).removeAttribute("disabled");
    btn_validate.innerHTML = "Valider";
    // set attribute on click
    btn_validate.setAttribute("style", "background-color: red;");
    // btn_validate.setAttribute("onclick","envoidb("+selector_note+")"); 
    btn_validate.addEventListener("click", function() {
        envoidb(id_note, selector_note);
    });


}
function envoidb(id_note, selector_note){
  note = document.querySelector(selector_note).value;
  alert(note);
  
  // note = ("#note-"+id_note_modify+""); 
  window.location="../update.php?id="+id_note+"&note_to_update="+note; 
}


// 1 header location ==> update.php?id=id_note&note=thevaluetoupdate
// 2 Créer un fichier update avec requette sql pour update la note en fonction de l'id + dans le fichier update.php faire un history.bac
// 2 requete avec seulemejt la note 

