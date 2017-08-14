<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
        
        $dis = trim($_POST['dis']);
		$dis = strip_tags($dis);
		$dis = htmlspecialchars($dis);
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Por favor ingrese su nombre.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Su nombre debe tener al menos 3 caracteres.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Su nombre no debe contener números.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Por favor ingrese un correo válido.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "El correo electrónico ingresado ya está en uso.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Por favor ingrese su contraseña.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Su contraseña debe tener al menos 6 caracteres.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
        
        
        // basic disability validation
		if (empty($dis)) {
			$error = true;
			$disError = "Por favor ingrese su discapacidad.";
		} else if (strlen($dis) < 3) {
			$error = true;
			$disError = "El nombre de su discapacidad no es correcto.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$dis)) {
			$error = true;
			$disError = "No se permiten números en este campo";
		}
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass,userDis) VALUES('$name','$email','$password','$dis')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Se ha registrado exitosamente, ahora puede ingresar al curso!";
				unset($name);
				unset($email);
				unset($pass);
                unset($dis);
			} else {
				$errTyp = "danger";
				$errMSG = "Ha ocurrido un error, intente de nuevo en un momento!";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Curso de inglés accesible en línea</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div >
    <img id="banner" src="assets/img/banner1.jpg" alt="Imagen de una ola color azul" height="150">
</div>
<div class="container">
	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h1 id="registroTitulo" class="text-center" aria-label="Registrarse" tabindex="0">Registrarse</h1>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Nombre completo" maxlength="50" value="<?php echo $name ?>" aria-label="nombre" tabindex="0"/>
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Correo electrónico" maxlength="40" value="<?php echo $email ?>" aria-label="correo electronico" tabindex="0"/>
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Contraseña" maxlength="15" aria-label="Contraseña" tabindex="0"/>
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="dis" class="form-control" placeholder="Discapacidad" maxlength="40" value="<?php echo $dis ?>" aria-label="Discapacidad" tabindex="0"/>
                </div>
                <span class="text-danger"><?php echo $disError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup" aria-label="Boton registrar" tabindex="0">Registrar</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php" aria-label="Ir a la página de ingreso" tabindex="0">Ingresar</a>
            </div>
        
        </div>
   
    </form>
    </div>
</div>

</body>

</html>
<?php ob_end_flush(); ?>