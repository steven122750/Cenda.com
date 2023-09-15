<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php");
      include("Includes/sessionSecurity.php");
      Include("Includes/nav.php");

  ?>

<body>
   
    
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 78vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        <h2 class="mb-4">Registrar funcionario</h2>
        <form style="max-width: 400px; width: 100%;" method = "POST" action="guardarFuncionario.php" >


        
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nombreFuncionario" aria-describedby="emailHelp" placeholder="Nombres y apellidos" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="documentoFuncionario" placeholder="Número de documento" required>
            </div>
    
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="cargoFuncionario" placeholder="Cargo" required>
            </div>
    
            <select class="form-select form-select-lg mb-3" name="sedeFuncionario" aria-label=".form-select-lg example">
                <option selected="Cenda Armenia">Cenda Armenia</option>
                <option value="Cenda Buenaventura">Cenda Buenaventura</option>
                <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
                <option value="CDA Olmo">CDA Olmo</option>
            </select>
    
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name = "guardarFuncionario">Registrar funcionario</button>
            </div>
        </form>
    </div>
    
</body>


<footer>

<?php

    include("Includes/Footer.php")

?>

</footer>



</html>
