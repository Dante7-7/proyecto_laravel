@extends ('layout.plantilla')

@section ('contenido')

<style>
        /* Estilo personalizado para el botón del dropdown */
.navlink{
    color: white;
}

/* Estilo personalizado para el botón del dropdown */

.dropdown {
            min-width: 80px;
            width: auto;
            height: 40px;
            text-align: center;
            text-decoration: none;
            font-weight: bolder;
            color: #110d17;
            background: #8b77b9;
            border: 2px solid #3f305c;
            border-radius: 10px;
            position: absolute;
            top: 10px;
            right: 25px;
            margin: 10px;
            display: flex;
            align-items: center;
            
        }

        .dropdown:hover {
            transition: 1s all ease-in-out;
            box-shadow: 0px 0px 10px #eeeaf4;
            background: #6d56a1;
            color: #110d17;
            border: 3px solid #110d17;
            border-radius: 10px;
        }

        .btna.dropdown-toggle {
            text-transform: uppercase; /* Convierte el texto a mayúsculas */
            font-family: 'Times New Roman', sans-serif; /* Cambia a tu fuente deseada */
            color: black !important;
            font-size: 16px;
            text-decoration: none; /* Sin subrayado */
        }

        .btna.dropdown-toggle:hover,
        .btna.dropdown-toggle:focus,
        .btna.dropdown-toggle:active {
            color:white !important;
        }
        .dropdown-menu{
            background: transparent;
            backdrop-filter: blur(20px);
            border:2px solid white ;
            

        }
        .conte-cerrar{
            background: transparent;
            
        }
        .dropdown-item{
            color:white;
            font-weight: bolder;
        }
        .dropdown-item:hover{
            background:  #8b77b9;
            color:white;
        }


/*final de dorpdown*/
.btn{
    font-weight: bold;
      font-family: "Roboto", sans-serif;
      font-size:10px;
      text-transform: uppercase;
      outline: 0;
      width: 12%;
      padding: 15px;
      text-align: center;
      font-weight: bolder;
      color: #110d17;
      background:  #8b77b9;
      border: 2px solid #3f305c;
      border-radius: 10px;
      position: relative;
      left: 1000px;
      top:-130px;
}

.btn:hover,.btn:active,.btn:focus {
      transition: 1s all ease-in-out;
      transform: scale(0.91,0.91);
      box-shadow: 0px 0px 10px #eeeaf4;
      background: #6d56a1;
      color: #110d17;
      border: 3px solid #110d17;
      border-radius: 10px;
    }
    .container {

            

            align-items: center; /* Alinea el contenido verticalmente al centro */
            
        }
    </style>

<div class="container">
        <img src="{{asset('img/logocat.png') }}" style="height:300px;">

        <div class="dropdown dropdown-container">
            <a class="btna dropdown-toggle btna" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" >
                <li class="conte-cerrar" >
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                    </form>
                </li>

            </ul>
            
        </div>

    </div>

<nav class="nav">
    <ul class="list">

        <li class="list__item">
            <div class="list__button">
                <img src="{{asset('icons/dashboard.svg')}}" class="list__img">
                <a href="#" class="nav__link">Inicio</a>
            </div>
        </li>

        <li class="list__item list__item--click">
            <div class="list__button list__button--click">
                <img src="{{asset('icons/docs.svg')}}" class="list__img">
                <a class="nav__link">Facturas</a>
                <img src="{{asset('icons/arrow.svg')}}" class="list__arrow">
            </div>

            <ul class="list__show">

                <li class="list__inside">
                    <a href="{{ route('facturas.crear') }}" class="nav__link nav__link--inside">Crear factura</a>
                </li>

                <li class="list__inside">
                    <a href="{{ route('facturas.index') }}" class="nav__link nav__link--inside">Listados de
                        facturas</a>
                </li>

            </ul>

        </li>

        <li class="list__item list__item--click">
            <div class="list__button list__button--click">
                <img src="{{asset('icons/productos.svg')}}" class="list__img">
                <a class="nav__link">Productos</a>
                <img src="{{asset('icons/arrow.svg')}}" class="list__arrow">
            </div>

            <ul class="list__show">
                <li class="list__inside">
                    <a href="{{ route('categorias.index') }}" class="nav__link nav__link--inside">Categorias</a>
                </li>

                <li class="list__inside">
                    <a href="{{ route('productos.index') }}" class="nav__link nav__link--inside">Crear Producto</a>
                </li>
            </ul>

        </li>

        <li class="list__item list__item--click">
            <div class="list__button list__button--click">
                <img src="{{asset('icons/compras.svg')}}" class="list__img">
                <a class="nav__link">Compras</a>
                <img src="{{asset('icons/arrow.svg')}}" class="list__arrow">
            </div>

            <ul class="list__show">

                <li class="list__inside">
                    <a href="{{ route('compras.crear') }}" class="nav__link nav__link--inside">Ingresar compra</a>
                </li>

                <li class="list__inside">
                    <a href="{{ route('compras.index') }}" class="nav__link nav__link--inside">listado de compra</a>
                </li>

            </ul>

        </li>


        <li class="list__item">
            <div class="list__button">
                <img src="{{asset('icons/inventario.svg')}}" class="list__img">
                <a href="{{ route('inventario.index') }}" class="nav__link">Inventario</a>
            </div>
        </li>

        <li class="list__item">
            <div class="list__button">
                <img src="{{asset('icons/customer.svg')}}" class="list__img">
                <a href="{{route('personas.clientes')}}" class="nav__link">Clientes</a>
            </div>
        </li>

        <li class="list__item">
            <div class="list__button">
                <img src="{{asset('icons/proveedor.svg')}}" class="list__img">
                <a href="{{ route('proveedores.index') }}" class="nav__link">Proveedores</a>
            </div>
        </li>

    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection
