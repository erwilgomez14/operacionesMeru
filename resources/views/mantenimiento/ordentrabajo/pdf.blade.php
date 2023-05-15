<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte</title>
  {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body>
<div class="card-header">
    <h2 class="">Orden de trabajo Nº: {{--{{$registro->id_orden}}--}}</h2>

</div>
<div class="card-body">

    <h4>Descripcion: {{--{{$registro->descrip_ot}}--}}</h4>
    <h4>Acueducto: {{--{{$acueducto->nom_acu}}--}}</h4>
    <h4>Area/estacion: {{--{{$area->nom_sistema}}--}}</h4>
    <h4>Equipo: {{--{{$equipo->nombre_subsistema}}--}}</h4>
    <h4>Tipo de Orden: {{--{{$tipo->desc_orden}}--}}</h4>
    <h4>Fecha de creacion de la orden: {{--{{$registro->fecha}}--}}</h4>
    <h4>Fecha de inicio programada: {{--{{$registro->fecha_inicio}}--}}</h4>
    <h4>Fecha final programda: {{--{{$registro->fecha_final}}--}}</h4>
    <h4>Duracion: {{--{{$registro->dias}}--}} dias</h4>


    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
        <h4 class="text-center mt-4">Datos de la mano de obra</h4>

        </tbody>
    </table>
    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Descripcion</th>
        </tr>
        </thead>
        <tbody>
        <h4 class="text-center mt-4">Datos del conjuntos de equipos del subsistema</h4>

        </tbody>
    </table>

    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th>Descripcion</th>
            <th>tareas</th>
        </tr>
        </thead>
        <tbody>
        <h4 class="text-center mt-4">Tareas asignadas al conjuntos de equipos del subsistema</h4>

        </tbody>
    </table>

    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th>Herramientas</th>
            <th>tareas</th>
        </tr>
        </thead>
        <tbody>
        <h4 class="text-center mt-4">Herramientas asignadas al conjuntos de tareas del subsistema</h4>

        </tbody>
    </table>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
