<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php")

  ?>

<body>

<?php

session_start();
include("db.php")


?>
  
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
  
            <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
                <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
            
                <form action = "loguearAdmin.php" method = "POST">
                    
                    <div class="form-outline mb-4">

                      <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Número de documento" name = "documentoAdmin" />
                  </div>
            
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Contraseña" name = "passAdmin" />
                    </div>
            
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#!" class="text-body">Recuperar contraseña</a>
                    </div>
            
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name = "btnLoguearAdmin"class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" id="loginbtn">Iniciar sesión</button>
        
                    </div>
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