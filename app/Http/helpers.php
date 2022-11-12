<?php
function isVisible($registro){
    return ($registro->trashed()) ? "fas fa-eye-slash" : "fas fa-eye";
}

function isPrioridad($prioridad,$i){
    return ($prioridad == $i) ? 'selected' : '';
}

function isEmpty($images){
    if(count($images)>0){
        return '<img class="imagen-producto" src="'.Storage::url($images[0]->nombre_imagen).'" alt="'.$images[0]->descripcion.'">';
    }
    else{
        return '<i class="fas fa-image"></i>';
    }
}

function visibleTallas($talla){
    return ($talla->estado == 'no disponible') ? "fas fa-eye-slash" : "fas fa-eye";
}
