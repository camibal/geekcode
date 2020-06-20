<h1 class="text-center mt-5 h1_font_family">PRODUCTOS</h1><br><br>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Light mask</h3>
        <p>First text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Strong mask</h3>
        <p>Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Slight mask</h3>
        <p>Third text</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<?php
check_user("productos");

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

if(isset($busq) && isset($cat)){
	$q = $mysqli->query("SELECT * FROM productos WHERE name like '%$busq%' AND id_categoria = '$cat'");
}elseif(isset($cat) && !isset($busq)){
	$q = $mysqli->query("SELECT * FROM productos WHERE id_categoria = '$cat' ORDER BY id DESC");
}elseif(isset($busq) && !isset($cat)){
	$q = $mysqli->query("SELECT * FROM productos WHERE name like '%$busq%'");
}elseif(!isset($busq) && !isset($cat)){
	$q = $mysqli->query("SELECT * FROM productos ORDER BY id DESC");
}else{
	$q = $mysqli->query("SELECT * FROM productos ORDER BY id DESC");
}
?>

<!--/.Carousel Wrapper-->
<form method="post" action="" class="mt-5">
    <div class="row align-items-center mb-5" style="border: solid 1px #999999;">
		<div class="col-md-8">
				<h5 class="p-2 ml-5 text-secondary">Buscar...</h5>
		</div>
        <div class="col-md-4">
            <select id="categoria" name="cat" onchange="redir_cat()" class="form-control" style="font-size: 16px;">
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
</form>
<?php
if(isset($cat)){
	$sc = $mysqli->query("SELECT * FROM categorias WHERE id = '$cat'");
	$rc = mysqli_fetch_array($sc);
	?>
<h2 class="text-center"><?=$rc['categoria']?></h2>
<?php
}
?>
<div class="d-flex justify-content-center">
    <div class="container-productos mt-5" style="width: 85%">
        <?php
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
        <div class="producto mt-5">
            <div><img class="img_producto" src="productos/<?=$r['imagen']?>" /></div>
            <div class="name_producto"><?=$r['name']?></div>
            <div class="descripcion_producto"><?=$r['descripcion']?></div>
            <div class="row justify-content-center align-items-center">
                <?php
			if($r['oferta']>0){
				?>
                <del class="precio_oferta">$<?=$r['price']?></del>
                <span class="precio2"> $<?=$preciototal?></span>
            </div>
            <div class="row justify-content-center align-items-center">
                <?php
			}else{
				
				?>
                <span class="precio2"><br>$<?=$r['price']?> </span>
                <?php
			}
			?>
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
        window.location = "?p=productos&agregar=" + idp + "&cant=" + cant;
    }
}
function redir_cat() {

window.location = "?p=productos&cat=" + $("#categoria").val();

}
</script>