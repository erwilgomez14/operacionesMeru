<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="id_acueducto">Acueducto:</label>
            <select class="custom-select" name="id_acueducto" id="id_acueducto" aria-label="">
                <option value="" @if (old('id_acueducto') === null && !isset($sistema->id_acueducto)) selected @endif disabled>
                    Selecionar Acueducto</option>
                @foreach ($acueductos as $acueducto)
                    <option value="{{ $acueducto->id_acueducto }}"
                        {{ (old('id_acueducto') && old('id_acueducto') == $acueducto->id_acueducto) || (isset($sistema->id_acueducto) && $sistema->id_acueducto == $acueducto->id_acueducto) ? 'selected' : '' }}>
                        {{ $acueducto->nom_acu }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="id_sistema">ID del Sistema:</label>
            <input type="text" name="id_sistema" class="form-control" id="id_sistema" placeholder="id del sistema"
                value="{{ old('id_sistema', $sistema->id_sistema ?? '') }}" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nom_sistema">Nombre:</label>
    <input type="text" name="nom_sistema"class="form-control" id="nom_sistema" placeholder="nombre sistema"
        value="{{ old('nom_sistema', $sistema->nom_sistema ?? '') }}">
</div>
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $sistema->desc_sistema ?? '') }}</textarea>
</div>

<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="posiciones">Posiciones:</label>
            <input type="number" name="posiciones" class="form-control" id="posiciones" placeholder="posiciones"
                value="{{ old('posiciones', $sistema->posiciones ?? '') }}">
        </div>
        <div class="col">
            <label for="posicion_necesaria">Posicion Necesaria</label>
            <input type="number" name="posicion_necesaria" class="form-control" id="posicion_necesaria"
                placeholder="Posicion Necesaria"
                value="{{ old('posicion_necesaria', $sistema->posicion_necesaria ?? '') }}">
        </div>
        <div class="col">
            <label for="capacidad_sistema">Capacidad de Sistema</label>
            <input type="number" name="capacidad_sistema" class="form-control" id="capacidad_sistema"
                placeholder="Capacidad de Sistema"
                value="{{ old('capacidad_sistema', $sistema->capacidad_sistema ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">

</div>
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label for="id_area">Proceso</label>
            <select class="custom-select" name="id_area" aria-label="">
                <option value="" @if (old('id_area') === null && !isset($sistema->id_area)) selected @endif disabled>
                    Selecionar Proceso</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id_area }}"
                        {{ (old('id_area') && old('id_area') == $area->id_area) || (isset($sistema->id_area) && $sistema->id_area == $area->id_area) ? 'selected' : '' }}>
                        {{ $area->descripcion_area }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="georeferencia">Georeferencia</label>
            <input type="text" name="georeferencia" class="form-control" id="georeferencia"
                placeholder="Georeferencia"
                value="{{ old('georeferencia', $sistema->georeferencia ?? '') }}">
            {{-- <textarea class="form-control" aria-label="With textarea" name="georeferencia" placeholder="georeferencia...">{{ old('georeferencia', $sistema->georeferencia ?? '') }}</textarea> --}}

        </div>
    </div>
</div>
<div class="form-group">
    <label for="ubicacion">Ubicacion</label>
    {{-- <input type="text" name="ubicacion" class="form-control" id="ubicacion"
                placeholder="ubicacion" value="{{ old('ubicacion', $sistema->ubicacion ?? '') }}"> --}}
    <textarea class="form-control" aria-label="With textarea" name="ubicacion" placeholder="ubicacion...">{{ old('ubicacion', $sistema->ubicacion ?? '') }}</textarea>
</div>

<div class="form-group pt-2">
    <a href="{{ route('sistemas.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
