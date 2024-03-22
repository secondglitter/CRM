@extends('plantilla')

@section('contenido')
    <br><br>
    <div class="formulario">
        <form class="form" action="{{route('contacto.update',$contacto->id)}}" method="POST">
            @csrf
            @method('put')
            <p class="title">Editar contacto </p>
            <label>
                <input class="input" type="text" name="nombre" id="nombre" value="{{ $contacto->nombre }}">
                <span for="nombre">Nombre</span>
            </label>
            <label>
                <input class="input" type="email" name="correo_electronico" id="correo_electronico" value="{{ $contacto->correo_electronico }}">
                <span for="correo_electronico">Correo</span>
            </label>
            <label>
                <input class="input" type="text" name="telefono" id="telefono" value="{{ $contacto->telefono }}">
                <span for="telefono">Telefono</span>
            </label>
            <label>
                <input class="input" type="text" name="empresa" id="empresa" value="{{ $contacto->empresa }}">
                <span for="empresa">Empresa</span>
            </label>
            <button class="submit">Actualizar</button>
        </form>

    </div>
@endsection
