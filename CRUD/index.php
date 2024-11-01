<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d66b87370d.js" crossorigin="anonymous"></script>
    <title>CRUD</title>
</head>

<body>
    <nav>
        
    </nav>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Seguro que deseas eliminar este registro?");
            return respuesta;
        }
    </script>
    <div class="container-fluid row m-4 ">
        <h3 class="text-center text-secondary">Registro de Datos</h3>
        <h4>
            <?php
            include "modelo/conexion.php";
            ?>
        </h4>

        <form class="col-4 p-3 pl-3 bg-dark rounded text-white" style="width:400px;" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni">
            </div>
            <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupacion</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar</button>
        </form>


        <div class="col-8 p-4">
            <h4>
                <?php
                include "controlador/delete_persona.php";
                include "controlador/registro_persona.php";

                ?>
            </h4>
            <table class="table table-hover table-dark border border-2 rounded">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Ocupacion</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $db = $conn->query("select * from personas");
                    while ($datos = $db->fetch(PDO::FETCH_OBJ)) {


                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($datos->nombre); ?></td>
                            <td><?php echo htmlspecialchars($datos->apellido); ?></td>
                            <td><?php echo htmlspecialchars($datos->dni); ?></td>
                            <td><?php echo htmlspecialchars($datos->ocupacion); ?></td>

                            <td class="d-flex gap-3">
                                <a href="edit.php?id=<?= $datos->id ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="index.php?id=<?= $datos->id ?>" onclick="return eliminar()" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
