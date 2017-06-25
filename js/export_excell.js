
function exportDataToExcell(type_export) {
  if(type_export=='all') {
    // alert('printing all');
    location.replace('/export/all'); // /php/excell.php
    return;
  }
  var clasesToExcell = document.getElementsByClassName("str_to_excell");
  var ids_blanks = [];
  for (var i = 0; i < clasesToExcell.length; i++) {
      ids_blanks.push(clasesToExcell[i].getAttribute("name"));
      // alert(clasesToExcell[i].getAttribute("name"));
  }
  // TODO review JSON data !
  // передаем массив id ids_blanks
  var action = 'makehash';
  var data = {
    'ids_blanks' : ids_blanks
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/excell_make_hash.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        location.replace('/export/'+html); // /php/excell.php
      },
      error: function(html) {

      }
  });
  // Сохранить массив в excell_export_objects
  // Собираем ID штрафов со страницы
  // location.replace('/export/hashtag007'); // /php/excell.php
}

function exportDataToExcell2() {
 alert ('Exporting')
}

function exportAll() {

}
