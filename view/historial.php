<?php
include "../controller/logic.php";

$reservasResult = traerTablas("reservas");
$usuariosResult = traerTablas("usuarios");
$contactoResult = traerTablas("mensajes_contacto");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial - SafeParkingZone</title>
    <link href="../css/historial.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png">
</head>
<body>
    <script src="../js/nav.js"></script>
    <nav></nav>


    <?php

      $reservationMessage = isset($_SESSION['reservationMessage']) ? $_SESSION['reservationMessage'] : null;
      unset($_SESSION['reservationMessage']);

      if (!empty($reservationMessage)) {
          echo "<div class='alert alert-info'>$reservationMessage</div>";
      }
    ?>

    <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3>Reservas</h3>
      </div>
      <div class="card-body">
        <div
          id="datatables-fixed-header_wrapper"
          class="dt-container dt-bootstrap5 dt-empty-footer"
        >
          <div class="row mt-2 justify-content-between">
            <div class="col-md-auto me-auto">
              <div class="dt-length">
              </div>
            </div>
            </div>
          </div>
          <div class="row mt-2 justify-content-md-center">
            <div class="col-12">
              <table
                id="datatables-fixed-header"
                class="table table-striped w-100 dataTable"
                aria-describedby="datatables-fixed-header_info"
                style="width: 1523px"
              >
                <thead>
                  <tr role="row">
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">ID</span>
                    </th>
                    <th
                      data-dt-column="1"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Position: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">tipo</span
                      >
                    </th>
                    <th
                      data-dt-column="2"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Office: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Placa</span
                      >
                    </th>
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Espacio Reservado</span>
                    </th>
                    <th
                      data-dt-column="3"
                      rowspan="1"
                      colspan="1"
                      class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                      aria-label="Age: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Fecha Ingreso</span
                      >
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Fecha Salida</span>
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Acciones</span>
                    </th>
					
                  </tr>
                </thead>
                <colgroup>
                  <col data-dt-column="0" style="width: 306.672px" />
                  <col data-dt-column="1" style="width: 428.922px" />
                  <col data-dt-column="2" style="width: 238.281px" />
                  <col data-dt-column="3" style="width: 140.891px" />
                  <col data-dt-column="4" style="width: 223.781px" />
                  <col data-dt-column="5" style="width: 184.453px" />
                </colgroup>

                <tbody>
				  <?php
        if ($reservasResult->num_rows > 0) {
            while ($reserva = $reservasResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $reserva['id'] . "</td>";
                echo "<td>" . $reserva['tipo'] . "</td>";
                echo "<td>" . $reserva['license_plate'] . "</td>";
                echo "<td>" . $reserva['space_reserved'] . "</td>";
                echo "<td>" . $reserva['fecha'] . "</td>";
                echo "<td>" . $reserva['fecha_salida'] . "</td>";
                echo '<td>
                    <button 
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        data-id="' . $reserva['id'] . '"
                        data-tipo="' . $reserva['tipo'] . '"
                        data-license_plate="' . $reserva['license_plate'] . '"
                        data-space_reserved="' . $reserva['space_reserved'] . '"
                        data-fecha="' . $reserva['fecha'] . '"
                        data-fecha_salida="' . $reserva['fecha_salida'] . '"
                    >
                        Editar
                    </button>
                    <form action="../controller/historial.php" method="POST">
                    <input type="text" value="'. $reserva['license_plate'].'" name="license_plate" hidden>
                    <input type="text" value="eliminarReserva"  name="accion" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" id="enviar" >Eliminar</button>
                  </form>
                </td>';
                echo "</tr>";
            }
        }
        ?>
                </tbody>
                <tfoot></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                                        
         
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="../controller/historial.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Inputs -->
                    <input type="hidden" id="modal-id" name="id">
                    <div class="mb-3">
                        <label for="modal-tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="modal-tipo" name="tipo" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-license_plate" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="modal-license_plate" name="license_plate" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-space_reserved" class="form-label">Espacio Reservado</label>
                        <input type="text" class="form-control" id="modal-space_reserved" name="space_reserved" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-fecha" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" id="modal-fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-fecha_salida" class="form-label">Fecha Salida</label>
                        <input type="datetime-local" class="form-control" id="modal-fecha_salida" name="fecha_salida" required>
                    </div>
                </div>
                <input type="text" value="editarReserva" name="accion" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="enviar" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="card-header">
        <h3>Usuarios</h3>
      </div>
      <div class="card-body">
        <div
          id="datatables-fixed-header_wrapper"
          class="dt-container dt-bootstrap5 dt-empty-footer"
        >
          <div class="row mt-2 justify-content-between">
            <div class="col-md-auto me-auto">
              <div class="dt-length">
              </div>
            </div>
            </div>
          </div>
          <div class="row mt-2 justify-content-md-center">
            <div class="col-12">
              <table
                id="datatables-fixed-header"
                class="table table-striped w-100 dataTable"
                aria-describedby="datatables-fixed-header_info"
                style="width: 1523px"
              >
                <thead>
                  <tr role="row">
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">ID</span>
                    </th>
                    <th
                      data-dt-column="1"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Position: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Cedula</span
                      >
                    </th>
                    <th
                      data-dt-column="2"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Office: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Nombre</span
                      >
                    </th>
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Contraseña</span>
                    </th>
                    <th
                      data-dt-column="3"
                      rowspan="1"
                      colspan="1"
                      class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                      aria-label="Age: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Rol</span
                      >
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Telefono</span>
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Email</span>
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Acciones</span>
                    </th>
					
                  </tr>
                </thead>
                <colgroup>
                  <col data-dt-column="0" style="width: 306.672px" />
                  <col data-dt-column="1" style="width: 428.922px" />
                  <col data-dt-column="2" style="width: 238.281px" />
                  <col data-dt-column="3" style="width: 140.891px" />
                  <col data-dt-column="4" style="width: 223.781px" />
                  <col data-dt-column="5" style="width: 184.453px" />
                </colgroup>

                <tbody>
				  <?php
        if ($usuariosResult->num_rows > 0) {
            while ($usuario = $usuariosResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $usuario['id'] . "</td>";
                echo "<td>" . $usuario['cedula'] . "</td>";
                echo "<td>" . $usuario['nombre'] . "</td>";
                echo "<td>" . $usuario['contrasena'] . "</td>";
                echo "<td>" . $usuario['rol'] . "</td>";
                echo "<td>" . $usuario['telefono'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo '<td>
                    <button 
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal2"
                        data-id="' . $usuario['id'] . '"
                        data-cedula="' . $usuario['cedula'] . '"
                        data-nombre="' . $usuario['nombre'] . '"
                        data-contrasena="' . $usuario['contrasena'] . '"
                        data-rol="' . $usuario['rol'] . '"
                        data-telefono="' . $usuario['telefono'] . '"
                        data-email="' . $usuario['email'] . '"
                    >
                        Editar
                    </button>
                    <form action="../controller/historial.php" method="POST">
                    <input type="text" value="'. $usuario['cedula'].'" name="cedula" hidden>
                    <input type="text" value="eliminarUsuario"  name="accion" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" id="enviar" >Eliminar</button>
                  </form>
                </td>';
                echo "</tr>";
            }
        }
        ?>
                </tbody>
                <tfoot></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="../controller/historial.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Inputs -->
                    <input type="hidden" id="modal-id" name="id">
                    <div class="mb-3">
                        <label for="modal-cedula" class="form-label">cedula</label>
                        <input type="text" class="form-control" id="modal-cedula" name="cedula" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="modal-nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-contrasena" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="modal-contrasena" name="contrasena" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-rol" class="form-label">Rol</label>
                        <input type="text" class="form-control" id="modal-rol" name="rol" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="modal-telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="modal-email" name="email" required>
                    </div>
                </div>
                <input type="text" value="editarUsuario" name="accion" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="enviar" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="card-header">
        <h3>Contacto</h3>
      </div>
      <div class="card-body">
        <div
          id="datatables-fixed-header_wrapper"
          class="dt-container dt-bootstrap5 dt-empty-footer"
        >
          <div class="row mt-2 justify-content-between">
            <div class="col-md-auto me-auto">
              <div class="dt-length">
              </div>
            </div>
            </div>
          </div>
          <div class="row mt-2 justify-content-md-center">
            <div class="col-12">
              <table
                id="datatables-fixed-header"
                class="table table-striped w-100 dataTable"
                aria-describedby="datatables-fixed-header_info"
                style="width: 1523px"
              >
                <thead>
                  <tr role="row">
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">ID</span>
                    </th>
                    <th
                      data-dt-column="1"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Position: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Nombre</span
                      >
                    </th>
                    <th
                      data-dt-column="2"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc"
                      aria-label="Office: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Correo</span
                      >
                    </th>
                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Telefono</span>
                    </th>
                    <th
                      data-dt-column="3"
                      rowspan="1"
                      colspan="1"
                      class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                      aria-label="Age: Activate to sort"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">mensaje</span
                      >
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Fecha envio</span>
                    </th>

                    <th
                      data-dt-column="0"
                      rowspan="1"
                      colspan="1"
                      class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                      aria-sort="ascending"
                      aria-label="Name: Activate to invert sorting"
                      tabindex="0"
                    >
                      <span class="dt-column-title" role="button">Acciones</span>
                    </th>
					
                  </tr>
                </thead>
                <colgroup>
                  <col data-dt-column="0" style="width: 306.672px" />
                  <col data-dt-column="1" style="width: 428.922px" />
                  <col data-dt-column="2" style="width: 238.281px" />
                  <col data-dt-column="3" style="width: 140.891px" />
                  <col data-dt-column="4" style="width: 223.781px" />
                  <col data-dt-column="5" style="width: 184.453px" />
                </colgroup>

                <tbody>
				  <?php
        if ($contactoResult->num_rows > 0) {
            while ($contacto = $contactoResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $contacto['id'] . "</td>";
                echo "<td>" . $contacto['nombre'] . "</td>";
                echo "<td>" . $contacto['correo'] . "</td>";
                echo "<td>" . $contacto['telefono'] . "</td>";
                echo "<td>" . $contacto['mensaje'] . "</td>";
                echo "<td>" . $contacto['fecha_envio'] . "</td>";
                echo '<td>
                    <form action="../controller/historial.php" method="POST">
                    <input type="text" value="'. $contacto['id'].'" name="id" hidden>
                    <input type="text" name="accion" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" id="enviar" >Eliminar</button>
                  </form>
                </td>';
                echo "</tr>";
            }
        }
        ?>
                </tbody>
                <tfoot></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>


<script src="../js/historial.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


