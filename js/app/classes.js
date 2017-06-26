/**
 * Created by Andrey F on 25.06.2017.
 */
(function(win, doc,$){
    var classes = (function (){
        function searchFineByGet() {
            console.log('start searching');
        };
        function openSearchFine() {
            var sts = $('#sv-vo').val();
            location.replace('/проверка-штрафов-гибдд?number-sts=' + sts)
        }
        return {
            searchFineByGet: searchFineByGet,
            openSearchFine: openSearchFine
        };
    })();

    $(doc).ready(function(){
        console.log('Init classes')
    });
    if(!win.classes) win.classes = classes;
})(window, document,jQuery);
