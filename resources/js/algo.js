const message = document.getElementById('message');
document.addEventListener('DOMContentLoaded', () => {
    if (message != null) {
        document.getElementById('close-message').addEventListener('click', () => {
            message.classList.add('inactive');
        })
        setTimeout(function() {
            message.classList.add('inactive');
        }, 50000);
    }
})

// CONFIRMACION ELIMINACION//
function alerta() {
    var opcion = confirm("¿Desea eliminar este registro?");
    if (opcion == true) {
        mensaje = "Aceptar";
    } else {
        mensaje = "Cancelar";
    }
}

// let eliminarimg = document.querySelectorAll('.eliminar');
// for (el of Array.from(eliminarimg)) {
//     el.addEventListener('click', alerta);
// }

// let eliminardato = document.querySelectorAll('.fa-trash-alt');
// for (eli of Array.from(eliminardato)) {
//     eli.addEventListener('click', alerta);
// }




if (document.baseURI.includes("admin/agregarProducto")) {
    const list = document.getElementById('list');
    const newElement = document.createElement('li');
    // newElement.textContent = "dsfad"
    list.appendChild(newElement)

    function agregar_mas_imagenes() {
        const list = document.getElementById('list');
        const fragment = document.createDocumentFragment();
        const li = document.createElement('li');
        const div1 = document.createElement('div');
        const div2 = document.createElement('div');
        const div3 = document.createElement('div');
        const input = document.createElement('input');
        const icon = document.createElement('i');
        div1.classList.add('itm');

        div2.classList.add('subir-imagen');

        div3.classList.add('menos');
        div3.addEventListener('click', () => {
            list.removeChild(li);
        })

        icon.classList.add('fas');
        icon.classList.add('fa-minus-circle');

        input.classList.add('subir');
        input.name = `archivo${document.querySelectorAll('.subir').length}`;
        input.type = "file";

        div2.appendChild(input);
        div3.appendChild(icon);
        div1.appendChild(div2);
        div1.appendChild(div3);
        li.appendChild(div1);
        fragment.appendChild(li);
        list.appendChild(fragment);

    }
    let masimg = document.getElementById("mas");
    masimg.addEventListener('click', agregar_mas_imagenes);
}

