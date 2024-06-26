<?php include_once "../login/verificar_sesion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Archivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./salida.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form id="form-container" class="text-center border border-light p-3 shadow-lg rounded-lg" style="border-radius: 18px; margin-top: 18px;" enctype="multipart/form-data" method="POST" action="./realizar_salida.php">
                    <p class="h2 mb-4">Salida de inventario</p>
                
                    <!-- Campo oculto para el ID de salida -->
                    <input type="hidden" id="idSalida" name="idSalida" value="">
                
                    <!-- Resto de los campos del formulario -->
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-6">
                            <label for="evidencias" class="form-label subir">Evidencias</label>
                            <div class="input-group">
                                <input type="file" class="form-control custom-file-input" id="evidencias" name="evidencias[]" multiple aria-describedby="inputGroupFileAddon1" accept=".pdf,.jpg,.png,.doc,.docx">
                                <label class="input-group-text" for="evidencias" id="evidenciasLabel"><i class="fas fa-check-circle"></i></label>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-6">
                            <label for="documentacion" class="form-label subir">Documentación</label>
                            <div class="input-group">
                                <input type="file" class="form-control custom-file-input" id="documentacion" name="documentacion[]" multiple aria-describedby="inputGroupFileAddon2" accept=".pdf,.doc,.docx">
                                <label class="input-group-text" for="documentacion" id="documentacionLabel"><i class="fas fa-check-circle"></i></label>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-6">
                            <label for="fechaHora" class="form-label">Fecha y Hora del Sistema</label>
                            <input type="text" class="form-control" id="fechaHora" name="fechaHora" readonly>
                        </div>
                    </div>
                
                    <button type="button" class="btn btn-info btn-lg" id="openModalBtn">Dar salida</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmación de Salida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Aquí va la información que quieres mostrar -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmSalidaBtn">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./salida.js"></script>
</body>
</html>
