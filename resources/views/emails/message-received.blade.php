<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $mensaje['name'] }}</p>
    <p>su correo electrónico es: {{ $mensaje['email'] }}</p>
    <small>su mensaje:<br>{{ $mensaje['content'] }}</small>
</body>
</html>
