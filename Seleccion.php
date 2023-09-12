<!DOCTYPE html>
<html lang="en">

<?php

        include("db.php"); 
      include("Includes/Head.php");
     
      
      session_start();

      if (isset($_SESSION['documentoAdmin'])){
          $cliente = $_SESSION['documentoAdmin'];
      }else{
   header('Location: index.php');
       die() ;
      }
?>

<body>

    <div class="container text-center">
        <div class="col-md-12 d-flex align-items-center justify-content-center" style="height: 40vh;">
            <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        </div>

        <h4 >Selecciona una sede</h4>

        <div class="btn-container mt-3"> 
            <button class="btn btn-primary" type="submit" id="armeniaBtn">Cenda Armenia</button>
            <button class="btn btn-primary" type="submit" id="buenaBtn">Cenda Buenaventura</button>
            <button class="btn btn-primary" type="submit" id="quimBtn">CDA Quimbaya SAS</button>
            <button class="btn btn-primary" type="submit" id="olmoBtn">CDA Olmo</button>

                        <script>
    
                            document.getElementById("armeniaBtn").addEventListener("click", function() {
                                window.location.href = "seleccion2.php";
                            });
                            document.getElementById("buenaBtn").addEventListener("click", function() {
                                window.location.href = "seleccion2.php";
                            });
                            document.getElementById("quimBtn").addEventListener("click", function() {
                                window.location.href = "seleccion2.php";
                            });
                            document.getElementById("olmoBtn").addEventListener("click", function() {
                                window.location.href = "seleccion2.php";
                            });
                        </script>
        </div>
    </div>

</body>


<?php

    include("Includes/Footer.php")

?>

</html>
