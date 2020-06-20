<?php
if(isset($_SESSION['id_cliente'])){
	redir("./");
}
	
if(isset($enviar)){
	$username = clear($username);
	$password = clear($password);
	$cpassword = clear($cpassword);
	$nombre = clear($nombre);
	$email = clear($email);
	$celular = clear($celular);

	$q = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");

	if(mysqli_num_rows($q)>0){
        echo "<script>alert('El usuario ya está en uso',0,'registro');location.href='?p=registro'</script>";
		die();
	}

	if($password != $cpassword){
        echo "<script>alert('Las contraseñas no coinciden'); location.href='?p=registro'</script>";
		die();
	}
	$mysqli->query("INSERT INTO clientes (username,password,name,email,celular) VALUES ('$username','$password','$nombre','$email','$celular')");


	$q2 = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");

	$r = mysqli_fetch_array($q2);

	$_SESSION['id_cliente'] = $r['id'];
    echo "<script>alert('Te haz registrado exitosamente'); location.href='index.php'</script>";
	//redir("./");

}
	?>


<center>
    <form method="post" action="">
        <div class="centrar_login">
            <label>
                <h1>REGISTRATE</h1>
            </label>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fas fa-user" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="text" style="font-size: 16px; margin-top: 25px;" autocomplete="off"
                            class="form-control" placeholder="Usuario" name="username" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fa fa-key" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="password" style="font-size: 16px; margin-top: 25px;" class="form-control"
                            placeholder="Contraseña" name="password" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fa fa-key" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="password" style="font-size: 16px; margin-top: 25px;" class="form-control"
                            placeholder="Confirmar Contraseña" name="cpassword" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fas fa-signature" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="text" style="font-size: 16px; margin-top: 25px;" autocomplete="off"
                            class="form-control" placeholder="Primer Nombre y Primer Apellido" name="nombre" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fas fa-signature" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="text" style="font-size: 16px; margin-top: 25px;" autocomplete="off"
                            class="form-control" placeholder="Correo electronico" name="email" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center align-items-end">
                        <i class="fas fa-signature" style="font-size: 30px; color: #999999;"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="text" style="font-size: 16px; margin-top: 25px;" autocomplete="off"
                            class="form-control" placeholder="Numero de celular" name="celular" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn_login" style="font-size: 16px; margin-top: 25px;" name="enviar" type="submit"><i
                        class="fas fa-sign-in-alt"></i> Registrate</button>
            </div>
        </div>
    </form>
</center>