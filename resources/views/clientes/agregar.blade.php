@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
<style>
    .card-body{
        background: transparent;
        backdrop-filter: blur(30px);
        box-shadow: 0 0 10px rbga(0, 0, 0, 0.5);
       
    }
    .btn{
    font-weight: bold;
      font-family: "Roboto", sans-serif;
      font-size:10px;
      text-transform: uppercase;
      outline: 0;
      width: auto;
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
    label{
        color:black;
    }
</style>
<div class="card-body">

    <form action="{{route('personas.store')}}" method="post" class="mt-5 border rounded-3 p-5" enctype="multipart/form-data">
        @csrf
        <legend style="color:white">NUEVO CLIENTE</legend>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="N° cedula" name="dni" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="1er Apellido" name="paterno" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="2do Apellido" name="materno" required>
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="Fnacimiento" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Edad" name="edad" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <label class="foto" for="imagen" style="color:white">Agregar foto</label><br>
            <input type="file" name="imagen" id="imagen" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary" style="color:white"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('personas.dashboard')}}" class="btn btn-success">Cancelar</a>
    </form> 
</div>
@endsection
