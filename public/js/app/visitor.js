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
            {data: 'companyVisitor', name: 'companyVisitor'},
            {data: 'numberPlace', name: 'numberPlace'},
            {data: 'namePlace', name: 'namePlace'},
            {data: 'arrivalTime', name: 'arrivalTime'},
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


var Visitants = function(table){
        
    $('#visitors').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        paging: true,
        searching: true,
        "ajax": "/visitants",
        "columns": [
            {data: 'nameVisitor', name: 'nameVisitor'},
            {data: 'surnameVisitor', name: 'surnameVisitor'},
            {data: 'rutVisitor', name: 'rutVisitor'},
            {data: 'companyVisitor', name: 'companyVisitor'},
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

$("#backRun").click(function(){

    location.reload();

});

//Buscar un registro de visitante
$('#searchRun').click(function(){

     var route = "http://localhost:8000/getvisitor";
     var rutVisitor = $('#rutVisitor').val();
     

    if(rutVisitor.length == 0){
        alert('Ingrese Run');
        return false;
    }
    else{

        $.ajax({
            type: 'get',
            url:  route,
            data: {
                        rutVisitor : rutVisitor
                }
        }).done(function(data){
                //console.log(data[0]);
                if(data[0]){
                    $('#buscarRun').modal('toggle');
                    //$('#tableFirst').hide("slow");
                    $('#tableRange').hide("slow");
                    $('#tablePlaces').hide("slow");
                    $('#registerVisitor').show("slow");

                    $('#visitor_id').val(data[0].id);
                    $('#nameVisitor').val(data[0].nameVisitor).prop('disabled', true);
                    $('#surnameVisitor').val(data[0].surnameVisitor).prop('disabled', true);
                    $('#rutVisitorForm').val(data[0].rutVisitor).prop('disabled', true);
                    $('#companyVisitor').val(data[0].companyVisitor).prop('disabled', true);
                    $('#flag').val("1");
                }
                else{
                    $('#buscarRun').modal('toggle');
                    //$('#tableFirst').hide("slow");
                    $('#tableRange').hide("slow");
                    $('#tablePlaces').hide("slow");
                    $('#registerVisitor').show("slow");

                    $('#rutVisitorForm').val(rutVisitor);
                    $('#nameVisitor').val("");
                    $('#surnameVisitor').val("");
                    $('#companyVisitor').val("");
                    $('#flag').val("0");
                }   
        });
    }
 
 });

 //Buscar un registro de visitante
$('#saveVisitor').click(function(){

    var route = "http://localhost:8000/storevisitor";
    var nameVisitor = $('#nameVisitor').val();
    var surnameVisitor = $('#surnameVisitor').val();
    var rutVisitor = $('#rutVisitorForm').val();
    var companyVisitor = $('#companyVisitor').val();
    var place_id = $('#place_id').val();
    var visitor_id = $('#visitor_id').val();
    var flag = $('#flag').val();

    $.ajax({
        type: 'get',
        url:  route,
        data: {
                   rutVisitor : rutVisitor,
                   nameVisitor : nameVisitor,
                   surnameVisitor : surnameVisitor,
                   companyVisitor :  companyVisitor,
                   place_id : place_id,
                   visitor_id : visitor_id,
                   flag : flag
              }
    }).done(function(data){

            alert('Se ha registrado exitosamente');
            location.reload();
    });

});

 //Buscar registros por rango de fecha
 $('#searchDateRange').click(function(){

    var route = "/visitor";
    var dateIn = $('#dateIn').val();
    var dateOf = $('#dateOf').val();
    var flag = "dateRange";

    if(dateIn.length != 0 && dateOf.length != 0)
    {

        $('#buscarFecha').modal('toggle');
        $('#tableFirst').hide("slow");
        $('#tablePlaces').hide("slow");
        $('#tableRange').show("slow");

        $('#visitorRange').DataTable({
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            paging: true,
            searching: true,
            destroy: true,
            "ajax": {
                        "url": route,
                        "data": {
                                dateIn : dateIn,
                                dateOf : dateOf,
                                flag : flag,
                        }
                    },
            "columns": [
                {data: 'nameVisitor', name: 'nameVisitor'},
                {data: 'surnameVisitor', name: 'surnameVisitor'},
                {data: 'companyVisitor', name: 'companyVisitor'},
                {data: 'namePlace', name: 'namePlace'},
                {data: 'arrivalTime', name: 'arrivalTime'},
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
    }

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

