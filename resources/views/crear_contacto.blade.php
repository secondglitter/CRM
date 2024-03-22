@extends('plantilla')

@section('contenido')
    <br><br>
    <div class="formulario">
        <form class="form" method="POST" action="{{ route('contacto.store') }}">
            @csrf
            <p class="title">Creacion de contacto </p>
            <label>
                <input class="input" type="text" name="nombre" id="nombre">
                <span for="nombre">Nombre</span>
                @error('nombre')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </label>
            <label>
                <input class="input" type="email" name="correo_electronico" id="correo_electronico">
                <span for="correo_electronico">Correo</span>
                @error('correo_electronico')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </label>
            <label>
                <input class="input" type="text" name="telefono" id="telefono">
                <span for="telefono">Telefono</span>
                @error('telefono')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </label>
            <label>
                <input class="input" type="text" name="empresa" id="empresa">
                <span for="empresa">Empresa</span>
                @error('empresa')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </label>
            <button class="submit">Crear</button>
        </form>

    </div>
@endsection
