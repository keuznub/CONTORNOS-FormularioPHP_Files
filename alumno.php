<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="alumno.css">
    <title>Document</title>
</head>

<body>
    
<?php
    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $telefono = isset($_POST['telefono'])?$_POST['telefono']:"";
    $enseñanza = isset($_POST['enseñanza'])?$_POST['enseñanza']:"";
    $mostrarDatos = isset($_POST['mostrarDatos'])?$_POST['mostrarDatos']:"";
    $arrayValoresArchivo = array("nombre"=>$nombre,"telefono"=>$telefono,"enseñanza"=>$enseñanza);

    function checked($e,$v){
        if($e==$v){
            echo "checked";
        }  
    }


    function escribirArchivo($v){

            $file = fopen("archivo.txt", "w");
            fwrite($file, "-------Persona-------". PHP_EOL);
            fwrite($file, "Nombre: ".$v["nombre"]. PHP_EOL);
            fwrite($file, "Telefono: ".$v["telefono"]. PHP_EOL);
            fwrite($file, "Enseñanza: ".$v["enseñanza"]. PHP_EOL);
            fclose($file);
    }

    if($mostrarDatos == "enArchivoDatos"){
        escribirArchivo($arrayValoresArchivo);
    }


?>

    <div class="container">
        <form action='<?php echo $_SERVER["PHP_SELF"] ?>' method="post" onsubmit="actionJS()" id="form">
            <div class="section">
                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-label" for="nombre">Introduzca su nombre: </label>
                    </div>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="nombre" id="nombre" size="20" value="<?php echo $nombre ?>" required>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-label" for="telefono">Telefono: </label>
                    </div>
                    <div class="col-sm-7">
                        <input class="form-control" type="tel" name="telefono" id="telefono" size="8" value="<?php echo $telefono ?>" required>
                    </div>
                    <br>
                </div>
            </div>
            <div class="section">
                <div class="form-check">
                    <h3 class="form-label">Enseñanzas</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="enseñanza" id="secundaria" value="Secundaria" required <?php checked($enseñanza,"Secundaria")  ?> >
                            <label class="form-check-label" for="secundaria">Secundaria
                                <br>
                                <input class="form-check-input" type="radio" name="enseñanza" id="bachillerato" value="Bachillerato" <?php checked($enseñanza,"Sachillerato")  ?>  >
                                <label class="form-check-label" for="bachillerato">Bachillerato
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="enseñanza" id="cicloMedio" value="Ciclo Medio" <?php checked($enseñanza,"Ciclo Medio")  ?> >
                            <label class="form-check-label" for="cicloMedio">Ciclo Medio
                                <br>
                                <input class="form-check-input" type="radio" name="enseñanza" id="cicloSuperior" value="Ciclo Superior" <?php checked($enseñanza,"Ciclo Superior")  ?> >
                                <label class="form-check-label" for="cicloSuperior">Ciclo Superior
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="mostrarDatos">Mostrar Datos</label>
                        <select class="form-select" name="mostrarDatos" id="mostrarDatos" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="porPantalla" >Por pantalla</option>
                            <option value="enArchivoDatos" >En Archivo datos.txt</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row enviar">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Enviar">
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
                Archivo escrito Exitosamente!
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        addEventListener("DOMContentLoaded", function(){
            var optionValue = "<?php echo $mostrarDatos; ?>";
            if(optionValue == "enArchivoDatos"){
                var alertas = document.getElementsByClassName("alert");
                var alerta = alertas[0];
                alerta.style.opacity = "100%";
                setTimeout(function(e){
                    alerta.style.opacity ="0%";
                },1500);
            }
        });
        function actionJS(){
            var optionValue = document.getElementById("mostrarDatos").value;
            if(optionValue == "porPantalla"){
                var formulario = document.getElementById("form");
                formulario.action = "mostrarDatos.php"; 
                
            }
        }
        
    </script>
</body>

</html>