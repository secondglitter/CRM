@extends('plantilla')
@section('titulo')
    Agregar estudiante
@endsection
@section('contenido')
<br>
<h1 class="titulo">Contactos</h1>
@if (session()->has('exitoso'))
    <div class="text-center" style="color: green">
        {{session('exitoso')}}
    </div>
@endif

@if (session()->has('edit'))
    <div class="text-center" style="color: green">
        {{session('edit')}}
    </div>
@endif

@if (session()->has('delete'))
    <div class="text-center" style="color: green">
        {{session('delete')}}
    </div>
@endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Empresa</th>
                <th>Acción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacto as $contactos)
                <tr>
                    <td class="si">{{ $contactos->nombre }}</td>
                    <td class="si">{{ $contactos->correo_electronico }}</td>
                    <td class="si">{{ $contactos->telefono }}</td>
                    <td class="si">{{ $contactos->empresa }}</td>
                    <td> 
                        <a  href="{{route('contacto.edit', $contactos->id)}}"><button class="editar">Editar</button></a>
                    </td>
                    <td>
                        <form id="deleteForm" action="{{ route('contacto.destroy', $contactos->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este contacto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection