<?php
check_user('ver_compra');
$id = clear($id);

$s = $mysqli->query("SELECT * FROM compra WHERE id = '$id' AND id_cliente = '".$_SESSION['id_cliente']."'");

if(mysqli_num_rows($s)>0){

$s = $mysqli->query("SELECT * FROM compra WHERE id = '$id'");
$r = mysqli_fetch_array($s);

$sc = $mysqli->query("SELECT * FROM clientes WHERE id = '".$r['id_cliente']."'");
$rc = mysqli_fetch_array($sc);

$nombre = $rc['name'];

?>
<h3 class="viendo_compra">Viendo compra #<span style="color:#08f"><?=$r['id']?></span></h3><br>
<h1 class="text-center">MI PEDIDO</h1>
<div class="row mt-5">
    <i class="fa fa-calendar text_orange ml-3"></i>&nbsp &nbsp Fecha: <?=fecha($r['fecha'])?><br>
</div>
<div class="row">
    <i class="fa fa-credit-card text_orange ml-3"></i>&nbsp &nbsp Monto: $<?=number_format($r['monto'])?><br>
</div>
<div class="row">
    <i class="fa fa-outdent text_orange ml-3"></i>&nbsp &nbsp Estado: <?=estado($r['estado'])?><br>
</div>
<br>
<div class="scrollmenu">
    <table class="table table-hover" style="font-size: 20px; text-align: center;">
        <tr style="background-color: #999999; color: #fff;">
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Monto</th>
            <th>Monto Total</th>
        </tr>
        <?php
		$sp = $mysqli->query("SELECT * FROM productos_compra WHERE id_compra = '$id'");
		while($rp=mysqli_fetch_array($sp)){

			$spro = $mysqli->query("SELECT * FROM productos WHERE id = '".$rp['id_producto']."'");
			$rpro = mysqli_fetch_array($spro);

			$nombre_producto = $rpro['name'];

			$montototal = $rp['monto'] * $rp['cantidad'];
			?>
        <tr>
            <td><?=$nombre_producto?></td>
            <td><?=$rp['cantidad']?></td>
            <td>$<?=$rp['monto']?></td>
            <td>$<?=$montototal?></td>
        </tr>
        <?php
		}
	?>
    </table>
</div>
<br>
<br>
<!--
<?php
if(estado($r['estado']) == "Iniciando"){
	?>
	<a class="btn btn-primary" href="?p=pagar_compra&id=<?=$r['id']?>">
		Pagar
	</a>
	<?php
}
?>

<?php

}else{
	alert("Ha ocurrido un error");
	redir("?p=miscompras");
}?>-->