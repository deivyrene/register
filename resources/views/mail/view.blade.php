<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Adjunto Informe de Registro de Actividad</h2>
</br>
<div>
    <B>Empresa</B> : {{ $registerActivity[0]->companies->nameCompany }} 
</br>
    <B>Gerente</B> : {{ $registerActivity[0]->companies->attendantCompany  }} 
</br>
    <B>Fecha Informe</B> : {{ $registerActivity[0]->dateRegisterActivity }} 
</br>
    <B>Consultor para la actividad</B>  : {{ $registerActivity[0]->consultants->nameConsultant }} 
</div>

</body>
</html>