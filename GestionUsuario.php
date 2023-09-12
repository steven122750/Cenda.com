<!DOCTYPE html>
<html lang="en">

<?php

    include("db.php"); 
      include("Includes/Head.php")
     
  ?>

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 89.8vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        <h2 class="mb-4">Editar datos del funcionario</h2>
        <form style="max-width: 400px; width: 100%;" action="editarFuncionario.php?documento=<?php echo $_GET['documento']; ?>" method="POST">
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name = "nombreEdit" id="nombre" aria-describedby="emailHelp" placeholder="Nombres y apellidos" value="<?php echo $title; ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg"  name = "cargoEdit" id="cargo" placeholder="Cargo">
            </div>

            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Cambiar de sede</option>
                <option value="1">Cenda Armenia</option>
                <option value="2">Cenda Buenaventura</option>
                <option value="3">CDA Quimbaya SAS</option>
                <option value="3">CDA Olmo</option>
              </select>

            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button>
            </div>
            

        </form>
    </div>
</body>


<?php

include("Includes/Footer.php")

?>

</html>