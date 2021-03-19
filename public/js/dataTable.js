$(document).ready( function () {
    var table = $('#vehiculeTable').DataTable( {
        paging:   false,
        ordering: false,
        info:     false,
    });

    $('#selectSociete').on('change', function(){
        table.search(this.value).draw();
        $("#search_box").val(($('#selectSociete option:selected').text()));
    });


    $("#search_box").on('keyup', function() {
        table.search( this.value ).draw();
    });
});