if (document.baseURI.includes("/admin/cupones")) {
    let modificar = document.querySelectorAll('.btn-modificar');
    let contenedor = document.querySelector('.contenedor-tabla-modificar');
    for (modifica of Array.from(modificar)) {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('nuevo-nombre').value = e.target.parentElement.getAttribute('data-nombre');
            document.getElementById('nuevo-descuento').value = e.target.parentElement.getAttribute('data-descuento');
            document.getElementById('id').value = e.target.parentElement.getAttribute('data-id');
            contenedor.classList.add('open-modifica');

        })
    }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        contenedor.classList.remove('open-modifica');
    })
}
if (document.baseURI.includes("/admin/modificarProducto")) {
    // let modprod = document.querySelectorAll('.btn-modificar');
    // let conprod = document.querySelector('.contenedor-tabla-modificar');
    // for (modifica of Array.from(modprod)) {
    //     modifica.addEventListener('click', (e) => {
    //         e.preventDefault();
    document.getElementById('nueva-referencia').value = e.target.parentElement.getAttribute('data-referencia');
    document.getElementById('nuevo-nombre').value = e.target.parentElement.getAttribute('data-nombre');
    document.getElementById('nuevo-precio').value = e.target.parentElement.getAttribute('data-precio');
    document.getElementById('nueva-coleccion').value = e.target.parentElement.getAttribute('data-coleccion');
    document.getElementById('nueva-categoria').value = e.target.parentElement.getAttribute('data-categoria');
    document.getElementById('editor').textContent = e.target.parentElement.getAttribute('data-descripcion');
    document.getElementById('editor').value = e.target.parentElement.getAttribute('data-descripcion');
    document.querySelector('.cke_editable').innerHTML = e.target.parentElement.getAttribute('data-descripcion');
    //         // alert(e.target.parentElement.getAttribute('data-descripcion'));
    //         // alert(document.getElementById('editor').textContent);
    //         // var editorElement = CKEDITOR.document.getById('editor');
    //         // editorElement.setHtml(e.target.parentElement.getAttribute('data-descripcion'));
    //     })
    // }
    // document.querySelector('.cerrar__item').addEventListener('click', () => {
    //     conprod.classList.remove('open-modifica');
    // })
}
if (document.baseURI.includes("/admin/talla")) {
    let modtalla = document.querySelectorAll('.btn-modificar');
    let contalla = document.querySelector('.contenedor-tabla-modificar');
    for (modifica of Array.from(modtalla)) {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('nuevo-nombre').value = e.target.parentElement.getAttribute('data-nombre');
            document.getElementById('id').value = e.target.parentElement.getAttribute('data-id');
            contalla.classList.add('open-modifica');
        })
    }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        contalla.classList.remove('open-modifica');
    })
}
if (document.baseURI.includes("/admin/stock")) {
    let modstock = document.querySelectorAll('.btn-modificar');
    let constock = document.querySelector('.contenedor-tabla-modificar');
    const referencia = document.getElementById('referencia');
    const referenciaP = document.getElementById('referenciaP');
    const producto = document.getElementById('producto');
    const nombreTalla = document.getElementById('nombre-talla');
    const idTalla = document.getElementById('id-talla');
    const cantidadStock = document.getElementById('cantidad-stock');
    modstock.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            referencia.textContent = btn.getAttribute('data-referencia');
            producto.textContent = btn.getAttribute('data-producto');
            nombreTalla.textContent = btn.getAttribute('data-nombre-talla');
            idTalla.value = btn.getAttribute('data-id-talla');
            referenciaP.value = btn.getAttribute('data-referencia');
            cantidadStock.value = btn.getAttribute('data-cantidad-stock');
            constock.classList.add('open-modifica');
        })
    })
    cantidadStock.addEventListener('change', (e) => {
        if (e.target.value < 0) {
            e.preventDefault()
            cantidadStock.value = 0;
        }
    })
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        constock.classList.remove('open-modifica');
    })
}
if (document.baseURI.includes("/admin/masVendidos")) {
    let more = document.querySelectorAll('.btn-more');
    let cont = document.querySelector('.contenedor-tabla-more');
    for (moreinfo of Array.from(more)) {
        moreinfo.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(e);
            cont.classList.add('open-more');
        })
    }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        cont.classList.remove('open-more');
    })
}
if (document.baseURI.includes("/admin/gestionarTalla")) {
    let modif = document.querySelectorAll('.btn-modificar');
    let contenedor1 = document.querySelector('.contenedor-tabla-modificar');
    const idprod = document.getElementById('id-prod');
    const ref = document.getElementById('referencia');
    const nombre = document.getElementById('nombre');
    const imagen = document.getElementById('guia');
    modif.forEach(modifica => {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            idprod.value = modifica.getAttribute('data-id');
            ref.textContent = modifica.getAttribute('data-id');
            imagen.src = "/storage/" + modifica.getAttribute('data-imagen');
            imagen.alt = modifica.getAttribute('data-nombre');
            nombre.textContent = modifica.getAttribute('data-nombre');
            contenedor1.classList.add('open-modifica');
        })
    })
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        contenedor1.classList.remove('open-modifica');
    })
}
if (document.baseURI.includes("/admin/categoria")) {
    let modi = document.querySelectorAll('.btn-modificar');
    let conte = document.querySelector('.contenedor-tabla-modificar');
    const idcat = document.getElementById('id-cat');
    modi.forEach(modifica => {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            idcat.value = modifica.getAttribute('data-id');
            document.getElementById('descripcion-img').value = e.target.parentElement.getAttribute('data-descripcion');
            document.getElementById('nuevo-nombre').value = e.target.parentElement.getAttribute('data-nombre');
            conte.classList.add('open-modifica');
        })
    })
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        conte.classList.remove('open-modifica');
    })
}

