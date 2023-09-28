<?php

session_start();
include("Includes/sessionSecurity.php");
include("Includes/Head.php");
include("Includes/nav.php");

?>

<!DOCTYPE html>
<html lang="en">


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


   <?php include("Includes/logo.php"); 
    
    
    ?>

<body>


    <div class="container d-flex justify-content-center align-items-center vh-20 mt-3">
      



        <form class="container-form" action="guardarAdmin.php" method="POST">


            <h5>Registrar administrador</h5>

            <div class="form-group">
                <input type="text" class="form-control custom-input" name="documentoAdmin" placeholder="Documento"
                    required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control custom-input" name="correoAdmin" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control custom-input" name="nombreAdmin" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control custom-input" name="pass" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control custom-input" name="confirmPass"
                    placeholder="Confirmar contraseña" required>
            </div>

            <div class="form-group d-flex justify-content-center btn-submit">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="guardarAdmin">Registrar</button>
            </div>


        </form>




        <footer>

            <?php

            include("Includes/Footer.php")

                ?>

        </footer>


</body>




</html>