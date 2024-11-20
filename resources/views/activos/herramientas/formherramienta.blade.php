<div class="form-group">
    <label for="nombre_herramienta">Nombre de la herramienta</label>
    <input type="text" name="nombre_herramienta" class="form-control" id="nombre_herramienta" placeholder="nombre"
        value="{{ old('nombre_herramienta', $herramienta->nombre_herramienta ?? '') }}">
</div>
<div class="form-group">
    <label for="id_grupo_herramienta">Grupo</label>
    <select class="custom-select" name="id_grupo_herramienta" id="id_grupo_herramienta" aria-label="">
        <option value="" @if (old('id_grupo_herramienta') === null && !isset($herramienta->id_grupo_herramienta)) selected @endif >
            Selecionar Grupo de herramienta</option>
        @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id_grupo_herramienta }}"
                {{ (old('id_grupo_herramienta') && old('id_grupo_herramienta') == $herramienta->id_grupo_herramienta) || (isset($herramienta->id_grupo_herramienta) && $herramienta->id_grupo_herramienta == $grupo->id_grupo_herramienta) ? 'selected' : '' }}>
                {{ $grupo->nombre_grupo }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group pt-2">
    <a href="{{ route('herramientas.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
