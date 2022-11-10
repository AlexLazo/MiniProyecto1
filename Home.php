<?php
include_once('conf/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
<?php 
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "miniproyecto";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}


if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
if (!isset($_POST['buscamarca'])){$_POST['buscamarca'] = '';}
if (!isset($_POST['color'])){$_POST['color'] = '';}
if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
if (!isset($_POST["orden"])){$_POST["orden"] = '';}

?>
<div id="menu">
        <ul>
            <li>Bienvenido</li>
            <li class="cerrar-sesion"><a href="index.php">Cerrar sesión</a></li>
        </ul>
</div>
<br>
<div class="container mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                <h4 class="card-title">Buscador</h4>


                    <form id="form2" name="form2" method="POST" action="Home.php">
                        <div class="col-12 row">
                            <div class="mb-3">
                                <label  class="form-label">Nombre a buscar</label>
                                <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
                            </div>
                            <h4 class="card-title">Filtro de búsqueda</h4>

                                <div class="col-11">
                                    <table class="table">
                                        <thead>
                                            <tr class="filters">
                                                <th>
                                                    Marca
                                                    <select id="assigned-tutor-filter" id="buscamarca" name="buscamarca" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                    <?php if ($_POST["buscamarca"] != ''){ ?>
                                                        <option value="<?php echo $_POST["buscamarca"]; ?>"><?php echo $_POST["buscamarca"]; ?></option>
                                                    <?php } ?>
                                                        <option value="">Todos</option>
                                                        <option value="Nissan">Nissan</option>
                                                        <option value="Toyota">Toyota</option>
                                                        <option value="Mitsubishi">Mitsubishi</option>
                                                        <option value="Izuzu">Izuzu</option>
                                                        <option value="Jeep">Jeep</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    Fecha desde:
                                                    <input type="date" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"];?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                    Fecha hasta:
                                                    <input type="date" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"];?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                    Color
                                                    <select id="subject-filter" id="color" name="color" class="form-control mt-2"  style="border: #bababa 1px solid; color:#000000;">
                                                        <?php if($_POST["color"] != ''){?>
                                                        <option value="<?php echo $_POST["color"];?>"><?php echo $_POST["color"];?></option>
                                                        <?php } ?>
                                                        <option value="">Todos</option>
                                                        <option style="color:blue;" value="Azul">Azul</option>
                                                        <option style="color:brown;" value="Cafe">Café</option>
                                                        <option style="color:red;" value="Rojo">Rojo</option>
                                                        <option style="color:gray;" value="Gris">Gris</option>
                                                        <option style="color:yellow;" value="Amarillo">Amarillo</option>
                                                        <option style="color:green" value="Verde">Verde</option>
                                                    </select>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <h4 class="card-tittle">Ordenar por</h4>
                                <div class="col-11">
                                    <table class="table">
                                        <thead>
                                            <tr class="filters">
                                                <th>
                                                    Selecciona el Orden
                                                    <select name="orden" id="assigned-tutor-filter" id="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;">
                                                            <?php
                                                            if($_POST["orden"] != ''){ ?>
                                                            <option value="<?php echo $_POST["orden"];?>">
                                                                <?php
                                                                if($_POST["orden"] == '1'){echo 'Ordenar por nombre';}
                                                                if($_POST["orden"] == '2'){echo 'Ordenar por color';}
                                                                if($_POST["orden"] == '3'){echo 'Ordenar por Fecha Ascendente';}
                                                                if($_POST["orden"] == '4'){echo 'Ordenar por Fecha Descendente';}
                                                                ?>
                                                            
                                                        </option>
                                                        <?php } ?>
                                                        <option value=""></option>
                                                        <option value="1">Ordenar por nombre</option>
                                                        <option value="2">Ordenar por color</option>
                                                        <option value="3">Ordenar por Fecha Ascendente</option>
                                                        <option value="4">Ordenar por Fecha Descendente</option>
                                                </select>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-1">
                                    <input type="submit" class="btn" value="Ver" style="margin-top: 38px; background-color:purple; color:white;">
                                </div>
                        </div>
                        <?php 

        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
        $aKeyword = explode(" ", $_POST['buscar']);
        
       
        if ($_POST["buscar"] == '' AND $_POST['buscamarca'] == '' AND $_POST['color'] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == ''){
            $query ="SELECT * FROM carro";
        }else{

                $query ="SELECT * FROM carro ";

        if ($_POST["buscar"] != '' ){ 
                $query .=  "WHERE (Modelo LIKE LOWER('%".$aKeyword[0]."%') OR Marca LIKE LOWER('%".$aKeyword[0]."%')) ";
        
        for($i = 1; $i < count($aKeyword); $i++) {
           if(!empty($aKeyword[$i])) {
               $query .= " OR Modelo LIKE '%" . $aKeyword[$i] . "%' OR Marca LIKE '%" . $aKeyword[$i] . "%'";
           }
         }

        }

         if ($_POST["buscamarca"] != '' ){
                $query .= " AND Marca = '".$_POST['buscamarca']."' ";
         }
        if ($_POST["buscafechadesde"] != '' ){
                $query .= " AND Fecha_importacion BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
        }
        if ($_POST["color"] != '' ){

            $query .= " AND color = '".$_POST["color"]."' ";

         }

        if ($_POST["orden"] == '1' ){
                $query .= " ORDER BY Marca ASC ";
        }
            
        if ($_POST["orden"] == '2' ){
                $query .= " ORDER BY Color ASC ";
        }
        if ($_POST["orden"] == '3' ){
                $query .= " ORDER BY Fecha_importacion ASC ";
        }
        if ($_POST["orden"] == '4' ){
                $query .= " ORDER BY Fecha_importacion DESC ";
        }
        }       
        $sql = $conexion->query($query);

        $numeroSql = mysqli_num_rows($sql);
        ?>

        <p style="font-weight: bold; color:palevioletred;">
            <i class="mdi mdi-file-document"></i>
            <?php
            echo $numeroSql; 
            ?>
            Resultados Encontrados
        </p>
    
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
     <h2>Tabla</h2>
     <table class="table table-bordered table-dark table-hover">
            <tr style="background-color:palevioletred; color:#FFFFFF; text-align: center;">
                <th>id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Distribuidor</th>
                <th>Fecha</th>
            </tr>
            <tbody>
            <?php 
            
            While($rowSql = $sql->fetch_assoc()) {   ?>
                <tr>
                    <td style="text-align: center;"><?php echo $rowSql["id_carro"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["Marca"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["Modelo"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["tipo_vehiculo"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["Color"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["Id_Distribuidor"]; ?></td>
                    <td style="text-align: center;"><?php echo $rowSql["Fecha_importacion"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

     </div>
</div>
<br>
    
</body>
</html>
<?php
mysqli_close($conexion);
?>