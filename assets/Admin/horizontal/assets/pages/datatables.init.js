/*
 Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function () {
    $('#datatable'+i).DataTable();
    var i;
for (i = 1; i < 20; i++) {
    $('#datatable'+i).DataTable();
}
 
    // $('#datatable-baru').DataTable({
    //     retrieve: true,
    //     paging: false
    // });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        // lengthChange: true 
        
        buttons: [
            {
                extend: 'pdf',
                text: 'Save current page',
                exportOptions: {
                    modifier: {
                        page: 'current',
                    }
                },
                orientation : 'landscape',
                pageSize : 'A3',
                // pageMargins: [ 40, 60, 40, 60 ]
            }
        ]       
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});

table = $('datatable2').DataTable( {
} );