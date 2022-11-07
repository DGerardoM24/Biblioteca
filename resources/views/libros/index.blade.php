@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{ url('libros/create') }}" class="btn btn-success">Nuevo Registro</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Clasifiación</th>
                    <th>Editorial</th>
                    <th>Año de Publicación</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $libros as $libro)
                <tr>
                    <td>{{ $libro->id_libro }}</td>
                    <td>{{ $libro->nombre_libro }}</td>
                    <td>{{ $libro->codigo }}</td>
                    <td>{{ $libro->id_clasificacion }}</td>
                    <td>{{ $libro->id_editorial }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>

                        <a href="{{ url('/libros/'.$libro->id_libro.'/edit') }}" class="btn btn-warning">Editar</a>
                        

                        <form action="{{ url('/libros/'.$libro->id_libro) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Quieres Borrar?')" value="Borrar" class="btn btn-danger">
                        </form>

                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{   $libros->links()  }}
    </div>
@endsection
