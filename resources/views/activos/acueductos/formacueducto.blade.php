<div class="row form-group mt-3">
    <div class="col">
        <label for="nombre_acueducto">Nombre:</label>
        <input type="text" name="nombre_acueducto" class="form-control" id="nombre_acueducto" placeholder="Nombre..."
            value="{{ old('nombre_acueducto', $acueducto->nom_acu ?? '') }}">
    </div>

    <div class="col">
        <label for="fuente_abast">Fuente de abastecimiento</label>
        <input type="text" name="fuente_abastecimiento" class="form-control" id="fuente_abast"
            placeholder="Fuente de abastecimiento..."
            value="{{ old('fuente_abastecimiento', $acueducto->fuente_abast ?? '') }}">
    </div>
</div>
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $acueducto->desc_acu ?? '') }}</textarea>
</div>
<div class="form-group">

    <div class="row">
        <div class="col">
            <label for="capacidad_produccion">Capacidad de Almacenamiento:</label>
            <input type="text" name="capacidad_produccion" class="form-control" id="capacidad_produccion"
                placeholder="capacidad de almacenamiento"
                value="{{ old('capacidad_produccion', $acueducto->capacidad_almac ?? '') }}" step="any">
        </div>
        <div class="col">
            <label for="tiempo_operacion">Tiempo de operacion</label>
            <input type="number" name="tiempo_operacion" class="form-control" id="tiempo_oper"
                placeholder="tiempo de operacion" value="{{ old('tiempo_operacion', $acueducto->tiempo_oper ?? '') }}">
        </div>
        <div class="col">
            <label for="energia_util">Energia util</label>
            <input type="text" name="energia_util" class="form-control" id="energia_util" placeholder="energia util"
                value="{{ old('energia_util', $acueducto->energia_util ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="modelo_planta">Modelo de planta</label>
            <select class="custom-select" name="modelo_planta" aria-label="">
                <option value="" @if (old('modelo_planta') === null && !isset($acueducto->modelo_planta)) selected @endif disabled>Seleccionar Modelo de
                    planta</option>
                @foreach ($modelosplanta as $modeloplanta)
                    <option value="{{ $modeloplanta->id }}"
                        {{ (old('modelo_planta') && old('modelo_planta') == $modeloplanta->id) || (isset($acueducto->modelo_planta) && $acueducto->modelo_planta == $modeloplanta->id) ? 'selected' : '' }}>
                        {{ $modeloplanta->concepto }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="gerencia">Gerencia</label>
            <select class="custom-select" name="gerencia" aria-label="">
                <option value="" @if (old('gerencia') === null && !isset($acueducto->id_gerencia)) selected @endif disabled>Seleccionar Gerencia
                </option>
                @foreach ($gerencias as $gerencia)
                    <option value="{{ $gerencia->id_gerencia }}"
                        {{ (old('gerencia') && old('gerencia') == $gerencia->id_gerencia) || (isset($acueducto->id_gerencia) && $acueducto->id_gerencia == $gerencia->id_gerencia) ? 'selected' : '' }}>
                        {{ $gerencia->nombre_gerencia }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="form-group">
    <label for="ubicacion">Ubicacion</label>
    <select class="custom-select" name="ubicacion" aria-label="">
        <option value="" @if (old('ubicacion') === null && !isset($acueducto->cod_ubi)) selected @endif disabled>Selecionar Ubicacion
        </option>
        @foreach ($localidades as $localidad)
            <option value="{{ $localidad->codubi }}"
                {{ (old('ubicacion') && old('ubicacion') == $localidad->codubi) || (isset($acueducto->cod_ubi) && $acueducto->cod_ubi == $localidad->codubi) ? 'selected' : '' }}>
                {{ $localidad->desubi }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group pt-2">
    <a href="{{ route('acueductos.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
