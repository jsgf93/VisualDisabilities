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
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bienvenido - <?php echo $userRow['userEmail']; ?></title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
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
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido :<?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
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

            <div class="page-header">
                <h1 class="text-center"><strong>Verbo to be, en español significa ser o estar</strong></h1>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <p>
                        El verbo “to be” es el verbo más importante del inglés.
                        Se utiliza tanto como un verbo principal como un verbo auxiliar y es irregular en el presente y el pasado.
                    </p>
                </div>
            </div>

        </div>

    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    </body>
    </html>
<?php ob_end_flush(); ?>