if (document.baseURI.includes("/admin/coleccion")) {
    let modif = document.querySelectorAll('.btn-modificar');
    let contene = document.querySelector('.contenedor-tabla-modificar');
    const idcol = document.getElementById('id-col');
    modif.forEach(modifica => {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            idcol.value = modifica.getAttribute('data-id');
            document.getElementById('descripcion-img').value = e.target.parentElement.getAttribute('data-descripcion');
            document.getElementById('nuevo-nombre').value = e.target.parentElement.getAttribute('data-nombre');
            //alert(e.target.parentElement.getAttribute('data-fecha'));
            document.getElementById('nueva-fecha').value = e.target.parentElement.getAttribute('data-fecha');
            contene.classList.add('open-modifica');
        })
    })
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        contene.classList.remove('open-modifica');
    })
}
if (document.baseURI.includes("/admin/noEnviados")) {
    let modenvio2 = document.querySelectorAll('.btn-modificar');
    let detalle2 = document.querySelectorAll('.btn-detalle');
    let contmod2 = document.querySelector('.contenedor-tabla-modificar');
    let contdet2 = document.querySelector('.contenedor-tabla-detalle');
    for (modifica of Array.from(modenvio2)) {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(e);
            contmod2.classList.add('open-modifica');
        })
    }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        contmod2.classList.remove('open-modifica');
    })
    for (det of Array.from(detalle2)) {
        det.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(e);
            contdet2.classList.add('open-detalle');
        })
    }
    document.querySelector('.cerrar_detalle').addEventListener('click', () => {
        contdet2.classList.remove('open-detalle');
    })
}
if (document.baseURI.includes("/admin/pedidos")) {
    let morei = document.querySelectorAll('.btn-more');
    let con = document.querySelector('.contenedor-tabla-more');
    for (moreinfo of Array.from(morei)) {
        moreinfo.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(e);
            con.classList.add('open-more');
        })
    }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        con.classList.remove('open-more');
    })
}
if (document.baseURI.includes("/admin/slider")) {
    let modimg = document.querySelectorAll('.overlay-modificar');
    let content = document.querySelector('.contenedor-tabla-modificar');
    let contentsubir = document.querySelector('.contenedor-tabla-subir');
    let subimg = document.querySelector('.upload');
    const pathName = document.getElementById('path-image');

    modimg.forEach(modifica => {
        modifica.addEventListener('click', (e) => {
            e.preventDefault();
            pathName.value = modifica.getAttribute('data-path');
            content.classList.add('open-modifica');
        })
    })

    // for (modifica of Array.from(modimg)) {
    //     modifica.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         pathName.value = modifica.getAttribute('data-path');
    //         content.classList.add('open-modifica');
    //     })
    // }

    document.querySelector('.cerrar__item').addEventListener('click', () => {
            content.classList.remove('open-modifica');
        })
        // for (subir of Array.from(subimg)) {
        //     subir.addEventListener('click', (a) => {
        //         a.preventDefault();
        //         console.log(a);
        //         contentsubir.classList.add('open-modifica');
        //     })
        // }

    subimg.addEventListener('click', (a) => {
        a.preventDefault();
        contentsubir.classList.add('open-modifica');
    })

    document.querySelector('.cerrar__subir').addEventListener('click', () => {
        contentsubir.classList.remove('open-modifica');

    })
}
if (document.baseURI.includes("/admin/imagenProducto")) {
    let modimgprod = document.querySelectorAll('.overlay-modificar');
    let conimgprod = document.querySelector('.contenedor-tabla-modificar');
    let conimgsubir = document.querySelector('.contenedor-tabla-subir');
    let subimgprod = document.querySelector('.upload');
    const pathname = document.getElementById('path-image');
    modimgprod.forEach(modifica => {
            modifica.addEventListener('click', (e) => {
                e.preventDefault();
                pathname.value = modifica.getAttribute('data-path');
                conimgprod.classList.add('open-modifica');
            })
        })
        // for (modifica of Array.from(modimgprod)) {
        //     modifica.addEventListener('click', (e) => {
        //         e.preventDefault();
        //         console.log(modifica);
        //         console.log(modifica.getAttribute('data-path'));
        //         pathName.value = modifica.getAttribute('data-path');
        //         conimgprod.classList.add('open-modifica');
        //     })
        // }
    document.querySelector('.cerrar__item').addEventListener('click', () => {
        conimgprod.classList.remove('open-modifica');
    })
    subimgprod.addEventListener('click', (a) => {
            a.preventDefault();
            conimgsubir.classList.add('open-modifica');
        })
        // for (subir of Array.from(subimgprod)) {
        //     subir.addEventListener('click', (a) => {
        //         a.preventDefault();
        //         console.log(a);
        //         conimgsubir.classList.add('open-modifica');
        //     })
        // }
    document.querySelector('.cerrar__subir').addEventListener('click', () => {
        conimgsubir.classList.remove('open-modifica');
    })

    //prioridad
    const selects = document.querySelectorAll('.select-prioridad');
    selects.forEach(select => {
            select.addEventListener('change', () => {
                let valorP = select.getAttribute('data-value');
                select.setAttribute('data-value', select.value);
                document.getElementById('P' + select.getAttribute('data-select')).value = select.value;
                for (item of Array.from(selects)) {
                    if (item.value == select.value && item != select) {
                        item.setAttribute('data-value', valorP);
                        item.value = valorP;
                        document.getElementById('P' + item.getAttribute('data-select')).value = valorP;
                        break;
                    }
                }
            })
        })
        //enviar formulario
    if (document.getElementById('modificar-prioridad') != null) {
        document.getElementById('modificar-prioridad').addEventListener('click', () => {
            document.formPrioridad.submit();
        })
    }
}