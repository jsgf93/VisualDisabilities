<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
.contenido {
    background-color: lightblue;
}
.contenido2 {
    background-color: lightblue;
}
.titulo {
    font-family: verdana;
    font-size: 20px;
}
.titulo2 {
    font-family: verdana;
    font-size: 20px;
}
</style>
<title>Bienvenido - <?php echo $userRow['userName']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
</head>
<body>
<div >
    <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
</div>
	<nav class="navbar navbar-light bg-faded">

        <div class="container">

        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">Menu</a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li ><a href="curso.php">Primera lección</a></li>
                  <li><a href="evaluacionCurso.php">Evualuación de la lección</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido :<?php 
                          if ($userRow['userDis']=="daltonismo")
                          {
                              echo $userRow['userName'];
                              echo $userRow['userName'];
                          } ?>&nbsp;<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesión</a></li>
                      </ul>
                  </li>
              </ul>
          </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
    
    	<div class="<?php if ($userRow['userDis']=="daltonismo") echo 'contenido2';?>">
    	<h3>Bienvenido al curso básico de inglés</h3>
    	</div>
        
        <div class="row">
        <div class="<?php if ($userRow['userDis']=="daltonismo") echo 'contenido2';?>">
        <h1>Este curso consta de una sola lección y una evaluación</h1>
        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>