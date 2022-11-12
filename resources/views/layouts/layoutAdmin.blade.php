<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns/website#">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="canonical" href="https://www.flammashop.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#000">
    <meta name="format-detection" content="telephone=no">
    <!-- <meta name="format-detection" content="email=no">
    <meta name="format-detection" content="address=no"> -->
    <meta property="og:title" content="𝖋𝖑𝖆𝖒𝖒𝖆 | Colombia" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.flammashop.com/" />
    <meta property="og:image" content="https://www.flammashop.com/img/flammaShop.jpg" />
    <meta property="og:site_name" content="FLAMMA">
    <meta property="og:description" content="Si no quema, no es arte.">
    <meta property="fb:app_id" content="767525517379737">
    <meta name="twitter:title" content="𝖋𝖑𝖆𝖒𝖒𝖆 | Colombia">
    <meta name="twitter:description" content="Si no quema, no es arte.">
    <meta name="twitter:image" content="https://www.flammashop.com/img/flammaShop.jpg">
    <meta name="twitter:site" content="@#">
    <meta name="twitter:creator" content="@AlexisCceres14">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="description" content="Si no quema, no es arte. Somos talento colombiano desde el diseño hasta la confección siendo una comunidad de inspiración para todo aquel que la usa. Tenemos la mente joven y estamos siempre atentos a cada idea para el crecimiento de la marca esperamos que la gente se identifique y puedan ser ellos mismos">
    <meta name="author" content="Alexis Caceres & Jenny Santamaria">
    <meta name="keywords" content="FLAMMA,flammashop,ropa bucaramanga,www.flammashop.com,estilo,flammashop.com">
    <meta name="google-site-verification" content="j_g4tWxubCe5zQrKEWZfWd-1sUwg0ZL6Sre1vrZ2TAk">

    <link rel="shortcut icon" type="image/png" href="https://www.flammashop.com/img/llama.png">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}">

    <title>𝖋𝖑𝖆𝖒𝖒𝖆 | @yield('title')</title>

    <!--Css-->
    <link rel="stylesheet" href="{{ asset('css/normFont.css') }}">
    @yield('css')
    
    @yield('scriptHeader')
</head>
<body>
    <div class="contenedor1" id="contenedor1">
        @include('components/headerAdmin')
        @include('components/menuAdmin')
        @yield('contenido')
    </div>
    @yield('contenido-modal')
    

    <!--Script -->
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('scriptFooter')
</body>

</html>