<?php
if(isset($agregar) && isset($cant)){


	if(!isset($_SESSION['id_cliente'])){
		redir("?p=login");
	}


	$idp = clear($agregar);
	$cant = clear($cant);
	$id_cliente = clear($_SESSION['id_cliente']);

	$v = $mysqli->query("SELECT * FROM carro WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");

	if(mysqli_num_rows($v)>0){

		$q = $mysqli->query("UPDATE carro SET cant = cant + $cant WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");
	
	}else{

		$q = $mysqli->query("INSERT INTO carro (id_cliente,id_producto,cant) VALUES ($id_cliente,$idp,$cant)");

	}

	alert("Se ha agregado al carro de compras",1,'principal');
	//redir("?p=principal");
}
?>
<div class="d-flex justify-content-center">
    <div class="container-principal" style="width: 85%">
        <h1 class="text-center h1_font_family">ULTIMOS PRODUCTOS AGREGADOS</h1><br><br>
        <?php
$q = $mysqli->query("SELECT * FROM productos WHERE oferta = 0 ORDER BY id DESC LIMIT 4");

while($r=mysqli_fetch_array($q)){
	$preciototal = 0;
			if($r['oferta']>0){
				if(strlen($r['oferta'])==1){
					$desc = "0.0".$r['oferta'];
				}else{
					$desc = "0.".$r['oferta'];
				}

				$preciototal = $r['price'] -($r['price'] * $desc);
			}else{
				$preciototal = $r['price'];
			}
	?>
        <div class="producto">
            <div><img class="img_producto" src="productos/<?=$r['imagen']?>" /></div>
            <div class="name_producto"><?=$r['name']?></div>
            <div class="descripcion_producto"><?=$r['descripcion']?></div>
            <div class="row justify-content-center align-items-center">
                <?php
			if($r['oferta']>0){
				?>
                <del><?=$r['price']?></del> <span class="precio2">$<?=$preciototal?></span>
                <?php
			}else{
				?>
                <span class="precio2"><br>$<?=$r['price']?></span>
                <?php
			}
			?>
            </div>
            <input type="number" id="cant<?=$r['id']?>" name="cant" class="cant pull-right"
                style="width: 100%;" value="1" />
            <div class="row justify-content-center align-items-center mt-2">
                <button class="btn pull-right"
                    onclick="agregar_carro('<?=$r['id']?>');"><i class="i_btn_carrito">Agregar al
                        carrito</i></button>
            </div>
        </div>
        <?php
}
?>

        <h1 class="text-center mt-5 h1_font_family">ULTIMAS OFERTAS AGREGADAS</h1><br><br>

        <?php
	$q = $mysqli->query("SELECT * FROM productos WHERE oferta>0 ORDER BY id DESC LIMIT 4");

	while($r=mysqli_fetch_array($q)){
	$preciototal = 0;

			if($r['oferta']>0){
				if(strlen($r['oferta'])==1){
					$desc = "0.0".$r['oferta'];
				}else{
					$desc = "0.".$r['oferta'];
				}

				$preciototal = $r['price'] -($r['price'] * $desc);
			}else{
				$preciototal = $r['price'];
			}

	?>
        <div class="producto">
            <div><img class="img_producto" src="productos/<?=$r['imagen']?>" /></div><br>
            <div class="name_producto"><?=$r['name']?></div>
            <div class="descripcion_producto"><?=$r['descripcion']?></div>
            <div class="row justify-content-center align-items-center">
                <del class="precio_oferta">$<?=$r['price']?></del>
                <span class="precio2">$<?=$preciototal?></span>
            </div>
            <input type="number" id="cant<?=$r['id']?>" name="cant" class="cant pull-right input_cantidad_principal"
                style="width: 90%" value="1" />
            <div class="row justify-content-center align-items-center">
                <button class="btn pull-right" onclick="agregar_carro('<?=$r['id']?>');">
                    <i class="i_btn_carrito">Agregar al carrito</i>
                </button>
            </div>
        </div>
        <?php
}
?>
    </div>
</div>



<script type="text/javascript">
function agregar_carro(idp) {

    cant = $("#cant" + idp).val();

    if (cant.length > 0) {
        window.location = "?p=principal&agregar=" + idp + "&cant=" + cant;
    }
}
</script>