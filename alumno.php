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

    function action(){
        if(isset($_POST['submit'])){
            echo ($_POST['mostrarDatos']=='porPantalla')?"mostrarDatos.php":$_SERVER['PHP_SELF'];
        }else{
            echo $_SERVER['PHP_SELF'];       
        }
    }

    function checked($e,$v){
        if($e==$v){
            echo "checked";
        }  
    }


    ?>

    <div class="container">
        <form action='<?php action() ?>' method="post" onsubmit="actionJS()" id="form">
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
                            <input class="form-check-input" type="radio" name="enseñanza" id="secundaria" value="secundaria" required <?php checked($enseñanza,"secundaria")  ?> >
                            <label class="form-check-label" for="secundaria">Secundaria
                                <br>
                                <input class="form-check-input" type="radio" name="enseñanza" id="bachillerato" value="bachillerato" <?php checked($enseñanza,"bachillerato")  ?>  >
                                <label class="form-check-label" for="bachillerato">Bachillerato
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="enseñanza" id="cicloMedio" value="cicloMedio" <?php checked($enseñanza,"cicloMedio")  ?> >
                            <label class="form-check-label" for="cicloMedio">Ciclo Medio
                                <br>
                                <input class="form-check-input" type="radio" name="enseñanza" id="cicloSuperior" value="cicloSuperior" <?php checked($enseñanza,"cicloSuperior")  ?> >
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
            <div class="row">
                <div class="col-12">
                    <h3>
                        <?php 
                        var_dump($_POST);
                        echo "<br>";
                        var_dump($_POST['mostrarDatos'])
                        ?>
                    </h3>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        function actionJS(){
            var optionSelected = document.getElementById("mostrarDatos");
            var optionValue = optionSelected.value;
            console.log("Valor: " + optionValue);
            
            if(optionValue == "porPantalla"){
                var formulario = document.getElementById("form");
                formulario.action = "mostrarDatos.php";
                console.log("action: " + formulario.action);
            }
        }
    </script>
</body>

</html>