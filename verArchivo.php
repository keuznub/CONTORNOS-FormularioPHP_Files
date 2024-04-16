<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="alumno.css">
    <title>Mostrar Datos</title>
</head>

<body>

    <?php

    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $telefono = isset($_POST['telefono'])?$_POST['telefono']:"";
    $enseñanza = isset($_POST['enseñanza'])?$_POST['enseñanza']:"";
    $mostrarDatos = isset($_POST['mostrarDatos'])?$_POST['mostrarDatos']:"";

    function leerArchivo(){
        $file = fopen("archivo.txt", "r");
        while(!feof($file)){
            echo fgets($file)."<br>";
        }
        fclose($file);
    }


    ?>  


    <div class="container">
        <form action="alumno.php" method="post">
            <div class="section">
                <div class="row">
                    <div class="col-12">
                        <h3>
                            <?php leerArchivo() ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row enviar">
                <div class="col-12">
                    <input class="btn btn-secondary" type="submit" name="submit" id="submit" value="Volver">
                </div>
            </div>
            <div>
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                <input type="hidden" name="telefono" id="telefono" value="<?php echo $telefono ?>">
                <input type="hidden" name="enseñanza" id="enseñanza" value="<?php echo $enseñanza ?>">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>