<!DOCTYPE html>
<html lang="en">

<?php

include("Includes/sessionSecurity.php");
include("db.php");
include("Includes/Head.php");
include("Includes/nav.php");


?>


<?php
if (isset($_SESSION['message'])) { ?>
    <div id="alert-message" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

<script>
    setTimeout(function () {
        var alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 5000); 
</script>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-5 mt-3">
        <!-- Centra vertical y horizontalmente el contenido -->

        <form class="container-form" action="guardarSede.php" method="POST">

            <div class="form-group">
                <!-- Envuelve la imagen en un contenedor centrado -->
                <div class="text-center">
                    <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen"
                        class="img-fluid mb-4" style="max-width: 300px;" />
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control custom-input" name="nombreSede" placeholder="Nombre de la sede"
                    required>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="guardarSede">Registrar
                    sede</button>
            </div>

            <!-- Reduzca la altura máxima del contenedor de la tabla -->
            <div style="max-height: 200px; overflow-y: auto;">
                <table class="table" id="tablaSedes">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $query = "SELECT * FROM sede";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['nombre']; ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger confirm-delete"
                                        data-nombre="<?php echo $row['nombre']; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </form>
    </div>



</body>

<footer>

    <?php

    include("Includes/Footer.php");

    ?>

</footer>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll(".confirm-delete");

        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var nombre = button.getAttribute("data-nombre");
                var confirmar = confirm("¿Estás seguro de que deseas eliminar la sede '" + nombre + "'?");

                if (confirmar) {
                    // Redirigir a la página de eliminación si se confirma
                    window.location.href = "eliminarSede.php?nombre=" + nombre;
                }
            });
        });
    });
</script>


</html>