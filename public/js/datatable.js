try{
    var col = document.getElementById('filtroTabela').rows[2].cells.length;
    $(document).ready(function() {
        $('#filtroTabela').dataTable( {
            "columnDefs": [
              { "orderable": false, "targets": [col-1,col-2] }
            ]
        });
    });
}catch(exception){
    $(document).ready(function(){
        $('#filtroTabelaGuest').dataTable();
    })
}




