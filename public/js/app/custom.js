

//-------------------Inicializacion de los dataTables----------------------------------------//
$(function(){
    Edifice();
    Place();
    Role();
    UserSystem();
    Visitor();
});

//-------------Funciones JS del modulo register activity------------------------------------------//

//---------------Funcion para cargar select dependiente de usuarios-empresa-----------------//
    $('#companies_id').on('change', function(e){
                    
        var id = $('#companies_id').val();
        //var route = "http://www.sipcom.cl/siac/listuser";
        
        var route = "http://www.sipcom.cl/siac/listuser";
        $.get(route, { id:id } , function(data){
            
        
            $('#businessuser_id').empty();
            
            $.each(data, function(index, business) {

                $('#businessuser_id').append('<option value="'+data[index].id+'">'+data[index].nameBusinessUser+'</option>');
            });

        });
    });

//-----------Funcion para guardar un registro de actividad de usuario------------------------//
    $('#saveActivity').click(function(){

        var company_id = $('#companies_id').val();
        var consultant_id = $('#consultants_id').val();
        var activity_id = $('#activities_id').val();
        var user_id = $('#businessuser_id').val();
        var desActivity = $('#desRegisterActivity').val();
        var dateActivity = $('#dateRegisterActivity').val();
        var dateActivities = $('#dateRegisterActivities').val();
        var codActivity = $('#codActivity').val();
        //var route = "http://www.sipcom.cl/siac/saveactivity";

        var route = "http://www.sipcom.cl/siac/saveactivity";
        $.ajax({
            url: route,
            type: 'get',
            data: {
                    'company_id' : company_id, 
                    'consultant_id' : consultant_id, 
                    'activity_id' : activity_id, 
                    'user_id' : user_id, 
                    'desActivity' : desActivity, 
                    'dateActivity' : dateActivity, 
                    'dateActivities' : dateActivities,
                    'codActivity' : codActivity
                  },
            success:function(data){

                $("#consultants_id").prop('disabled', true);
                $("#companies_id").prop('disabled', true);

                getActivityUser(codActivity);

            }, 
            error:function(jqXHR, textStatus, errorThrown){
                    
                console.log('error::'+errorThrown);
                console.log('error::'+textStatus);
                console.log('error::'+jqXHR);
            }

        });   

    });


//-------Funcion para mostrar listado de usuarios - actividades de una empresa con fecha------//
    function getActivityUser(codActivity){

       // var route = "http://www.sipcom.cl/siac/getactivityuser";
        var route = "http://www.sipcom.cl/siac/getactivityuser";
        var code = '"'+codActivity+'"';
        
        $.ajax({
            type: 'get',
            url:  route,
            data: {
                    codActivity : codActivity
                  }
        }).done(function(data){
                

                var	rows = '';
                $.each( data, function( key, value ) {

                    rows = rows + '<tr>';
                    rows = rows + '<td>'+value.businessuser.nameBusinessUser+'</td>';
                    rows = rows + '<td>'+value.activities.nameActivity+'</td>';
                    rows = rows + '<td>'+data[key].desRegisterActivity+'</td>';
                    rows = rows + '<td>'+data[key].dateRegisterActivity+'</td>';
                    rows = rows + '<td>';
                    rows = rows + "<a href='#' onclick='deleteActivity("+data[key].id+","+code+")' class='btn btn-danger pull-right'><i class='material-icons'>delete_forever</i></a>";
                    rows = rows + '</td>';
                    rows = rows + '</tr>';
                });
                

                $("tbody").html(rows);
        });
    
    }

//--------Funcion para eliminar un registro de actividad de usuario-----------------------//
    function deleteActivity(id, codActivity){

       // var route = "http://www.sipcom.cl/siac/deleteactivity";
        var route = "http://www.sipcom.cl/siac/deleteactivity";
        $.ajax({
            type: 'get',
            url:  route,
            data: {
                    id : id,
                  }
        }).done(function(data){
                
                alert(data);
                getActivityUser(codActivity);
        });
    }

//----------Funcion que genera pdf del reporte de actividades ---------------------------//
    function pdf(){

        // var div = document.querySelector("#imprimir");
        //imprimirElemento(div);

        var doc = new jsPDF();
        doc.addHTML(document.getElementById('documento'), 5, 10, {
             background: '#fff',
             margin: { top: 10, right: 10, bottom: 10, left: 10, useFor: 'page'}
        }, function() {
            doc.save(name+'.pdf');
        });
    }
    
