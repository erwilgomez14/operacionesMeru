@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Equipo: {{$equipo->id_equipo}}</h2>

                        </div>
                        <div class="card-body">
                            <h4>Sistema: {{$equipo->id_sistema}}</h4>
                            <h4>Subsistema: {{$equipo->id_subsistema}}</h4>
                            <h4>Descripcion del equipo: {{$equipo->desc_equipo}}</h4>
                            @if($equipo->potencia != null)
                                <h4>Potencia: {{$equipo->potencia}}</h4>
                            @endif
                            @if($equipo->velocidad != null)
                                <h4>Velocidad: {{$equipo->velocidad}}</h4>
                            @endif
                            @if($equipo->voltaje != null)
                                <h4>Voltaje: {{$equipo->voltaje}}</h4>
                            @endif
                            @if($equipo->frame != null)
                                <h4>Frame: {{$equipo->frame}}</h4>
                            @endif
                            @if($equipo->fs != null)
                                <h4>Fs: {{$equipo->fs}}</h4>
                            @endif
                            @if($equipo->peso != null)
                                <h4>Peso: {{$equipo->peso}}</h4>
                            @endif
                            @if($equipo->temperatura != null)
                                <h4>Temperatura: {{$equipo->temperatura}}</h4>
                            @endif
                            @if($equipo->nvecrep != null)
                                <h4>Nve Crep: {{$equipo->nvecrep}}</h4>
                            @endif
                            @if($equipo->permant != null)
                                <h4>Permanente: {{$equipo->permant}}</h4>
                            @endif
                            @if($equipo->rpm != null)
                                <h4>RPM: {{$equipo->rpm}}</h4>
                            @endif
                            <h4>Tipo de Equipo:</h4>
                            @if($equipo->id_estatus != null)
                                <h4>Estatus: {{$equipo->id_estatus}}</h4>
                            @endif
                            @if($equipo->fabricante != null)
                                <h4>Fabricante: {{$equipo->fabricante}}</h4>
                            @endif
                            @if($equipo->amperios != null)
                                <h4>Amperios: {{$equipo->amperios}}</h4>
                            @endif
                            @if($equipo->ciclos != null)
                                <h4>Ciclos: {{$equipo->ciclos}}</h4>
                            @endif
                            @if($equipo->ph != null)
                                <h4>Ph: {{$equipo->ph}}</h4>
                            @endif
                            @if($equipo->capacidad_ac_sup != null)
                                <h4>Capacidad Acueducto Superior: {{$equipo->capacidad_ac_sup}}</h4>
                            @endif
                            @if($equipo->capacidad_ac_inf != null)
                                <h4>Capacidad Acueducto Inferior: {{$equipo->capacidad_ac_inf}}</h4>
                            @endif
                            <h4>Tipo de sistema:</h4>
                            @if($equipo->fecha_adquisicion != null)
                                <h4>Fecha de adquisicion: {{$equipo->fecha_adquisicion}}</h4>
                            @endif
                            @if($equipo->fecha_instalacion != null)
                                <h4>Fecha de Instalacion: {{$equipo->fecha_instalacion}}</h4>
                            @endif
                            @if($equipo->caudal != null)
                                <h4>Caudal: {{$equipo->caudal}}</h4>
                            @endif
                            @if($equipo->altura != null)
                                <h4>Altura: {{$equipo->altura}}</h4>
                            @endif
                            @if($equipo->descarga != null)
                                <h4>Descarga: {{$equipo->descarga}}</h4>
                            @endif
                            @if($equipo->longitud_columna != null)
                                <h4>Longitud de la columna: {{$equipo->longitud_columna}}</h4>
                            @endif
                            @if($equipo->succion != null)
                                <h4>Succion: {{$equipo->succion}}</h4>
                            @endif
                            @if($equipo->num_etapas != null)
                                <h4>Numero de Etapas: {{$equipo->num_etapas}}</h4>
                            @endif
                            @if($equipo->capacidad != null)
                                <h4>Capacidad: {{$equipo->capacidad}}</h4>
                            @endif
                            @if($equipo->frecuencia != null)
                                <h4>Frecuencia: {{$equipo->frecuencia}}</h4>
                            @endif
                            @if($equipo->corriente != null)
                                <h4>Corriente: {{$equipo->corriente}}</h4>
                            @endif
                            @if($equipo->impedancia != null)
                                <h4>Impedancia: {{$equipo->impedancia}}</h4>
                            @endif
                            @if($equipo->tipo_filtro != null)
                                <h4>Tipo de Filtro: {{$equipo->tipo_filtro}}</h4>
                            @endif
                            @if($equipo->rata_filtracion != null)
                                <h4>Filtracion rata: {{$equipo->rata_filtracion}}</h4>
                            @endif
                            @if($equipo->capacidad_filtracion != null)
                                <h4>Capacidad de filtracion: {{$equipo->capacidad_filtracion}}</h4>
                            @endif
                            @if($equipo->rendimiento != null)
                                <h4>Rendimiento: {{$equipo->rendimiento}}</h4>
                            @endif
                            @if($equipo->perdida_carga != null)
                                <h4>Perdida de Carga: {{$equipo->perdida_carga}}</h4>
                            @endif
                            @if($equipo->area != null)
                                <h4>Area: {{$equipo->area}}</h4>
                            @endif
                            @if($equipo->largo != null)
                                <h4>Largo: {{$equipo->largo}}</h4>
                            @endif
                            @if($equipo->ancho != null)
                                <h4>Ancho: {{$equipo->ancho}}</h4>
                            @endif
                            @if($equipo->diametro != null)
                                <h4>Diametro: {{$equipo->diametro}}</h4>
                            @endif
                            @if($equipo->clase != null)
                                <h4>Clase: {{$equipo->clase}}</h4>
                            @endif
                            @if($equipo->flow != null)
                                <h4>Flow: {{$equipo->flow}}</h4>
                            @endif
                            @if($equipo->tipo != null)
                                <h4>Tipo: {{$equipo->tipo}}</h4>
                            @endif
                            @if($equipo->presion != null)
                                <h4>Presion: {{$equipo->presion}}</h4>
                            @endif
                            @if($equipo->material != null)
                                <h4>Material: {{$equipo->material}}</h4>
                            @endif
                            @if($equipo->sustancia != null)
                                <h4>Sustancia: {{$equipo->sustancia}}</h4>
                            @endif
                            @if($equipo->dias_almacenamiento != null)
                                <h4>Dias de Almacenamiento: {{$equipo->dias_almacenamiento}}</h4>
                            @endif
                            @if($equipo->rango != null)
                                <h4>Rango: {{$equipo->rango}}</h4>
                            @endif
                            @if($equipo->precision != null)
                                <h4>Precision: {{$equipo->precision}}</h4>
                            @endif
                            @if($equipo->capacidad_dinamica != null)
                                <h4>Capacidad dinamica: {{$equipo->capacidad_dinamica}}</h4>
                            @endif
                            @if($equipo->eficiencia_maxima != null)
                                <h4>Eficiencia maxima: {{$equipo->eficiencia_maxima}}</h4>
                            @endif
                            @if($equipo->diseno != null)
                                <h4>Diseño: {{$equipo->diseno}}</h4>
                            @endif
                            @if($equipo->cuerpo != null)
                                <h4>Cuerpo: {{$equipo->cuerpo}}</h4>
                            @endif
                            @if($equipo->cuerpo != null)
                                <h4>Cuerpo: {{$equipo->cuerpo}}</h4>
                            @endif
                            <h4>Marca: </h4>
                            <h4>Modelo:</h4>
                        </div>
                        <div class="card-footer">

                            <a href="{{route('equipos.index')}}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
