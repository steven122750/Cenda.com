
<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php");
      Include("Includes/nav.php");
      include("Includes/sessionSecurity.php");

  ?>


<script>
    setTimeout(function () {
        var alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 3000); 
</script>

<body>
   
    
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 45vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 100%;" />
        <h2 class="mb-4">Registrar Administrador</h2>

        <form style="max-width: 400px; width: 100%;  height: 100px;" method = "POST" action="guardarAdmin.php" >


        
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="documentoAdmin" aria-describedby="emailHelp" placeholder="Documento" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="correoAdmin" placeholder="Correo electrónico" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nombreAdmin" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="pass" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="confirmPass" placeholder="Confirmar contraseña" required>
            </div>

            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name = "guardarAdmin">Registrar administrador</button>
            </div>


                <?php

                if (isset($_SESSION['message'])) { ?>
                    <div id="alert-message" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
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
    
</body>

<footer>

<?php

    include("Includes/Footer.php")

?>

</footer>



</html>













