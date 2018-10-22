//-------------------------Datatable para modulo company-----------------------------------------//
    
var Place = function(table){
        
    $('#place').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        paging: true,
        searching: true,
        "ajax": "/place",
        "columns": [
            {data: 'numberPlace', name: 'numberPlace'},
            {data: 'namePlace', name: 'namePlace'},
            {data: 'ownerPlace', name: 'ownerPlace'},
            {data: 'phonePlace', name: 'phonePlace'},
            {data: 'mailPlace', name: 'mailPlace'},
            {data: 'edifices.nameEdifice', name: 'nameEdifice'},
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
        pageLength: 5,
    });

};

$('#listPlace').click(function(){
    
    $('#tableFirst').hide("slow");
    $('#tableRange').hide("slow");
    $('#registerVisitor').hide("slow");
    $('#tablePlaces').show("slow");

});

function destroyPlace(id){
    $.ajax({
        url: '/destroyplace',
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
