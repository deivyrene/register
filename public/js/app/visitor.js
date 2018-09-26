//-------------------------Datatable para modulo company-----------------------------------------//

var Visitor = function(table){
        
    $('#visitor').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        paging: true,
        searching: true,
        "ajax": "/visitor",
        "columns": [
            {data: 'nameVisitor', name: 'nameVisitor'},
            {data: 'surnameVisitor', name: 'surnameVisitor'},
            {data: 'numberPlace', name: 'numberPlace'},
            {data: 'numberPlace', name: 'numberPlace'},
            {data: 'namePlace', name: 'namePlace'},
            {data: 'arrivalTime', name: 'arrivalTime'},
            {data: 'departureTime', name: 'departureTime'},
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

//Eliminar un registro de visitante
function destroyVisitor(id){
    $.ajax({
        url: '/destroyvisitor',
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

//Buscar un registro de visitante
$('#searchRun').click(function(){

     var route = "http://localhost:8000/getvisitor";
     var rutVisitor = $('#rutVisitor').val();
     
     $.ajax({
         type: 'get',
         url:  route,
         data: {
                    rutVisitor : rutVisitor
               }
     }).done(function(data){
            //console.log(data[0]);
            if(data[0]){
                $('#searchVisitor').hide("slow");
                $('#registerVisitor').show("slow");

                $('#visitor_id').val(data[0].id);
                $('#nameVisitor').val(data[0].nameVisitor);
                $('#surnameVisitor').val(data[0].surnameVisitor);
                $('#rutVisitorForm').val(data[0].rutVisitor);
                $('#emailVisitor').val(data[0].emailVisitor);
                $('#addressVisitor').val(data[0].addressVisitor);
                $('#phoneVisitor').val(data[0].phoneVisitor);
                $('#flag').val("1");
            }
            else{
                $('#searchVisitor').hide("slow");
                $('#registerVisitor').show("slow");
                $('#rutVisitorForm').val(rutVisitor);
                $('#flag').val("0");
            }   
     });
 
 });

 //Buscar un registro de visitante
$('#saveVisitor').click(function(){

    var route = "http://localhost:8000/storevisitor";
    var nameVisitor = $('#nameVisitor').val();
    var surnameVisitor = $('#surnameVisitor').val();
    var rutVisitor = $('#rutVisitorForm').val();
    var emailVisitor = $('#emailVisitor').val();
    var addressVisitor = $('#addressVisitor').val();
    var phoneVisitor = $('#phoneVisitor').val();
    var place_id = $('#place_id').val();
    var visitor_id = $('#visitor_id').val();
    var comments = $('#comments').val();
    var flag = $('#flag').val();

    $.ajax({
        type: 'get',
        url:  route,
        data: {
                   rutVisitor : rutVisitor,
                   nameVisitor : nameVisitor,
                   surnameVisitor : surnameVisitor,
                   emailVisitor : emailVisitor,
                   addressVisitor : addressVisitor,
                   phoneVisitor :  phoneVisitor,
                   place_id : place_id,
                   comments : comments,
                   visitor_id : visitor_id,
                   flag : flag
              }
    }).done(function(data){

            alert('Se ha registrado exitosamente');
            location.reload();
    });

});

function outVisitor(id){
    $.ajax({
        url: '/outvisitor',
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

