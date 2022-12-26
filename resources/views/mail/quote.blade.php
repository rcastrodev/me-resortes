<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
        @isset($data['compania'])
            <p><strong>Empresa:</strong> {{ $data['compania'] }}</p>
        @endisset
        @isset($data['tipo'])
            <p><strong>Tipo:</strong> {{ $data['tipo'] }}</p>
        @endisset
        @isset($data['tipo_de_alambre'])
            <p><strong>Tipo de alambre:</strong> {{ $data['tipo_de_alambre'] }}</p>
        @endisset
        @isset($data['diametro_de_alambre'])
            <p><strong>Diámetro de alambre (mm):</strong> {{ $data['diametro_de_alambre'] }}</p>
        @endisset
        @isset($data['diametro_exterior'])
            <p><strong>Diámetro exterior (mm):</strong> {{ $data['diametro_exterior'] }}</p>
        @endisset
        @isset($data['diametro_interior'])
            <p><strong>Diámetro interior (mm):</strong> {{ $data['diametro_interior'] }}</p>
        @endisset
        @isset($data['largo'])
            <p><strong>Largo (mm):</strong> {{ $data['largo'] }}</p>
        @endisset
        @isset($data['ganchos'])
            <p><strong>Ganchos:</strong> {{ $data['ganchos'] }}</p>
        @endisset
        @isset($data['terminacion'])
            <p><strong>Terminación:</strong> {{ $data['terminacion'] }}</p>
        @endisset
        @isset($data['tratamiento_superficial'])
            <p><strong>Tratamiento superficial:</strong> {{ $data['tratamiento_superficial'] }}</p>
        @endisset
        @isset($data['numero_espiras_totales'])
            <p><strong>Numero de espiras totales:</strong> {{ $data['numero_espiras_totales'] }}</p>
        @endisset
        @isset($data['numero_espiras_utiles'])
            <p><strong>Número de espiras útiles:</strong> {{ $data['numero_espiras_utiles'] }}</p>
        @endisset
        @isset($data['paso'])
            <p><strong>Paso:</strong> {{ $data['paso'] }}</p>
        @endisset
        @isset($data['longitud_de_pata'])
            <p><strong>Longitud de pata:</strong> {{ $data['longitud_de_pata'] }}</p>
        @endisset
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
</body>
</html>