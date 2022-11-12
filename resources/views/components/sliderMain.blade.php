<div class="carousel">
    <div class="carousel__contenedor">
        <div class="carousel__lista">
            @foreach($slider as $img)
            <div class="carousel__elemento">
                <img loading="lazy" src="{{ Storage::url($img->nombre_img) }}" alt="{{ $img->descripcion }}">
            </div>
            @endforeach
        </div>
        <button aria-label="Prvious" class="carousel__anterior">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button aria-label="Next" class="carousel__siguiente">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div role="tablist" class="carousel__indicadores"></div>
    </div>
</div>
