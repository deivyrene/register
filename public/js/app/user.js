//-------------------------Datatable para modulo company-----------------------------------------//
    
var UserSystem = function(table){
        
    $('#usersystem').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        paging: true,
        searching: true,
        "ajax": "/usersystem",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles.descriptionRole', name: 'descriptionRole'},
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

function destroyUserSystem(id){
    $.ajax({
        url: '/destroyusersystem',
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


$('#role_id').change(function(){
    
    var id = $('#role_id').val();

    if(id === "1"){
        $('#edifice_id').prop('disabled', 'disabled');
    }
    if(id === "2"){
        $('#edifice_id').prop('disabled', false);
    }

});


var controladorTiempo = "";

function validarMail() {
    let email = $('#email').val();

    $.ajax({
        url: '/verifyEmail',
        type: 'get',
        data: {email:email},
        success:function(data){
            if(data === "true"){
                alert('Correo existe, ingrese nuevamente.');
                document.getElementById("email").value = "";
                document.getElementById("email").focus();
            }
        }, 
        error:function(jqXHR, textStatus, errorThrown){
                
            console.log('error::'+errorThrown);
            console.log('error::'+textStatus);
            console.log('error::'+jqXHR);
        }
    });
}

$('#email').on("keyup", function() {

    clearTimeout(controladorTiempo);
    controladorTiempo = setTimeout(validarMail, 250);

});

$('#verifyPassword').click(function(){

    let pass = $('#password').val();
    let pass_confirm = $('#password-confirmation').val();

    if(pass !== ""){

        if(pass !== pass_confirm){
            alert('Las contraseñas no coinciden');
            document.getElementById('password').value = "";
            document.getElementById('password').focus();
            document.getElementById('password-confirmation').value = "";
            document.getElementById('password-confirmation').focus();
        }
        
    }
    
});