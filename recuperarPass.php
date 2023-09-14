<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php");
      include("db.php");
      session_start();
     
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
  

          
            <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 70vh;">
                <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
            
                <form action = "recovery.php" method = "POST">

                <h4>Recuperar contraseña</h4>
                    
                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Número de documento" name = "documentoAdmin" required/>
                  </div>
            
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name = "btnEnviar" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;  max-width: 100%;" id="enviarBtn">Enviar</button>
        
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
            
          </div>
        </div>
      
    <?php

    include("Includes/Footer.php")

    ?>

      </section>

</body>
</html>