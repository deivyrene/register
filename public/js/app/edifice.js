//-------------------------Datatable para modulo company-----------------------------------------//
    
var Edifice = function(table){
        
    $('#edifice').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        paging: true,
        searching: true,
        "ajax": "/edifice",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'nameEdifice', name: 'nameEdifice'},
            {data: 'contactEdifice', name: 'contactEdifice'},
            {data: 'addressEdifice', name: 'addressEdifice'},
            {data: 'emailEdifice', name: 'emailEdifice'},
            {data: 'action', name: 'action'}
        ],
        dom: 'Bfrtip',
        buttons: [
            {   
                extend:"copy",
                className:"btn-sm",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                },
            },
            {   
                extend:"excel",
                className:"btn-sm",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                },
            },
            {   
                extend:"pdfHtml5",
                className:"btn-sm",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                },
            },
            {   
                extend:"print",
                className:"btn-sm",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                },
            },
        ],
        pageLength: 10,
    });

};

function destroyEdifice(id){
    $.ajax({
        url: '/destroyedifice',
        type: 'get',
        data: {id:id},
        success:function(data){
            alert(data);
            location.reload();
        }, 
        error:function(jqXHR, textStatus, errorThrown){
                
            console.log('error::'+errorThrown);
            console.log('error::'+textStatus);
            console.log('error::'+jqXHR);
        }
    });
  }

//-------------------------------------------FIN--------------------------------------------------//
