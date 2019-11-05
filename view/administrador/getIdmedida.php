<?php 

if(isset($_POST['MedidaA'])){
   	$queryM= "SELECT id_producto FROM producto ORDER BY id_producto DESC LIMIT 0, 1";
                    $sth = mysqli_query($link,$queryM);
                    $r2 = mysqli_fetch_assoc($sth);

                    $numid= intval($r2['id_producto'])+1;
                    echo $numid;
                    mysqli_query($link,"INSERT INTO `producto`(`nombre`, `id_asada`) VALUES ('".$_POST['nombre']."','".$_SESSION["asada"]."')");
                   
                    $prueba= $_POST['MedidaA'];
                    $numid=4;
                    mysqli_query($link,"INSERT INTO `productoxmedida`(`id_productoF`, `id_medidaF`) VALUES ('".$numid."','".$prueba."')");	 
}



?>