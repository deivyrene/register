<!DOCTYPE html>
<html lang="es">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        
</head>

<body style="background-color: #ffffff">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <table >
                <thead>
                    <tr>
                        <td rowspan="4" colspan="2" align="center"><img src="http://www.sipcom.cl/siac/img/sipcom.png" alt="" width="200"></td>
                        <td rowspan="4" colspan="7" align="center"><h3>SISTEMA DE GESTIÓN</h3></td>
                        <td colspan="2">Fecha 10/01/2015</td>
                    </tr>
                    <tr>
                        <td colspan="2">Versión 001</td>
                    </tr>
                    <tr>
                        <td colspan="2">Código: FRAG</td>
                    </tr>
                    <tr>
                        <td colspan="2">Página 1 de 1</td>
                    </tr>
                    <tr>
                        <td colspan="11"><B>Informe:</B> Registro Actividades</td>
                    </tr>

                    <tr>
                        <td colspan="5" ><B>Cliente:</B> {{ $registeractivities[0]->companies->nameCompany }}</td>
                        <td colspan="6" ><B>Contacto Cliente:</B> {{ $registeractivities[0]->companies->attendantCompany }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" ><B>Fecha:</B> {{ $registeractivities[0]->dateRegisterActivities }}</td>
                        <td colspan="6" ><B>Mail Contacto:</B> {{ $registeractivities[0]->companies->emailCompany }}</td>
                    </tr>
                    <tr>
                        <td colspan="11" ><B>Consultor:</B> {{ $registeractivities[0]->consultants->nameConsultant }}</td>
                    </tr>
                    
                    <tr>
                        <td colspan="11"></td>
                    </tr>

                </thead>
                <tbody>
                    <tr class="text-white bg-dark">
                        <td colspan="3">Usuarios</td>
                        <td colspan="3">Actividad</td>
                        <td colspan="3">Descripción</td>
                        <td colspan="2">Fecha</td>
                    </tr>
                    @foreach($registeractivities as $registeractivity)
                    <tr>
                        <td colspan="3">{{ $registeractivity->businessuser->nameBusinessUser }}</td>
                        <td colspan="3">{{ $registeractivity->activities->nameActivity }}</td>
                        <td colspan="3">&nbsp; &nbsp;{{ $registeractivity->desRegisterActivity }}</td>
                        <td colspan="2">{{ $registeractivity->dateRegisterActivity }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="text-white bg-dark">
                        <td colspan="3">Usuarios</td>
                        <td colspan="3">Actividad</td>
                        <td colspan="3">Descripción</td>
                        <td colspan="2">Fecha</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-md-1"></div>
        </div>

</body>

</html>