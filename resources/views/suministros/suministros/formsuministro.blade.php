<div class="row form-group mt-3">
    <div class="col">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre..."
            value="{{ old('nombre', $suministro->nombre_suministro ?? '') }}">
    </div>
    {{-- <div class="col">
        <label for="id_tarea">Tarea</label>
        <select class="custom-select" name="id_tarea" aria-label="">
            <option value="" @if (old('id_tarea') === null && !isset($suministro->id_tarea)) selected @endif disabled>Seleccionar Tarea</option>
            @foreach ($tareas as $tarea)
                <option value="{{ $tarea->id_tareas }}"
                    {{ (old('id_tarea') && old('id_tarea') == $tarea->id_tareas) || (isset($suministro->id_tarea) && $suministro->id_tarea == $tarea->id_tareas) ? 'selected' : '' }}>
                    {{ $tarea->tarea }}
                </option>
            @endforeach
        </select>
    </div> --}}

</div>
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $suministro->detalle_suministro ?? '') }}</textarea>
</div>

<div class="form-group pt-2">
    <a href="{{ route('suministros.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
