<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Por favor, ingrese su correo electrónico.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Por favor, ingrese un correo electrónico válido.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Por favor ingrese su contraseña.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$res=mysql_query("SELECT userId, userName, userPass, userDis FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Credenciales incorrectas, intente de nuevo en un momento!";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html  lang="es">
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
    <div class="container" >
        <div id="login-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="col-md-12">
                <div class="page-header">
                    <h1 id="loginTitulo" class="text-center" aria-label="ingresar" tabindex="0">Ingresar</h1>
                </div>

                <?php
                if ( isset($errMSG) ) {

                    ?>
                    <div class="form-group">
                    <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                    </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <label for="correo" class="col-2 col-form-label">Correo</label>
                    <div class="input-group">

                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" id="correo" name="email" class="form-control" value="<?php echo $email; ?>" maxlength="40" aria-label="Correo electrónico" tabindex="0"/>
                    </div>
                    <span class="text-danger"><?php echo $emailError; ?></span>
                </div>

                <div class="form-group">
                    <label for="contrasena" class="col-2 col-form-label">Contraseña</label>
                    <div class="input-group">

                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input id="contrasena" type="password" name="pass" class="form-control" maxlength="15" aria-label="Contraseña" tabindex="0"/>
                    </div>
                    <span class="text-danger"><?php echo $passError; ?></span>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    <button aria-label="Ingresar" type="submit" class="btn btn-block btn-primary" name="btn-login" tabindex="0">Ingresar</button>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    <a href="register.php" aria-label="Registrarse" tabindex="0">Registrarse</a>
                </div>

            </div>

        </form>
        </div>
    </div>

</body>
</html>
<?php ob_end_flush(); ?>