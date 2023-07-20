<div class="row form-group mt-3">
    <div class="col">
        <label for="id_sistema">Sistema</label>
        <select class="custom-select" name="id_sistema" id="id_sistema" aria-label="">
            <option value="" @if (old('id_sistema') === null && !isset($subsistema->id_sistema)) selected @endif disabled>
                Selecionar Sistema</option>
            @foreach ($sistemas as $sistema)
                <option value="{{ $sistema->id_sistema }}"
                    {{ (old('id_sistema') && old('id_sistema') == $sistema->id_sistema) || (isset($subsistema->id_sistema) && $subsistema->id_sistema == $sistema->id_sistema) ? 'selected' : '' }}>
                    {{ $sistema->nom_sistema }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label for="id_subsistema">ID del SubSistema:</label>
        <input type="text" name="id_subsistema" class="form-control" id="id_subsistema"
            placeholder="id del subsistema" value="{{ old('id_subsistema', $subsistema->id_subsistema ?? '') }}"
            readonly>
    </div>

</div>
<div class="row form-group">
    <div class="col-6">
        <label for="nombre_subsistema">Nombre del SubSistema:</label>
        <input type="text" name="nombre_subsistema" class="form-control" id="nombre_subsistema"
            placeholder="nombre del subsistema"
            value="{{ old('nombre_subsistema', $subsistema->nombre_subsistema ?? '') }}">
    </div>
    <div class="col-3">
        <label for="capacidad_subsistema">Capacidad del SubSistema:</label>
        <input type="number" name="capacidad_subsistema" class="form-control" id="capacidad_subsistema"
            placeholder="capacidad del subsistema"
            value="{{ old('capacidad_subsistema', $subsistema->capacidad_subsistema ?? '') }}">
    </div>
    <div class="col-3">
        <label for="id_estatus">Estatus</label>
        <select class="custom-select" name="id_estatus" id="id_estatus" aria-label="">
            <option value="" @if (old('id_estatus') === null && !isset($subsistema->id_estatus)) selected @endif disabled>
                Selecionar Estatus</option>
            @foreach ($estatus as $estatu)
                <option value="{{ $estatu->id_estatus }}"
                    {{ (old('id_estatus') && old('id_estatus') == $estatu->id_estatus) || (isset($subsistema->id_estatus) && $subsistema->id_estatus == $estatu->id_estatus) ? 'selected' : '' }}>
                    {{ $estatu->nombre_estatus }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row form-group">
    <div class="col">
        <label for="desc_subsistema">Descripcion del SubSistema:</label>
        <textarea class="form-control" aria-label="With textarea" name="desc_subsistema" placeholder="Descripcion...">{{ old('desc_subsistema', $subsistema->desc_subsistema ?? '') }}</textarea>
    </div>
    <div class="col">
        <label for="observacion">Observacion:</label>
        <textarea class="form-control" aria-label="With textarea" name="observacion" placeholder="Observacion...">{{ old('observacion', $subsistema->observacion ?? '') }}</textarea>
    </div>
</div>

<div class="form-group pt-2">
    <a href="{{ route('subsistemas.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
