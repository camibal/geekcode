<?php
include "configs/config.php";
include "configs/funciones.php";
	
if(!isset($p)){
	$p = "principal";
}else{
	$p = $p;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/index.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/LOGO-GEEK-CODE.jpg">
    <title>Geek Code</title>
</head>

<body style="font-family: 'Oswald', sans-serif;">
   <!--menu responsive-->
   <nav class="navbar navbar-expand-md d-xs-block d-md-none" style="z-index: 10000; width: 1%;">
        <div class="navbar-nav">
            <input type="checkbox" id="abrir-cerrar" class="width_menu" name="abrir-cerrar" value="">
            <label for="abrir-cerrar" class="ubicacion_btn_menu  mb-5">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATcAAACiCAMAAAATIHpEAAAAY1BMVEX///8AAADc3Ny9vb20tLSRkZHk5OTn5+fKysrh4eGFhYVRUVHu7u5DQ0NmZmaCgoKdnZ0YGBirq6tZWVlISEh8fHzV1dU2NjY+Pj4hISFycnL29vaXl5dNTU2MjIzR0dGlpaVSL/u6AAABdElEQVR4nO3dDU7CQBgEUCrIj6AICCoqcv9TKhov8K062eS9G8yEEprOltEIAAAAAAAAAAAAAAB+3eq0GRLWi3TyJuNIaV+26ewN5rnaui4uWdswzNLxq7bZ3m7S+at22d426fxVt9nehnT+qge9leyztS3T+asO2d4m6fxly2Rtj+n0DZ5ytT2v0uFbnFK1HV/S0dusttcB527vFQAAAAAAAPhns6uAaTp1q0Pokf3DOJ28yWumtYt9OnuDc662jueWo5dkbcNwSOevCl6lF8d0/qrojGvod29p31vzpreS2Pjt2106f9U029s8nb9snayt24/bp2OutmXXQ9XYQcpzOnmr93FAv19tAAAAAAAA/LP5JKDvleoo+IrL63TyJp7Xl9iHlCyStXW8Rwrv33bp/FX2ljX2vTX25DX32dq6PWkUPi9zlc5fFj2fdUqnbxC8Utfp7E0Wof8S2HX7o/fHahrg9b0AAAAAAAAAAAAAAPyND/ElIhM0SSqoAAAAAElFTkSuQmCC" alt="" class="img_menu_icono">
                <span class="abrir"><br>
                </span>
                <span class="cerrar">
                </span>
            </label>

            <div id="sidebar" class="sidebar margin_left_menu imagen_fondo_menu">
                <div class="row justify-content-center">
                    <img src="assets/images/LOGO-GEEK-CODE.png" width="20%" class="width_tornillo_menu" alt="">
                </div>
                <ul class="navbar-nav" style="border-bottom: solid 1px #999999">
                    <li class="nav-item  mt-4  pl-md-4 fz-18">
                        <div class="row">
                            <div class="col-12 text_orange text-center">
                                <?php
			if(isset($_SESSION['id_cliente'])){
        ?>
                                BIENVENIDO<br><?=nombre_cliente($_SESSION['id_cliente'])?></div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4 bg_link_menu fz-18">
                        <div class="row">
                            <div class="col-12" style="border-bottom: solid 1px #999999; margin-bottom: 30px;">
                                <a class="dropdown-item bg_link_menu text-decoration-none text-center subir mt-1"
                                    data-toggle="tooltip" data-placement="top" title="CERRAR SESIÓN"
                                    href="index2.php?p=salir">Cerrar Sesiòn</a>
                                <?php
			}
		?>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index.php" class="bg_link_menu text-decoration-none ml-2">INICIO</a>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=principal" class="bg_link_menu text-decoration-none ml-2">LO ULTIMO</a>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=productos" class="bg_link_menu text-decoration-none ml-2">PRODUCTOS</a>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=ofertas" class="bg_link_menu text-decoration-none ml-2">OFERTAS</a>
                                <?php
		if(isset($_SESSION['id_cliente'])){
		?>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=carrito" class="bg_link_menu text-decoration-none ml-2">MI CARRITO</a>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 pb-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=miscompras" class="bg_link_menu text-decoration-none ml-2">MIS COMPRAS</a>
                                <?php
		}else{
			?>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center">
                                <a href="index2.php?p=login" class="bg_link_menu text-decoration-none ml-2">INICIAR SESIÓN</a>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item  bg_link_menu mt-4  pb-4 pl-4 fz-18">
                        <div class="row ml-2">
                            <div class="col-12 d-flex align-items-center"> 
                                <a href="index2.php?p=registro" class="bg_link_menu text-decoration-none ml-2">REGISTRARTE</a>
                                <?php
		}
        ?>
                            </div>
                        </div>

                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item   ml-4 pl-4 fz-18">
                        
                        <span style="font-family: 'Oswald', sans-serif;">(+57) 3255651126</span>
                    </li>
                    <li class="nav-item   ml-4 pl-4 fz-18 mt-3">
                        
                        <span style="font-family: 'Oswald', sans-serif;">inkcode@inkcode.com</span>
                    </li>
                    <li class="nav-item   ml-4 pl-4 fz-18 mt-3">
                        
                        <span style="font-family: 'Oswald', sans-serif;">Bogota, Colombia</span>
                    </li>
                    <li class="nav-item  pl-4">
                        <div class="row justify-content-center text-center mt-5">
                            <div class="col-md-3">
                                <a href="https://es-la.facebook.com/" class="sin_hover">
                                    <img src="https://images.vexels.com/media/users/3/140169/isolated/lists/5f4fc7439fedaf35b5c8488868ae9fe0-boton-metalico-de-facebook.png"
                                        width="40px" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://www.instagram.com/accounts/login/?hl=es-la" class="sin_hover">
                                    <img src="https://2.bp.blogspot.com/-9SqSbo9uYc0/W1s0OdSI-HI/AAAAAAAABGU/wk_ULl-xZ-UXKvu1UrS8aUch-ElBGBtvgCLcBGAs/s1600/instagram.png"
                                        width="40px" alt="">
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--menu responsive-->
    <header>
        <div class="menu d-none d-lg-block bg-light">
            <a href="index.php"><img src="https://elianacelis.files.wordpress.com/2013/05/asa.jpg" width="3%" class="ml-5" alt=""></a>

            <a href="index.php" class="ml-4 text-dark">Inicio</a>

            <a href="?p=principal" class="text-dark">Lo ultimo</a>

            <a href="?p=productos" class="text-dark">Productos</a>

            <a href="?p=ofertas" class="text-dark">Ofertas</a>
            <?php
		if(isset($_SESSION['id_cliente'])){
        ?>

            <a href="?p=carrito" class="text-dark">Carrito</a>

            <a href="?p=miscompras" class="text-dark">Mis Compras</a>
            <?php
		}else{
            ?>

            <div style="position: absolute; right: 1rem; top:1rem">
                <a href="?p=login" class="text-dark">Iniciar Sesion</a>

                <a href="?p=registro" class="text-dark">Registrate</a>
            </div>
            <?php
		}
		?>
            <!--
		<a href="?p=admin">Administrador</a>
		-->

            <?php
			if(isset($_SESSION['id_cliente'])){
		?>
            <div class="dropdown">
                <button class="dropdown-toggle dropdown_cerrar_sesion" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bienvenido <?=nombre_cliente($_SESSION['id_cliente'])?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                    style="width: 9%;position: absolute;transform: translate3d(1701px, 6px, 0px);top: 0px;left: 0px;will-change: transform;">
                    <a class="dropdown-item text-dark text-center subir" href="?p=salir"
                        style="padding: 21px 10px 0px 10px">Cerrar Sesiòn</a>
                </div>
            </div>
            <?php
			}
		?>
        </div>
    </header>
    <a href="index.php" class="d-flex justify-content-center"><img src="https://elianacelis.files.wordpress.com/2013/05/asa.jpg" width="13%" alt=""></a>
    <div class="cuerpo">
        <?php
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		?>
    </div>


    <div class="carritot" onclick="minimizer()">
        <h3 style="font-size: 18px;">Carrito de compra</h3>
        <input type="hidden" id="minimized" value="0" />
    </div>

    <div class="carritob">

        <table class="table table-hover text-center">
            <tr style="background-color: #999999; color: #000;">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio </th>
            </tr>
            <?php
$id_cliente = clear($_SESSION['id_cliente']);
$q = $mysqli->query("SELECT * FROM carro WHERE id_cliente = '$id_cliente'");
$monto_total = 0;
while($r = mysqli_fetch_array($q)){
	$q2 = $mysqli->query("SELECT * FROM productos WHERE id = '".$r['id_producto']."'");
	$r2 = mysqli_fetch_array($q2);

	$preciototal = 0;
			if($r2['oferta']>0){
				if(strlen($r2['oferta'])==1){
					$desc = "0.0".$r2['oferta'];
				}else{
					$desc = "0.".$r2['oferta'];
				}

				$preciototal = $r2['price'] -($r2['price'] * $desc);
			}else{
				$preciototal = $r2['price'];
			}

	$nombre_producto = $r2['name'];

	$cantidad = $r['cant'];

	$precio_unidad = $r2['price'];
	$precio_total = $cantidad * $preciototal;
	$imagen_producto = $r2['imagen'];

	$monto_total = $monto_total + $precio_total;

	

	?>
            <tr>
                <td><?=$nombre_producto?></td>
                <td><?=$cantidad?></td>
                <td>$<?=$precio_unidad?></td>
            </tr>
            <?php
}
?>
        </table>
        <br>
        <div class="row justify-content-center">
            <span>Monto Total: <b class="text_orange">$<?=$monto_total?></b></span>
        </div>
        <br><br>
        <form method="post" class="text-center mb-3" action="?p=carrito">
            <input type="hidden" name="monto_total" value="<?=$monto_total?>" />
            <button class="bg_orange text-light p-2" type="submit" name="finalizar"><i class="fa fa-check"></i>Solicitar
                Pedido</button>
        </form>

    </div>

    <!-- boton flotante whatsapp -->
    <a href="https://wa.me/573138986761?text=Hola, estoy interesado en tus productos" target="_blank">
        <img src="assets/images/Whatsapp_1542396595-1024x1024.png" class="img_whatsapp" alt="">
    </a>
    <!-- boton flotante whatsapp -->
    <!-- modal instrucciones -->
    <button type="button" class="btn_instrucciones" data-toggle="modal" data-target="#exampleModal">
        ¿Como hacer mi pedido?
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tamaño_index_modal" style="box-shadow: 1px -4px 15px 10px #fff; border: none;">
                <div style="background-color: #999999;">
                    <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                </div>
                <div class="card" style="background-color: #999999; border-top: none;">
                    <div class="card-body p-5">
                        <div class="container p-4" style="border: #fff5 2px dashed">
                            <div class="row text-center">
                                <div class="col-sm-12 col-md-12">
                                    <img src="assets/images/LOGO-GEEK-CODE.jpg" width="20%" alt=""
                                        class="tamaño_imagen_index_modal">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <h3 class="text_black text-center">TU PEDIDO EN 5 PASOS</h3>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <h4 class="text_black text-center">PASO 1:</h4>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text_black p-2 text-center tamaño_letra_index_modal">Registrate o si ya
                                    estas registrado iniciar sesión.</p>
                            </div>
                            <div class="row justify-content-center">
                                <h4 class="text_black p-2 tamaño_letra_index_modal">PASO 2:</h4>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text_black text-center p-2 tamaño_letra_index_modal">Elije los productos
                                    que quieras agregar al carrito.</p>
                            </div>
                            <div class="row justify-content-center">
                                <h4 class="text_black p-2 tamaño_letra_index_modal">PASO 3:</h4>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text_black text-center ml-2 p-2 tamaño_letra_index_modal">Ve a "Mi Carrito" y
                                    si ya estas seguro que tu pedido esta completo y es correcto dar click en
                                    "Solicitar Pedido".</p>
                            </div>
                            <div class="row justify-content-center">
                                <h4 class="text_black p-2 tamaño_letra_index_modal">PASO 4:</h4>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text_black text-center p-2 tamaño_letra_index_modal">Te aparecerá un
                                    mensaje de confimación y ya solo tendrás que esperar que nos comuniquemos con tigo
                                </p>
                            </div>
                            <div class="row justify-content-center">
                                <h4 class="text_black p-2 tamaño_letra_index_modal">PASO 5:</h4>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text_black text-center p-2 tamaño_letra_index_modal">El pedido realizado
                                    te aparacera en "Mis Compras" donde podras ver todos tus pedidos pendientes y
                                    los ya entregados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <!-- modal instrucciones -->
    <!-- footer -->
    <footer class="bg-light text-dark">
        <div class="container-fluid mt-5">
            <div class="row p-5">
                <div class="col-sm-12 col-md-4 d-flex justify-content-center">
                    <a href="#" class="d-none d-md-block d-lg-block"><i class="fa fa-facebook fz-40 text-light"></i></a>
                    <a href="#" class="d-none d-md-block d-lg-block"><i
                            class="fa fa-instagram fz-40 text-light ml-3"></i></a>
                </div>
                <div class="col-sm-12 col-md-4 d-flex justify-content-center text-center">
                    <span class="texto_footer">Solicita Nuestros
                        Productos<br>Por Whatsapp<br>(+57)
                        3176790047</span>
                </div>
                <div class="col-sm-12 col-md-4 d-flex justify-content-center">
                    <span style="font-family: 'Oswald', sans-serif;" class="d-none d-md-block d-lg-block">Terminos y
                        Condiciones</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->


</body>

</html>

<script type="text/javascript">
function minimizer() {

    var minimized = $("#minimized").val();

    if (minimized == 0) {
        //mostrar
        $(".carritot").css("bottom", "350px");
        $(".carritob").css("bottom", "0px");
        $("#minimized").val('1');
    } else {
        //minimizar

        $(".carritot").css("bottom", "0px");
        $(".carritob").css("bottom", "-350px");
        $("#minimized").val('0');
    }
}
</script>
<script type="text/javascript" src="assets/js/modernizr.custom.04022.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>