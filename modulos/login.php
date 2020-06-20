<?php
if(isset($_SESSION['id_cliente'])){
	redir("./");
}
	
if(isset($enviar)){
	$username = clear($username);
	$password = clear($password);

	$q = $mysqli->query("SELECT * FROM clientes WHERE username = '$username' AND password = '$password'");

	if(mysqli_num_rows($q)>0){
		$r = mysqli_fetch_array($q);
		$_SESSION['id_cliente'] = $r['id'];
		if(isset($return)){
			redir("?p=".$return);
		}else{
			redir("index.php");
		}
	}else{
	echo "<script>alert('Error al iniciar sesiòn');</script>";
		
	}


}
	?>
	<center>
		<form method="post" action="">
			<div class="centrar_login">
				<label><h1>INICIAR SESIÓN</h1></label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1 d-flex justify-content-center align-items-end">
						<i class="fas fa-user" style="font-size: 30px; color: #999999;"></i>
						</div>
						<div class="col-md-10">
						<input type="text" style="font-size: 16px; margin-top: 25px;" autocomplete="off" class="form-control input_login" placeholder="Usuario" name="username"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-1 d-flex justify-content-center align-items-end">
						<i class="fa fa-key" style="font-size: 30px; color: #999999;"></i>
						</div>
						<div class="col-md-10">
						<input type="password" style="font-size: 16px; margin-top: 25px;" class="form-control" placeholder="Contraseña" name="password"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<button class="btn_login" name="enviar" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
				</div>
			</div>
		</form>
	</center>