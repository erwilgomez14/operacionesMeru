<div class="row form-group">
    <div class="col">
        <label for="id_subsistema" class="obligatorio">Subsistema:</label>
        <select class="custom-select" aria-label="" name="id_subsistema" id="id_subsistema" required>
            {{-- <option selected disabled>Selecciona un subsistema</option> --}}
            <option value="" @if (old('id_subsistema') === null && !isset($equipo->id_subsistema)) selected @endif disabled>
                Selecionar subsistema</option>
            @foreach ($subsistemas as $subsistema)
                {{-- <option value="{{ $subsistema->id_subsistema }}">
                    {{ $subsistema->nombre_subsistema }}</option> --}}
                <option value="{{ $subsistema->id_subsistema }}"
                    {{ (old('id_subsistema') && old('id_subsistema') == $subsistema->id_subsistema) || (isset($equipo->id_subsistema) && $equipo->id_subsistema == $subsistema->id_subsistema) ? 'selected' : '' }}>
                    {{ $subsistema->nombre_subsistema }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col">
        <label class="obligatorio" for="id_tipo_eq">Tipo de equipo:</label>
        <select class="custom-select" aria-label="" name="id_tipo_eq" id="id_tipo_eq">
            {{-- <option selected disabled>Selecciona un tipo de equipo</option> --}}
            <option value="" @if (old('id_tipo_eq') === null && !isset($equipo->id_tipo_eq)) selected @endif disabled>
                Selecionar tipo de equipo</option>
            @foreach ($tiposequipos as $tipoequipo)
                {{-- <option value="{{ $tipoequipo->id_tipo_eq }}">{{ $tipoequipo->descripcion_tieq }}
                </option> --}}
                <option value="{{ $tipoequipo->id_tipo_eq }}"
                    {{ (old('id_tipo_eq') && old('id_tipo_eq') == $tipoequipo->id_tipo_eq) || (isset($equipo->id_tipo_eq) && $equipo->id_tipo_eq == $tipoequipo->id_tipo_eq) ? 'selected' : '' }}>
                    {{ $tipoequipo->descripcion_tieq }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-3">
        <label for="id_equipo">ID de equipo:</label>
        <input type="text" name="id_equipo" class="form-control" id="id_equipo" placeholder="id del equipo"
            value="{{ old('id_equipo', $equipo->id_equipo ?? '') }}" readonly>
    </div>

</div>
<div class="form-group">
    <label for="desc_equipo" class="obligatorio">Descripcion de equipo:</label>
    {{-- <input type="text" name="desc_equipo" class="form-control" id="desc_equipo"
        placeholder="serial" value="{{ old('desc_equipo', $equipo->desc_equipo ?? '') }}"> --}}
    <textarea class="form-control" aria-label="With textarea" name="desc_equipo" placeholder="Descripcion...">{{ old('desc_equipo', $equipo->desc_equipo ?? '') }}</textarea>

</div>

<div class="row form-group">
    <div class="col">
        <label for="serial">Serial:</label>
        <input type="text" name="serial" class="form-control" id="serial" placeholder="serial"
            value="{{ old('serial', $equipo->serial ?? '') }}">
    </div>
    <div class="col">
        <label for="potencia">Potencia:</label>
        <input type="text" name="potencia" class="form-control" id="potencia" placeholder="potencia"
            value="{{ old('potencia', $equipo->potencia ?? '') }}">
    </div>
    <div class="col">
        <label for="velocidad">Velocidad:</label>
        <input type="text" name="velocidad" class="form-control" id="velocidad" placeholder="velocidad"
            value="{{ old('velocidad', $equipo->velocidad ?? '') }}">
    </div>
    <div class="col">
        <label for="voltaje">Voltaje:</label>
        <input type="text" name="voltaje" class="form-control" id="voltaje" placeholder="voltaje"
            value="{{ old('voltaje', $equipo->voltaje ?? '') }}">
    </div>
    <div class="col">
        <label for="frame">Frame:</label>
        <input type="text" name="frame" class="form-control" id="frame" placeholder="frame"
            value="{{ old('frame', $equipo->frame ?? '') }}">
    </div>
    <div class="col">
        <label for="fs">Fs:</label>
        <input type="text" name="fs" class="form-control" id="fs" placeholder="fs"
            value="{{ old('fs', $equipo->fs ?? '') }}">
    </div>
    <div class="col">
        <label for="peso">Peso:</label>
        <input type="text" name="peso" class="form-control" id="peso" placeholder="peso"
            value="{{ old('peso', $equipo->peso ?? '') }}">
    </div>
</div>

<div class="row form-group">

    <div class="col">
        <label for="temperatura">Temperatura:</label>
        <input type="text" name="temperatura" class="form-control" id="temperatura" placeholder="temperatura"
            value="{{ old('temperatura', $equipo->temperatura ?? '') }}">
    </div>
    <div class="col">
        <label for="nvecrep" class="obligatorio">Reparacion del equipo:</label>
        <input type="number" name="nvecrep" class="form-control" id="nvecrep" placeholder="nvecrep"
            value="{{ old('nvecrep', $equipo->nvecrep ?? '') }}">
    </div>
    <div class="col">
        <label class="obligatorio" for="permant">permant:</label>
        <input type="text" name="permant" class="form-control" id="permant" placeholder="permant"
            value="{{ old('permant', $equipo->permant ?? '') }}">
    </div>
    <div class="col">
        <label for="rpm">RPM:</label>
        <input type="text" name="rpm" class="form-control" id="rpm" placeholder="rpm"
            value="{{ old('rpm', $equipo->rpm ?? '') }}">
    </div>
    <div class="col">
        <label for="ph">ph:</label>
        <input type="text" name="ph" class="form-control" id="ph" placeholder="ph"
            value="{{ old('ph', $equipo->ph ?? '') }}">
    </div>
</div>

<div class="row form-group">
    <div class="col-3">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" class="form-control" id="fabricante" placeholder="fabricante"
            value="{{ old('fabricante', $equipo->fabricante ?? '') }}">
    </div>
    <div class="col">
        <label for="amperios">amperios:</label>
        <input type="text" name="amperios" class="form-control" id="amperios" placeholder="amperios"
            value="{{ old('amperios', $equipo->amperios ?? '') }}">
    </div>
    <div class="col">
        <label for="ciclos">ciclos:</label>
        <input type="text" name="ciclos" class="form-control" id="ciclos" placeholder="ciclos"
            value="{{ old('ciclos', $equipo->ciclos ?? '') }}">
    </div>
    <div class="col-3">
        <label for="capacidad_ac_sup">Alta capacidad acueducto</label>
        <input type="text" name="capacidad_ac_sup" class="form-control" id="capacidad_ac_sup"
            placeholder="capacidad_ac_sup" value="{{ old('capacidad_ac_sup', $equipo->capacidad_ac_sup ?? '') }}">
    </div>
    <div class="col-3">
        <label for="capacidad_ac_inf">Baja capacidad acueducto</label>
        <input type="text" name="capacidad_ac_inf" class="form-control" id="capacidad_ac_inf"
            placeholder="capacidad_ac_inf" value="{{ old('capacidad_ac_inf', $equipo->capacidad_ac_inf ?? '') }}">
    </div>
</div>

<div class="row form-group">
    <div class="col-3">
        <label class="obligatorio" for="fecha_adquisicion">Fecha adquisicion:</label>
        <input type="date" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion"
            placeholder="fecha_adquisicion" value="{{ old('fecha_adquisicion', $equipo->fecha_adquisicion ?? '') }}">
    </div>
    <div class="col-3">
        <label class="obligatorio" for="fecha_instalacion">Fecha instalacion:</label>
        <input type="date" name="fecha_instalacion" class="form-control" id="fecha_instalacion"
            placeholder="fecha_instalacion" value="{{ old('fecha_instalacion', $equipo->fecha_instalacion ?? '') }}">
    </div>
    <div class="col">
        <label for="altura">Altura:</label>
        <input type="text" name="altura" class="form-control" id="altura" placeholder="altura"
            value="{{ old('altura', $equipo->altura ?? '') }}">
    </div>
    <div class="col">
        <label for="descarga">descarga:</label>
        <input type="text" name="descarga" class="form-control" id="descarga" placeholder="descarga"
            value="{{ old('descarga', $equipo->descarga ?? '') }}">
    </div>

    <div class="col">
        <label for="succion">succion:</label>
        <input type="text" name="succion" class="form-control" id="succion" placeholder="succion"
            value="{{ old('succion', $equipo->succion ?? '') }}">
    </div>


</div>

<div class="row form-group">
    <div class="col">
        <label for="caudal">Caudal:</label>
        <input type="text" name="caudal" class="form-control" id="caudal" placeholder="caudal"
            value="{{ old('caudal', $equipo->caudal ?? '') }}">
    </div>

    <div class="col">
        <label class="obligatorio" for="num_etapas">Numero de etapas:</label>
        <input type="number" name="num_etapas" class="form-control" id="num_etapas" placeholder="num_etapas"
            value="{{ old('num_etapas', $equipo->num_etapas ?? '') }}">
    </div>
    <div class="col">
        <label for="longitud_columna">longitud de columna:</label>
        <input type="text" name="longitud_columna" class="form-control" id="longitud_columna"
            placeholder="longitud_columna" value="{{ old('longitud_columna', $equipo->longitud_columna ?? '') }}">
    </div>
    <div class="col">
        <label for="capacidad">capacidad:</label>
        <input type="text" name="capacidad" class="form-control" id="capacidad" placeholder="capacidad"
            value="{{ old('capacidad', $equipo->capacidad ?? '') }}">
    </div>
    <div class="col">
        <label for="frecuencia">frecuencia:</label>
        <input type="text" name="frecuencia" class="form-control" id="frecuencia" placeholder="frecuencia"
            value="{{ old('frecuencia', $equipo->frecuencia ?? '') }}">
    </div>
</div>

<div class="row form-group">
    <div class="col">
        <label for="corriente">Corriente:</label>
        <input type="text" name="corriente" class="form-control" id="corriente" placeholder="corriente"
            value="{{ old('corriente', $equipo->corriente ?? '') }}">
    </div>
    <div class="col">
        <label for="impedancia">impedancia:</label>
        <input type="text" name="impedancia" class="form-control" id="impedancia" placeholder="impedancia"
            value="{{ old('impedancia', $equipo->impedancia ?? '') }}">
    </div>
    <div class="col">
        <label for="tipo_filtro">tipo de filtro:</label>
        <input type="text" name="tipo_filtro" class="form-control" id="tipo_filtro" placeholder="tipo_filtro"
            value="{{ old('tipo_filtro', $equipo->tipo_filtro ?? '') }}">
    </div>
    <div class="col">
        <label for="rata_filtracion">rata_filtracion:</label>
        <input type="text" name="rata_filtracion" class="form-control" id="rata_filtracion"
            placeholder="rata_filtracion" value="{{ old('rata_filtracion', $equipo->rata_filtracion ?? '') }}">
    </div>

    <div class="col">
        <label for="rendimiento">rendimiento:</label>
        <input type="text" name="rendimiento" class="form-control" id="rendimiento" placeholder="rendimiento"
            value="{{ old('rendimiento', $equipo->rendimiento ?? '') }}">
    </div>
    <div class="col">
        <label for="perdida_carga">perdida_carga:</label>
        <input type="text" name="perdida_carga" class="form-control" id="perdida_carga"
            placeholder="perdida_carga" value="{{ old('perdida_carga', $equipo->perdida_carga ?? '') }}">
    </div>
    <div class="col">
        <label for="area">area:</label>
        <input type="text" name="area" class="form-control" id="area" placeholder="area"
            value="{{ old('area', $equipo->area ?? '') }}">
    </div>
</div>

<div class="row form-group">
    <div class="col">
        <label for="largo">largo:</label>
        <input type="text" name="largo" class="form-control" id="largo" placeholder="largo"
            value="{{ old('largo', $equipo->largo ?? '') }}">
    </div>
    <div class="col">
        <label for="capacidad_filtracion">capacidad filtracion:</label>
        <input type="text" name="capacidad_filtracion" class="form-control" id="capacidad_filtracion"
            placeholder="capacidad_filtracion"
            value="{{ old('capacidad_filtracion', $equipo->capacidad_filtracion ?? '') }}">
    </div>
    <div class="col">
        <label for="ancho">ancho:</label>
        <input type="text" name="ancho" class="form-control" id="ancho" placeholder="ancho"
            value="{{ old('ancho', $equipo->ancho ?? '') }}">
    </div>
    <div class="col">
        <label for="diametro">diametro:</label>
        <input type="text" name="diametro" class="form-control" id="diametro" placeholder="diametro"
            value="{{ old('diametro', $equipo->diametro ?? '') }}">
    </div>
    <div class="col">
        <label for="clase">diametro:</label>
        <input type="text" name="clase" class="form-control" id="clase" placeholder="clase"
            value="{{ old('clase', $equipo->clase ?? '') }}">
    </div>
    <div class="col">
        <label for="flow">flow:</label>
        <input type="text" name="flow" class="form-control" id="flow" placeholder="flow"
            value="{{ old('flow', $equipo->flow ?? '') }}">
    </div>
</div>
<div class="row form-group">

    <div class="col">
        <label for="tipo">tipo:</label>
        <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo"
            value="{{ old('tipo', $equipo->tipo ?? '') }}">
    </div>
    <div class="col">
        <label for="presion">presion:</label>
        <input type="text" name="presion" class="form-control" id="presion" placeholder="presion"
            value="{{ old('presion', $equipo->presion ?? '') }}">
    </div>
    <div class="col">
        <label for="material">material:</label>
        <input type="text" name="material" class="form-control" id="material" placeholder="material"
            value="{{ old('material', $equipo->material ?? '') }}">
    </div>
    <div class="col">
        <label for="sustancia">sustancia:</label>
        <input type="text" name="sustancia" class="form-control" id="sustancia" placeholder="sustancia"
            value="{{ old('sustancia', $equipo->sustancia ?? '') }}">
    </div>
    <div class="col">
        <label for="dias_almacenamiento">dias_almacenamiento:</label>
        <input type="text" name="dias_almacenamiento" class="form-control" id="dias_almacenamiento"
            placeholder="dias_almacenamiento"
            value="{{ old('dias_almacenamiento', $equipo->dias_almacenamiento ?? '') }}">
    </div>
    <div class="col">
        <label for="rango">rango:</label>
        <input type="text" name="rango" class="form-control" id="rango" placeholder="rango"
            value="{{ old('rango', $equipo->rango ?? '') }}">
    </div>
</div>
<div class="row form-group">

    <div class="col">
        <label for="precision">precision:</label>
        <input type="text" name="precision" class="form-control" id="precision" placeholder="precision"
            value="{{ old('precision', $equipo->precision ?? '') }}">
    </div>
    <div class="col">
        <label for="capacidad_dinamica">capacidad_dinamica:</label>
        <input type="text" name="capacidad_dinamica" class="form-control" id="capacidad_dinamica"
            placeholder="capacidad_dinamica"
            value="{{ old('capacidad_dinamica', $equipo->capacidad_dinamica ?? '') }}">
    </div>
    <div class="col">
        <label for="eficiencia_maxima">eficiencia_maxima:</label>
        <input type="text" name="eficiencia_maxima" class="form-control" id="eficiencia_maxima"
            placeholder="eficiencia_maxima" value="{{ old('eficiencia_maxima', $equipo->eficiencia_maxima ?? '') }}">
    </div>
    <div class="col">
        <label for="diseno">diseno:</label>
        <input type="text" name="diseno" class="form-control" id="diseno" placeholder="diseno"
            value="{{ old('diseno', $equipo->diseno ?? '') }}">
    </div>
    <div class="col">
        <label for="cuerpo">cuerpo:</label>
        <input type="text" name="cuerpo" class="form-control" id="cuerpo" placeholder="cuerpo"
            value="{{ old('cuerpo', $equipo->cuerpo ?? '') }}">
    </div>
</div>
<div class="row form-group">

    <div class="col">
        <label class="obligatorio" for="modelo">modelo:</label>
        <select class="custom-select" aria-label="" name="modelo" id="modelo">
            <option value="" @if (old('modelo') === null && !isset($equipo->modelo)) selected @endif disabled>
                Selecionar modelo</option>
            @foreach ($modelos as $modelo)
                {{-- <option value="{{ $marca->id_marca }}">{{ $modelo->nombre_modelo }}</option> --}}
                <option value="{{ $modelo->id_modelo }}"
                    {{ (old('modelo') && old('modelo') == $modelo->id_modelo) || (isset($equipo->modelo) && $equipo->modelo == $modelo->id_modelo) ? 'selected' : '' }}>
                    {{ $modelo->nombre_modelo }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label class="obligatorio" for="marca">marca:</label>
        <select class="custom-select" aria-label="" name="marca" id="marca">
            <option value="" @if (old('marca') === null && !isset($equipo->marca)) selected @endif disabled>
                Selecionar marca</option>
            @foreach ($marcas as $marca)
                {{-- <option value="{{ $marca->id_marca }}">{{ $marca->nombre_marca }}</option> --}}
                <option value="{{ $marca->id_marca }}"
                    {{ (old('marca') && old('marca') == $marca->id_marca) || (isset($equipo->marca) && $equipo->marca == $marca->id_marca) ? 'selected' : '' }}>
                    {{ $marca->nombre_marca }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group pt-2">
    <a href="{{ route('equipos.index') }}" class="btn btn-dark">Volver</a>
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>
