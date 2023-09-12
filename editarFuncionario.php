<?php
include("db.php");
$nombre = '';
$cargo= '';
$sede = '';

if  (isset($_GET['documento'])) {
  $documento = $_GET['documento'];
  $query = "SELECT * FROM funcionarios WHERE documento=$documento";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $cargo = $row['cargo'];
    $sede = $row['sede'];

  }
}

if (isset($_POST['update'])) {
  $documento = $_GET['documento'];
  $cargo= $_POST['cargo'];
  $sede = $row['sede'];

  $query = "UPDATE funcionarios set nombre = '$nombre', cargo = '$cargo', sede = '$sede' WHERE documento=$documento";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: ModuloInfo.php');
}

?>
<?php include('includes/Head.php'); ?>



<div class="container d-flex flex-column align-items-center justify-content-center" style="height: 89.8vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        <h2 class="mb-4">Editar datos del funcionario</h2>
        <form style="max-width: 400px; width: 100%;" action="editarFuncionario.php?documento=<?php echo $_GET['documento']; ?>" method="POST">
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name = "nombreEdit" id="nombre" aria-describedby="emailHelp" placeholder="Nombres y apellidos" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg"  name = "cargoEdit" id="cargo" placeholder="Cargo"  value="<?php echo $cargo; ?>">
            </div>

            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>  <?php echo $sede; ?> </option>
                <option value="1">Cenda Armenia</option>
                <option value="2">Cenda Buenaventura</option>
                <option value="3">CDA Quimbaya SAS</option>
                <option value="3">CDA Olmo</option>
              </select>

            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name = "update">Actualizar datos</button>
            </div>
            
        </form>
    </div>


<?php include('includes/footer.php'); ?>