@extends('layouts/layout')

@section('title', 'About us')
@section('css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection
@section('contenido')
<main class="content_us">
    <div class="nosotros">
        <h1>ACERCA DE NOSOTROS</h1>

        <p>Creamos con el objetivo de inspirar a las personas a expresarse y encontrar su identidad.</p>
        <img loading="lazy" src="{{ Storage::url('images/us1.JPG')}}" alt="">
        <p>Somos talento colombiano desde el diseño hasta la confección siendo una
            comunidad de inspiración para todo aquel que la usa.
            Tenemos la mente joven y estamos siempre atentos a cada idea para el
            crecimiento de la marca, esperamos que la gente se identifique y puedan ser
            ellos mismos</p>
        <img loading="lazy" src="{{ Storage::url('images/us2.JPG')}}" alt="">
        <p>El streetwear nos da la posibilidad de crear sin ser enfocado a un genero, optando con prendas
            con actitud y sin restricciones. Tenemos un espíritu artesando donde las personas son lienzo
            y queremos que quien la use se sienta cómodo y a la vez pueda verse lujoso y sensacional.
        </p>
    </div>
</main>
@endsection
