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
        pageLength: 5,
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

$('#listToday').click(function(){
    
    $('#tableFirst').show("slow");
    $('#tableRange').hide("slow");
    //$('#registerVisitor').hide("slow");
    $('#tablePlaces').hide("slow");

});

$('#viewForm').click(function(){

    $('#registerVisitor').show("slow");
});



$("#backRun").click(function(){

    location.reload();

});

//Buscar un registro de visitante
$('#searchRun').click(function(){

     var route = "/getvisitor";
     var rutVisitor = $('#rutVisitorForm').val();
     

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
                   // $('#tableRange').hide("slow");
                   // $('#tablePlaces').hide("slow");
                   // $('#registerVisitor').show("slow");

                    $('#visitor_id').val(data[0].id);
                    $('#nameVisitor').val(data[0].nameVisitor).prop('disabled', false);
                    $('#surnameVisitor').val(data[0].surnameVisitor).prop('disabled', false);
                    $('#rutVisitorForm').val(data[0].rutVisitor).prop('disabled', false);
                    $('#companyVisitor').val(data[0].companyVisitor).prop('disabled', false);
                    $('#place_id').prop('disabled', false);
                    $('#saveVisitor').prop('disabled', false);
                    $('#flag').val("1");
                    
                }
                else{
                    alert("No existe, rellene los campos!!");
                    $('#buscarRun').modal('toggle');
                    //$('#tableFirst').hide("slow");
                    //$('#tableRange').hide("slow");
                   // $('#tablePlaces').hide("slow");
                   // $('#registerVisitor').show("slow");

                    $('#rutVisitorForm').val(rutVisitor).prop('disabled', false);
                    $('#nameVisitor').val("").prop('disabled', false);
                    $('#surnameVisitor').val("").prop('disabled', false);
                    $('#companyVisitor').val("").prop('disabled', false);
                    $('#place_id').prop('disabled', false);
                    $('#saveVisitor').prop('disabled', false);
                    $('#flag').val("0");
                }   
        });
    }
 
 });

 //Buscar un registro de visitante
$('#saveVisitor').click(function(){

    var route = "/storevisitor";
    var nameVisitor = $('#nameVisitor').val();
    var surnameVisitor = $('#surnameVisitor').val();
    var rutVisitor = $('#rutVisitorForm').val();
    var companyVisitor = $('#companyVisitor').val();
    var place_id = $('#place_id').val();
    var visitor_id = $('#visitor_id').val();
    var flag = $('#flag').val();

    if(nameVisitor !== "" && surnameVisitor !== "" && rutVisitor !== "" && companyVisitor !== "" && place_id !== ""){
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
    }
    else{
        alert("No debe dejar campos vacíos");
    }
    

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


//Buscador de empresa 
window.addEventListener("load", function(){
	// Add a keyup event listener to our input element
	document.getElementById('companyVisitor').addEventListener("keyup", function(event){hinter(event)});
	// create one global XHR object 
	// so we can abort old requests when a new one is make
	window.hinterXHR = new XMLHttpRequest();
});

// Autocomplete for form
function hinter(event) {
	var input = event.target;
	var huge_list = document.getElementById('huge_list');
	// minimum number of characters before we start to generate suggestions
	var min_characters = 0;

	if (!isNaN(input.value) || input.value.length < min_characters ) { 
		return;
	} else { 
		window.hinterXHR.abort();
		window.hinterXHR.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = JSON.parse( this.responseText ); 
                huge_list.innerHTML = "";
                
				response.forEach(function(item) {
                    // Create a new <option> element.
                    var option = document.createElement('option');
                    option.value = item;
                    huge_list.appendChild(option);
                });
			}
		};
		window.hinterXHR.open("GET", "/getCompanyVisitors/"+ input.value, true);
		window.hinterXHR.send()
	}
}

//Cargar opcion empresas
window.addEventListener("load", function(){

    var route = "/getPlaceEdifice";

        $.ajax({
          type: "GET",
          url: route, 
          dataType: "json",
          success: function(data){
            $.each(data,function(key, place) {
              $("#place_id").append('<option value='+place.id+'>'+place.namePlace+'</option>');
            });        
          },
          error: function(data) {
            if(data.responseJSON.error !== "Unauthenticated."){
                alert('error');
            }
            
          }
        });

 })
