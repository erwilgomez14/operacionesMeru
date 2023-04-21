<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte</title>
  {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
    <table class="table table-striped ">
        <thead class="">
         <td>
        <h1 class="text-center">Orden de trabajo Nº: {{$odt->id_orden}}</h1>
    </td>
        </thead>
        <tbody>
          ...
          <tr>
            <td colspan="4">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <td style="width: 70%; border: 1px solid black; padding: 5px;">
                        <h3 class="ml-3">Descripcion de la orden: {{$odt->descrip_ot}}</h3>
                      </td>
                      <td style="border: 1px solid black; padding: 5px;">
                        <h3 class="ml-3">Fecha de creacion: {{$odt->fecha}}</h3>
                      </td>
                    </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td colspan="4">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <td style="width: 30%; border: 1px solid black; padding: 5px;">
                      </td>
                      <td style="border: 1px solid black; padding: 5px;">
                        <h3 class="ml-3">Fecha de creacion: {{$odt->fecha}}</h3>
                      </td>
                    </tr>
                </table>
            </td>
          </tr>
          ...
        </tbody>
      </table>

      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td rowspan="2" style="width: 30%; border: 1px solid black; padding: 5px;">
            <td  style="width:30%;">
                <!-- Aquí va el contenido del primer td -->
              </td>
              <td style="width:18%;">Columna 1</td>
              <td style="width:18%;">Columna 2</td>
              <td style="width:18%;">Columna 3</td>
              <td style="width:18%;">Columna 4</td>
            </tr>
            <tr>
              <td>Contenido 1</td>
              <td>Contenido 2</td>
              <td>Contenido 3</td>
              <td>Contenido 4</td>
            </tr>
          </td>

        </tr>
      </table>

    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Producto 1</td>
              <td>Descripción del producto 1</td>
              <td>10</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Producto 2</td>
              <td>Descripción del producto 2</td>
              <td>5</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Producto 3</td>
              <td>Descripción del producto 3</td>
              <td>3</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-end mt-3">
        <h5>Total: $100</h5>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
