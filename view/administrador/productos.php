<div class="page-404 padding ptb-xs-40">
    <div class="container">
        <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
        
        </script>
        <script src="index.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#hola").click(function () {
                                
                              $("#select-beast option:selected").each(function () {
                                var id_medida = $(this).val();
                                alert(id_medida);

                               $.ajax({
                                        type: "post",
                                        url: "getIdmedida.php",
                                        data: {MedidaA: id_medida},      
                                        success: function (response){
                                        alert(response); 
                                        }
                                    });
                    
                                       
                               });

                              })
});
        </script>
        
        </head>
        <?php 
            
        if(isset($_GET['eliminar'])){ 
            mysqli_query($link,"DELETE FROM `producto` WHERE `id_producto` = '".$_GET['eliminar']."'"); 
            echo "<script>alert('Borrado con éxitoj');location.href='?pag=".$_GET['pag']."';</script>";
            
        }
        if(isset($_GET['nuevo'])){
        
                if(isset($_GET['nuevo1'])){
                    
                     
                    $queryM= "SELECT id_producto FROM producto ORDER BY id_producto DESC LIMIT 0, 1";
                    $sth = mysqli_query($link,$queryM);
                    $r2 = mysqli_fetch_assoc($sth);

                    $numid= intval($r2['id_producto'])+1;
                    echo $numid;
                    mysqli_query($link,"INSERT INTO `producto`(`nombre`, `id_asada`) VALUES ('".$_POST['nombre']."','".$_SESSION["asada"]."')");
                   if(isset($_POST['MedidaA'])){
                    $prueba= $_POST['MedidaA'];
                    mysqli_query($link,"INSERT INTO `productoxmedida`(`id_productoF`, `id_medidaF`) VALUES ('".$numid."','".$prueba."')");
                    exit;
                    }

                    
                    //echo "<script>alert('Insertado con éxito');location.href='?pag=".$_GET['pag']."';</script>";
                
                    
                }
        ?>
        <center>
        <h1>Nuevo Item</h1>
        </center>
        <form method="post" action="" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nombre</label>
                <div class="col-md-4">
                <input id ="prub" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" required>
              
                </div>
                  <div class="col-md-4">
                    <label class="col-md-4 control-label" for="textinput">Medida</label>  
                          <select id="select-beast" name="codigo" required >
                            <option value="0" selected>Seleccionar</option>
                            <?php 
                            //hay que enviarle el valor de id_medida al forum de arriba con el tutorial de ayer, mediante kavascript.
                              $query="select id_medida, medida from medida";
                              $sth = mysqli_query($link,$query);

                                while($r2 = mysqli_fetch_assoc($sth)) { ?>

                                    <option id ="" value="<?php echo $r2['id_medida']; ?>"><?php echo $r2['medida']; ?></option>
                            <?php } ?>
                          </select> 
                    <script type="text/javascript">
                            $('#select-beast').selectize({ create: true, sortField: 'text' });
                    </script>
                    </div>
                   
            </div>
            <center><button id="hola" class="btn btn-success" type="submit">Guardar</button></center>
        </form>
        <?php }elseif(isset($_GET['editar'])){ 
                $sth = mysqli_query($link,"SELECT * FROM `producto` WHERE `id_producto` = '".$_GET['editar']."'");
                $datos = mysqli_fetch_assoc($sth);
                if(isset($_GET['editar1'])){
            
                    mysqli_query($link,"UPDATE `producto` SET `nombre`='".$_POST['nombre']."',`id_asada`='".$_SESSION["asada"]."' WHERE `id_producto`=  '".$_GET['editar']."' ");
                    echo "<script>alert('Actualizado con éxito');location.href='?pag=".$_GET['pag']."';</script>";
                } ?>
        <center>
            <h1>Editar Item</h1>
        </center>
        <form method="post" action="?pag=<?php echo $_GET['pag']; ?>&editar=<?php echo $_GET['editar']; ?>&editar1=1" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nombre</label>
                <div class="col-md-4">
                    <input name="nombre" type="text" placeholder="Nombre" value="<?php echo $datos['nombre']; ?>" class="form-control input-md" required>
                </div>
            </div>
            <center><button class="btn btn-success" type="submit">Enviar</button></center>
        </form>
        <?php }else { ?>
        <center>
            <h1>Administracion de productos de inventario</h1>
        </center>
        <center><a href="?pag=<?php echo $_GET['pag']; ?>&nuevo=1" class="btn btn-success" href="#">Nuevo Item</a></center>
        <br>
        <table class="table">

            <tr class="warning">
                <th>
                    <center><b>Código producto</b></center>
                </th>
                <th>
                    <center><b>Nombre</b></center>
                </th>
                <th>
                    <center><b>Medida</b></center>
                </th>
                <th>
                    <center><b>Acciones</b></center>
                </th>
            </tr>
            <?php 
                    
                    
                    $consulta= "select producto.id_producto, producto.id_asada,producto.nombre, medida.id_medida, medida.medida, productoxmedida.id_productoF,
productoxmedida.id_medidaF from producto, medida, productoxmedida where productoxmedida.id_productoF = producto.id_producto and
productoxmedida.id_medidaF = medida.id_medida and producto.id_asada ='".$_SESSION["asada"]."'";
                    $sth = mysqli_query($link,$consulta);
        
                     
                     
                    if (!isset($_GET["pagina"])) {
                        $inicio = 0;
                        $pagina = 1;
                    } else {
                        $inicio = ($_GET["pagina"] - 1) * $TAMANO_PAGINA;
                        $pagina = $_GET["pagina"];
                    }
                    $url= "?pag=".$_GET['pag']."";
                    $total_paginas = ceil(mysqli_num_rows($sth) / $TAMANO_PAGINA);
                    $consulta .=  " LIMIT ".$inicio."," . $TAMANO_PAGINA;
                    //$sth = mysqli_query($link,$consulta);
                     
                     
                     
                    while($r = mysqli_fetch_assoc($sth)) {
                        echo '
                         <tr class="success">
                            <th> <center>   '.$r['id_producto'].'   </center></th>
                            <th> <center>   '.$r['nombre'].'        </center></th>
                            <th> <center>   '.$r['medida'].'        </center></th>
                             <th><center>
                                <a href="?pag='.$_GET['pag'].'&editar='.$r['id_producto'].'&cerrar=1"  class="btn btn-warning">Editar</a>
                                <a href="?pag='.$_GET['pag'].'&eliminar='.$r['id_producto'].'&cerrar=1" onclick="javascript: return confirm('."'".'¿Estas seguro?'."'".');"  class="btn btn-danger">Eliminar</a>
                                </center>
                            </th>
                          </tr>';

                          
                    }
                ?>
        </table>
         <center>
            <ul class="pagination">
                <?php 
                if ($total_paginas > 1) {
                    if ($pagina != 1)
                      echo ' <li><a href="'.$url.'&pagina='.($pagina-1).'">«</a></li>';
                      for ($i=1;$i<=$total_paginas;$i++) {
                         if ($pagina == $i)
                          echo "<li class='active'><a href='".$url."&pagina=".$pagina."'>$pagina<span class='sr-only'>(current)</span></a></li>";
                         else
                            echo ' <li><a href="'.$url.'&pagina='.$i.'">'.$i.'</a></li>';
                      }
                      if ($pagina != $total_paginas)
                         echo '<li><a href="'.$url.'&pagina='.($pagina+1).'">»</a></li>';
                    }
                ?>
            </ul>
            </center>
        <?php } ?>
    </div>
</div>
