<?php
include("Includes/sessionSecurity.php");
include("db.php");

$nombre = '';
$cargo = '';
$sede = '';


if (isset($_GET['documento'])) {
    $documento = $_GET['documento'];
    $query = "SELECT * FROM funcionarios WHERE documento = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $documento);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $cargo = $row['cargo'];
        $sede = $row['sede'];
    }
}


if (isset($_POST['update'])) {
    $documento = $_GET['documento'];
    $cargo = $_POST['cargo'];
    $sede = $_POST['sede'];
    $nombre = $_POST['nombre'];

    $query = "UPDATE funcionarios SET cargo = ?, sede = ?, nombre = ? WHERE documento = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $cargo, $sede, $nombre, $documento);
    mysqli_stmt_execute($stmt);

    $_SESSION['message'] = 'Funcionario actualizado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: ModuloInfo.php');
    exit();
}

?>

<?php
include('includes/Head.php');
include('includes/nav.php');
?>

<div class="container d-flex flex-column align-items-center justify-content-center" style="height: 89.8vh;">
    <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4"
        style="max-width: 300px;" />
    <h2 class="mb-4">Editar datos del funcionario</h2>
    <form style="max-width: 400px; width: 100%;"
        action="editarFuncionario.php?documento=<?php echo $_GET['documento']; ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="nombre" id="nombre"
                aria-describedby="emailHelp" placeholder="Nombres y apellidos" value="<?php echo $nombre; ?>">
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="cargo" id="cargo" placeholder="Cargo"
                value="<?php echo $cargo; ?>">
        </div>

        <select class="form-select form-select-lg mb-3" name="sede" aria-label=".form-select-lg example">

            <option value="Sede" disabled selected>Selecciona una sede</option>

            <?php


            $query = "SELECT * FROM sede";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>

            <?php } ?>


        </select>

        <div>
            <label for="sedeActual">Sede actual:
                <?php echo $sede; ?>
            </label>
        </div>

        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="update">Actualizar datos</button>
        </div>
    </form>
</div>

<?php include('includes/footer.php'); ?>