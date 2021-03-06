<?php
    include 'adapter.php';
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
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text" rel="stylesheet">
    <!-- load of different kind of pattern-->

    <?php
    if ((adapter($userRow['userDis'])=='ceguera')){
        $discapacidad=adapter($userRow['userDis']);
    }else if ((adapter($userRow['userDis'])=='daltonismo')){
        $discapacidad=adapter($userRow['userDis']);
    }else if ((adapter($userRow['userDis'])=='visionBorrosa')){
        $discapacidad=adapter($userRow['userDis']);
    }else {
        $discapacidad=adapter($userRow['userDis']);
    }

    ?>

    <link rel="stylesheet" href="Patrones/<?php echo $discapacidad?>.css" type="text/css" />


    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<title>Bienvenido - <?php echo $userRow['userName']; ?></title>
</head>
<body id="<?php echo adapter($userRow['userDis']);?>">
<div >
    <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
</div>
	<nav class="navbar navbar-light bg-faded">

        <div id="barraMenu" class="container">

        <div  class="navbar-header">
            <a id="m1" class="navbar-brand" href="home.php">Menu</a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li ><a href="curso.php">Primera lección</a></li>
                  <li><a href="evaluacionCurso.php">Evaluación de la lección</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido: <?php echo strtoupper($userRow['userName']); ?>&nbsp;<span class="caret"></span></a>
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
    
    	<div class="row" style="text-align:center;">
    	<h1 tabindex="0">Bienvenido al curso básico de inglés</h1>
    	</div>
        
        <div class="row">
        <div style="text-align:center;">
        <br>   
        <h2 tabindex="0">Este es el primer curso de inglés en línea que implementa accesibilidad para usuarios con discapacidades visuales.</h2>
        <br>
        <h3 tabindex="0"> Basta de limitaciones, aprender inglés nunca fue más facil!</h3>
        <br>
        <a href="curso.php" aria-label="Iniciar primera lección" tabindex="0"> Iniciar primera lección</a>
        <br>
        <br>
        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
