<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre..."
        value="{{ old('nombre', $marca->nombre_marca ?? '') }}">
</div>

<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $marca->descripcion_marca ?? '') }}</textarea>

</div>

<div class="form-group pt-2">
    <a href="{{ route('marca.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>