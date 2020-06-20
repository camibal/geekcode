<div class="d-flex justify-content-center">
    <div class="container-ofertas" style="width: 85%">
    <h1 class="text-center mt-5 h1_font_family">OFERTAS</h1><br><br>
        <div class="row align-items-center mb-5" style="border: solid 1px #999999;">
        <div class="col-md-8">
				<h5 class="p-2 ml-5 text-secondary">Buscar...</h5>
		</div>
            <div class="col-md-4">
                <select id="categoria" onchange="redir_cat()" class="form-control">
                    <option value="">Seleccione una categoria para filtrar</option>
                    <?php
	$cats = $mysqli->query("SELECT * FROM categorias ORDER BY categoria ASC");
	while($rcat = mysqli_fetch_array($cats)){
		?>
                    <option value="<?=$rcat['id']?>"><?=$rcat['categoria']?></option>
                    <?php
	}
	?>
                </select>
            </div>
        </div>
        <?php
if(isset($cat)){
	$sc = $mysqli->query("SELECT * FROM categorias WHERE id = '$cat'");
	$rc = mysqli_fetch_array($sc);
	?>
<h2 class="text-center"><?=$rc['categoria']?></h2>
<?php
}
?>
        <?php
if(isset($agregar) && isset($cant)){

	$idp = clear($agregar);
	$cant = clear($cant);
	$id_cliente = clear($_SESSION['id_cliente']);

	$v = $mysqli->query("SELECT * FROM carro WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");

	if(mysqli_num_rows($v)>0){

		$q = $mysqli->query("UPDATE carro SET cant = cant + $cant WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");
	
	}else{

		$q = $mysqli->query("INSERT INTO carro (id_cliente,id_producto,cant) VALUES ($id_cliente,$idp,$cant)");

	}

	alert("Se ha agregado al carro de compras",1,'productos');
	//redir("?p=productos");
}

if(isset($cat)){
	$q = $mysqli->query("SELECT * FROM productos WHERE id_categoria = '$cat' AND oferta>0 ORDER BY id DESC");
}else{
	$q = $mysqli->query("SELECT * FROM productos WHERE oferta>0 ORDER BY id DESC");
}
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
                <del class="precio_oferta">$<?=$r['price']?></del> <span class="precio2">$<?=$preciototal?> </span>
            </div>
            <div class="row justify-content-center align-items-center">
                <button class="btn pull-right" onclick="agregar_carro('<?=$r['id']?>');"><i
                        class="i_btn_carrito">Agregar al carrito</i></button>
            </div>
        </div>
        <?php
}
?>
    </div>
</div>
<script type="text/javascript">
function agregar_carro(idp) {
    var cant = prompt("¿Que cantidad desea agregar?", 1);

    if (cant.length > 0) {
        window.location = "?p=ofertas&agregar=" + idp + "&cant=" + cant;
    }
}

function redir_cat() {

    window.location = "?p=ofertas&cat=" + $("#categoria").val();

}
</script>