<?php
check_admin();

$id = clear($id);

$s = $mysqli->query("SELECT * FROM compra WHERE id = '$id'");
$r = mysqli_fetch_array($s);

$sc = $mysqli->query("SELECT * FROM clientes WHERE id = '".$r['id_cliente']."'");
$rc = mysqli_fetch_array($sc);

$nombre = $rc['name'];

?>
<h1>Viendo compra de <span style="color:#08f"><?=$nombre?></span></h1><br>

Fecha: <?=fecha($r['fecha'])?><br>
Monto: <?=number_format($r['monto'])?> <?=$divisa?><br>
Estado: <?=estado($r['estado'])?><br>
<br>
<div class="scrollmenu">
    <table class="table table-hover">
        <tr style="background-color: #222d32; color: #fff;">
            <th style="text-align: center;">
                <h4>Nombre del producto</h4>
            </th>
            <th style="text-align: center;">
                <h4>Cantidad<h4>
            </th>
            <th style="text-align: center;">
                <h4>Monto Unidad<h4>
            </th>
            <th style="text-align: center;">
                <h4>Monto Total<h4>
            </th>
        </tr>
        <?php
		$sp = $mysqli->query("SELECT * FROM productos_compra WHERE id_compra = '$id'");
		while($rp=mysqli_fetch_array($sp)){

			$spro = $mysqli->query("SELECT * FROM productos WHERE id = '".$rp['id_producto']."'");
			$rpro = mysqli_fetch_array($spro);

			$nombre_producto = $rpro['name'];
			$id_img = $rpro['id'];
			$imagen = $rpro['imagen'];

			$montototal = $rp['monto'] * $rp['cantidad'];
			?>
        <tr>
            <td style="width: 20%; border: solid 1px; text-align: center"><?=$nombre_producto?><br>
                <img src="../productos/<?=$imagen?>" width="70%" alt=""><br>
                <?=$id_img?>
            </td>
            <td style="border: solid 1px; text-align: center;">
                <div style="margin-top: 60px;"><?=$rp['cantidad']?></div>
            </td>
            <td style="border: solid 1px; text-align: center;">
                <div style="margin-top: 60px;">$<?=$rp['monto']?></div>
            </td>
            <td style="border: solid 1px; text-align: center;">
                <div style="margin-top: 60px;">$<?=$montototal?></div>
            </td>
        </tr>
        <?php
		}
	?>
    </table>
</div>