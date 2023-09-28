<?php

session_start();
include("Includes/sessionSecurity.php");
include("Includes/Head.php");
include("Includes/nav.php");
include("db.php")

    ?>


<!DOCTYPE html>
<html lang="en">

<?php include("Includes/logo.php"); 

?>
<body>


    <div class="container d-flex flex-column align-items-center justify-content-center" >



        <h4 class="mb-3">Registrar funcionario</h>
        <form style="max-width: 100%; width: 100%;" method="POST" action="guardarFuncionario.php">



            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nombreFuncionario"
                    aria-describedby="emailHelp" placeholder="Nombres y apellidos" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="documentoFuncionario"
                    placeholder="Número de documento" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="cargoFuncionario" placeholder="Cargo"
                    required>
            </div>

            <select class="form-select form-select-lg mb-3" name="sedeFuncionario" aria-label=".form-select-lg example">

                <option value="Sede" disabled selected>Selecciona una sede</option>

                <?php


                $query = "SELECT * FROM sede";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>

                <?php } ?>


            </select>

            <div class="form-group d-flex justify-content-center btn-submit">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="guardarFuncionario">Registrar
                    funcionario</button>
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