@extends('layouts/layoutAdmin')

@section('title', 'Pendientes de envío')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noenviados.css') }}">
@endsection

@section('contenido')
    <div class="contenedor">
        <h1 id="iniciar">Pedidos pendientes de envío</h1>
        <div class="contenedor-tabla">
            <div class="card">
                <span class="pedido">Pedido # 1</span>
                <span class="fecha">24/05/2020</span>
                <span class="nom_cliente">Jenny Marcela Santamaría Rincón</span>
                <span class="direccion">Calle 44 #1 Occidente 68</span>
                <span class="especificacion">conjunto la arbolta apartamnto 304</span>
                <span class="ciudad"> Bucaramanga</span>
                <span class="departamento">Santander, </span>
                <span class="telefono">3204877763</span>
                <div class="btn-detalle"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-clipboard-list"></i></a></div>
                <div class="btn-modificar"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-edit"></i></a></div>
            </div>
            <div class="card">
                <span class="pedido">Pedido # 1</span>
                <span class="fecha">24/05/2020</span>
                <span class="nom_cliente">Jenny Marcela Santamaría Rincón</span>
                <span class="direccion">Calle 44 #1 Occidente 68</span>
                <span class="especificacion">conjunto la arbolta apartamnto 304</span>
                <span class="ciudad">Bucaramanga</span>
                <span class="departamento">Santander</span>
                <span class="telefono">3204877763</span>
                <div class="btn-detalle"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-clipboard-list"></i></a></div>
                <div class="btn-modificar"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-edit"></i></a></div>
            </div>
            <div class="card">
                <span class="pedido">Pedido # 1</span>
                <span class="fecha">24/05/2020</span>
                <span class="nom_cliente">Jenny Marcela Santamaría Rincón</span>
                <span class="direccion">Calle 44 #1 Occidente 68</span>
                <span class="especificacion">conjunto la arbolta apartamnto 304</span>
                <span class="ciudad">Bucaramanga</span>
                <span class="departamento">Santander</span>
                <span class="telefono">3204877763</span>
                <div class="btn-detalle"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-clipboard-list"></i></a></div>
                <div class="btn-modificar"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-edit"></i></a></div>
            </div>
            <div class="card">
                <span class="pedido">Pedido # 1</span>
                <span class="fecha">24/05/2020</span>
                <span class="nom_cliente">Jenny Marcela Santamaría Rincón</span>
                <span class="direccion">Calle 44 #1 Occidente 68</span>
                <span class="especificacion">conjunto la arbolta apartamnto 304</span>
                <span class="ciudad">Bucaramanga</span>
                <span class="departamento">Santander</span>
                <span class="telefono">3204877763</span>
                <div class="btn-detalle"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-clipboard-list"></i></a></div>
                <div class="btn-modificar"><a data-nombre="nombr1" data-descuento="0.1" href=""><i
                            class="fas fa-edit"></i></a></div>
            </div>
        </div>
    </div>
@endsection
@section('contenido-modal')
    <div class="contenedor-tabla-modificar">
        <div class="tabla-modificar">
            <div class="cerrar">
                <i class="fas fa-times cerrar__item"></i>
            </div>
            <div class="tabla-main">
                <div class="itm">
                    <div class="icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <label for="datos" class="datos titulo">Modificar</label>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Identificador</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nombre-cupon" class="form-input" placeholder="" id="nombre" disabled>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Cliente</label>
                    </div>
                    <div class="itm__datos">
                        <input type="number" id="descuento-cupon" class="form-input" placeholder="Ej: 0.3" id="nombre"
                            disabled>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Número de seguimiento</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nombre-cupon" class="form-input" placeholder="" id="nombre">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Estado del pedido</label>
                    </div>
                    <div class="itm__datos">
                        <select name="" id="" class="form-input">
                            <option value="">No enviado</option>
                            <option value="">Enviado</option>
                        </select>
                    </div>
                </div>
                <div class="contenedor-btn">
                    <button class="agg-btn">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedor-tabla-detalle">
        <div class="tabla-detalle">
            <div class="cerrar">
                <i class="fas fa-times cerrar__item cerrar_detalle"></i>
            </div>
            <div class="tabla-main">
                <div class="itm tabla-main__detalle">
                    <label class="titulo"><i class="fas fa-edit"></i> Detalle pedido #0001</label>
                    <label class="cliente">Jenny Marcela Santamaría Rincón</label>
                </div>
                <div class="menu-content">
                    <div class="menu-content__scroll">
                        <ul class="pedido-contenido__lista">
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}" alt="accesorios">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}" alt="accesorios">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}" alt="accesorios">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                            <li class="pedido-contenido__item">
                                <div class="pedido-contenido__item__img">
                                    <img src="{{ Storage::url('images/admin/slider6.jpg') }}" alt="accesorios">
                                </div>
                                <div class="pedido-contenido__item__detalle">
                                    <span class="nombre-producto">Nombre Producto</span>
                                    <span class="refrencia-producto">Referencia: 00AA</span>
                                    <span class="talla-producto">Talla: S</span>
                                    <span class="cantidad-producto">Cantidad: 2</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>
@endsection
