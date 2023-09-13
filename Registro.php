<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar resultados</title>
    <!-- Enlaces a las hojas de estilo de Bootstrap y otros recursos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="JS/scriptRegistro.js"></script>
    
    <?php include("db.php"); 
    
    include("Includes/sessionSecurity.php");
    include("Includes/nav.php");

    ?>

</head>
    
<body>

    <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 85vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
    </div>
    
    
    <div class="container-fluid top-section">
        
        <div class="row">
            <!-- Columna para la tabla (Izquierda) -->
                
            <div class="col-md-6" style="max-height: 400px; overflow-y: auto;">

            <h4 class="mb-">Funcionarios registrados en la sede seleccionada</h4>

                <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento" />
                <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre" />

                <select class="form-select form-select-lg mb-3" id="sedeSelect" aria-label=".form-select-lg example" name = "sedePrueba">
                    

                <option value="Cenda Armenia">Cenda Armenia</option>
                    <option value="Cenda Buenaventura">Cenda Buenaventura</option>
                    <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
                    <option value="CDA Olmo">CDA Olmo</option>
                </select>
                
                

                <table class="table mx-auto mr-2"> <!-- Agregamos la clase mr-5 para mover la tabla más a la derecha -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sede</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                        $query = "SELECT * FROM funcionarios";
                        $result= mysqli_query($conn, $query);    

                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['sede']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['documento']; ?></td>
                            <td><?php echo $row['cargo']; ?></td>
                        </tr>
                    <?php } ?>
                     
            
                    </tbody>
                </table>
               
            </div>
            


  <!-- Columna para el formulario (Derecha) -->
  <div class="col-md-6 form-container">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 58vh;">
        <form class="container-form" method = "POST" action="guardarPrueba.php" id = "formularioResultado">
            <h5 class="mb-2">Resultado de la prueba</h5>
            <div class="form-outline mb-2">
                <input type="text" id="form3Example4" class="form-control form-control-lg" name = "pruebaNombreFuncionario" placeholder="Nombre del funcionario" />
            </div>
            <div class="form-outline mb-2">
                <input type="text" id="form3Example3" class="form-control form-control-lg" name = "pruebaDocumentoFuncionario" placeholder="Documento del funcionario" />
            </div>

            <div class="form-outline mb-2">
                <input type="text" id="sedeFuncForm" class="form-control form-control-lg" name = "sedeFuncForm" placeholder="Sede" />
            </div>

            <div class="form-outline mb-2">
                <input type="text" id="form3Example4" class="form-control form-control-lg" name = "pruebaNombreTomador" placeholder="Nombre de quien realiza" />
            </div>
            <div class="form-outline mb-2">
                <input type="text" id="form3Example3" class="form-control form-control-lg" name = "pruebaDocTomador" placeholder="Documento de quien realiza" />
            </div>

            <div class="form-outline mb-2">
                <input type="text" id="form3Example3" class="form-control form-control-lg" name = "numeroPrueba" placeholder="Número de prueba" />
            </div>
            <div>Resultado de la prueba</div>
            <div></div>
            <div></div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault1" value="Positivo" name = "resultadoPrueba">
                <label class="form-check-label" for="flexRadioDefault1">
                    Positivo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault2" value="Negativo" checked name = "resultadoPrueba">
                <label class="form-check-label" for="flexRadioDefault2">
                    Negativo
                </label>
            </div>
           
            <div class="form-outline mb-2" id="textoAdicional" style="display: none; width: 100%;">
                <input type="number" id="form3Example5" class="form-control form-control-lg" placeholder="Mg de alcohol" name="mg"  step="0.01">
                <label for="gradoAlcohol" id="gradoAlcoholLabel"></label>
                <input type="hidden" id="gradoAlcohol" name="grado" value="Grado de alcohol"> 
            </div>  
            
            <div class="text-center text-lg-start mt-2 pt-2">
                <button type="submit" id="btnSiguiente" class="btn btn-primary btn-lg" style="width: 100%;" name = "guardarPrueba">Registrar</button>
            </div>
            
        </form>


    </div>
</div>


        </div>
    </div>
    

    </body>

   
    <?php

    include("Includes/Footer.php")

    ?>
        
        

   

</html>