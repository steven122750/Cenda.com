<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php")

  ?>

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 89.8vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        <h2 class="mb-4">Editar datos del funcionario</h2>
        <form style="max-width: 400px; width: 100%;">
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombres y apellidos">
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Cargo">
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
            <button id="btnEliminar" type="button" class="btn btn-danger centered-button" >Eliminar funcionario de la base de datos</button>

        </form>
    </div>
</body>


<?php

include("Includes/Footer.php")

?>

</html>