<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Cambia el color de fondo si lo deseas */
        }

        #signature-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #signature-pad {
            border: 1px solid #000;
        }

        .card {
            width: 100%;
            max-width: 600px; /* Ajusta el ancho máximo de la tarjeta según tus necesidades */
        }
    </style>
</head>
<body>
    <div id="signature-container">
        <div class="card bg-white shadow rounded-lg">
            <div class="card-body">
                <canvas id="signature-pad" width="550" height="300"></canvas>
                    <div class="mt-3">
                        <button id="clear-button" class="btn btn-danger">Borrar firma</button>
                        <button id="save-button" class="btn btn-primary">Guardar firma</button>
                    </div>
                    <div class="mt-3">
                        <img id="saved-signature" src="" style="display: none;" class="img-fluid">
                    </div>
            </div>
        </div>
    </div>
    <script src="JS/scriptfirma.js"></script>
</body>
</html>


