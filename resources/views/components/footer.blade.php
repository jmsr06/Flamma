<footer class="footer">
    <div class="descripcion">
        <h2>Si no quema, no es Arte</h2>
    </div>
    <div class="horario">
        <h2>HORARIOS DE ATENCIÓN</h2>
        <p>Lunes a sábado</p>
        <p>9:00 am - 7:00 pm</p>
        <p>Domingos y festivos no hay atención</p>
    </div>
    <div class="nosotros">
        <h2>NOSOTROS</h2>
        <p><a href="{{ route('about') }}">About us</a></p>
        <p>Email: flamma@flammashop.com</p>
        {{-- <p><a href="{{ route('condiciones') }}">Términos y condiciones</a></p>
        <p><a href="{{ route('politicas') }}">Política de datos</a></p> --}}
    </div>
    <div class="img-contenedor">
        <a href="{{ route('about') }}" class="img-contenedor__llama"><img loading="lazy" src="{{ Storage::url('images/llama.png') }}" alt="icono de la empresa flamma"></a>
    </div>
    <div class="pasarela"><img loading="lazy" src="{{ Storage::url('images/payu.png') }}" alt="pasarela de pago payu"></div>
    <div class="redes">
        <a class="instagram" target="_blank" href="https://www.instagram.com/___flamma___/"><i class="fab fa-instagram"></i></a>
        <a class="facebook" target="_blank" href="https://www.facebook.com/flamma0"><i class="fab fa-facebook-f"></i></a>
        <a class="whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=573187251299&amp;text=¡Hola!"><i class="fab fa-whatsapp"></i></a>
        <a class="tumblr" target="_blank" href="https://666flamma666.tumblr.com/"><i class="fab fa-tumblr"></i></i></a>
    </div>
    <div class="derechos">
        <div class="reservados">
            <i class="fas fa-copyright"></i> Copyright 2020<span> flamma </span>todos los derechos reservados
        </div>
    </div>
</footer>
