<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre..."
                value="{{ old('nombre', $modelo->nombre_modelo ?? '') }}">
        </div>
        <div class="col">

            <label for="id_marca">Marca</label>
            <select class="custom-select" name="id_marca" aria-label="">
                <option value="" @if (old('id_marca') === null && !isset($modelo->id_marca)) selected @endif disabled>Seleccionar Marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id_marca }}"
                        {{ (old('id_marca') && old('id_marca') == $marca->id_marca) || (isset($modelo->id_marca) && $modelo->id_marca == $marca->id) ? 'selected' : '' }}>
                        {{ $marca->nombre_marca }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $modelo->descripcion_modelo ?? '') }}</textarea>

</div>

<div class="form-group pt-2">
    <a href="{{ route('modelo.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
