<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<?php

session_start();
include("Includes/Head.php");
include("db.php");


?>


<script>
    // Cierra la alerta después de 5 segundos (5000 ms)
    setTimeout(function () {
        var alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 3000); 
</script>


<body>


    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="container d-flex flex-column align-items-center justify-content-center">
         
                   <div class="user-icon-container">
                        <i class="fas fa-user user-icon"></i>
                    </div>

                    <form action="loguearAdmin.php" method="POST">
                        


                        <div class="form-outline mb-4">

                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Número de documento" name="documentoAdmin" required />
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Contraseña" name="passAdmin" required />
                        </div>


                        <div class="text-center">
                            <button type="submit" name="btnLoguearAdmin" class="btn btn-primary btn-lg btn-submit"
                                style="max-width: 100%;id="loginbtn">Iniciar
                                sesión</button>

                        </div>


                        <?php

                        if (isset($_SESSION['message'])) { ?>
                            <div id="alert-message"
                                class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show"
                                role="alert">
                                <?= $_SESSION['message'] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php

                            // Elimina el mensaje y el tipo de la sesión después de mostrarlo
                            unset($_SESSION['message']);
                            unset($_SESSION['message_type']);
                        }
                        ?>


                    </form>
                </div>

            </div>
        </div>

    </section>

    <footer>
        <?php



        include("Includes/Footer.php")

            ?>
    </footer>

</body>

</html>