@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
<style>
    .mt-5{
        background: transparent;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rbga(0, 0, 0, 0.5);
    border: 2px solid #ffffff;
    }
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
</style>
<div class="card-body">

    <form action="{{route('categorias.store')}}" method="post" class="mt-5 border rounded-3 p-5" enctype="multipart/form-data">
        @csrf
        <legend>AGREGAR UNA NUEVA CATEGORIA</legend>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
        </div>
        <button type="submit" class="btn"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('categorias.index')}}" class="btn">Cancelar</a>
    </form> 
</div>
@endsection
