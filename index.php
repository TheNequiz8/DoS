<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>


<?php include("conexion.php"); ?>


<div class="container mt-5">
    <div class="col-12">
 


        <div class="row">
                <div class="col-12 grid-margin">
                        <div class="card">
                                <div class="card-body">

                                        <h4 class="card-title">CONALEP</h4>


                                        <form id="form2" name="form2" method="POST" action="index.php">
                                                <div class="col-12 row">
                                                        <div class="col-11">
                                                            <label  class="form-label">Nombre a buscar: </label>
                                                            <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"]?>">
                                                            <select name="sel">
                                                                        <option value="Todos">Todos</option>
                                                                        <option value="Genero">Genero</option>
                                                                        <option value="Titulo">Titulo</option>
                                                                        <option value="Autor">Autor</option>
                                                                        <option value="Editorial">Editorial</option>
                                                            </select>     
                                                        </div>
                                                        <div class="col-1">
                                                                <input type="submit" class="btn btn-success" value="Ver" style="margin-top: 30px;">
                                                        </div>
                                                </div>

                                                <?php 
                                                $sql=$conexion->query("SELECT * FROM biblioteca WHERE Genero LIKE '%".$_POST["buscar"]."%' OR Autor LIKE '%".$_POST["buscar"]."%' OR Titulo LIKE '%".$_POST["buscar"]."%' OR Editorial LIKE '%".$_POST["buscar"]."%'   ");
                                                
                                                ?>
                                                <p style="font-weight: bold; color:green;"><i class="mdi mdi-file-document"></i> Resultados encontrados</p>
                                        </form>


                                        <div class="table-responsive">
                                                <table class="table">
                                                        <thead>
                                                                <tr style="background-color: #00695c; color:#FFFFFF;">
                                                                        <th style=" text-align: center;"> Genero </th>
                                                                        <th style=" text-align: center;"> Titulo </th>
                                                                        <th style=" text-align: center;"> Autor </th>
                                                                        <th style=" text-align: center;"> Editorial </th>
                                                                        <th style=" text-align: center;"> Fecha de Publicación</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while ($rowSql = $sql->fetch_array()){ ?>
                                                
                                                                <tr>
                                                                <td style="text-align: center;"><?php echo $rowSql["Genero"]; ?></td>
                                                                <td style="text-align: center;"><?php echo $rowSql["Titulo"]; ?></td>
                                                                <td style="text-align: center;"><?php echo $rowSql["Autor"]; ?></td>
                                                                <td style="text-align: center;"><?php echo $rowSql["Editorial"]; ?></td>
                                                                <td style=" text-align: center;"><?php echo $rowSql["Fecha de publi"]; ?></td>
                                                                </tr>
                                                
                                                <?php } ?>
                                                        </tbody>
                                                </table>
                                        </div>


                                </div>
                        </div>
                </div>
        </div>


    </div>
</div>

</body>
</html>