<h1>{{ $modo }} Libro</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre_libro" value="{{ isset($libro->nombre_libro)?$libro->nombre_libro:old('nombre_libro') }}" id="Nombre">
</div>
<div class="form-group">
    <label for="Codigo">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($libro->codigo)?$libro->codigo:old('codigo') }}" id="Codigo">
</div>
<div class="form-group">
    <label for="Clasificacion">Clasificación</label>
    <input type="text" class="form-control" name="id_clasificacion" value="{{ isset($libro->id_clasificacion)?$libro->id_clasificacion:old('id_clasificacion') }}" id="Clasificacion">
</div>
<div class="form-group">
    <label for="Editorial">Editorial</label>
    <input class="form-control" type="text" name="id_editorial" value="{{ isset($libro->id_editorial)?$libro->id_editorial:old('id_editorial') }}" id="Editorial">
</div>
<div class="form-group">
    <label for="AnioPublicacion">Año Publicación</label>
    <input type="text" class="form-control" name="anio_publicacion" value="{{ isset($libro->anio_publicacion)?$libro->anio_publicacion:old('anio_publicacion') }}" id="AnioPublicacion">
</div>
<input type="submit" value="{{ $modo }}" class="btn btn-success">
<a href="{{ url('libros/') }}" class="btn btn-primary">Regresar</a>
<br>
