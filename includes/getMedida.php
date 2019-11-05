<?php
require ('../config.php');
$id_producto = $_POST['id_medidaF'];


$sth= mysqli_query($link,"SELECT id_medida, medida FROM `medida` WHERE `id_medida` = '".$id_producto."'");
$html = "<option value = '0'> Seleccionar Medida </option>";
while($r3 = mysqli_fetch_assoc($sth)) {
    $html = "<option value'".$r3['id_medida']."'>".$r3['medida']."</option>";
    								  }
echo $html;
?>