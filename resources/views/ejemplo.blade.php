<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejemplo</title>
</head>
<body>
@php
$input = '<script>alert("Harmful Script");</script> <p style="a style" class="a-different-class">Test</p>';
@endphp
{!! Purify::clean($input) !!}
</body>
</html>
