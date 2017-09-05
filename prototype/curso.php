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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text" rel="stylesheet">
    <link rel="stylesheet" href="Discapacidades.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />

    <title>Bienvenido - <?php echo $userRow['userName']; ?></title>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
    
<body id="<?php echo adapter($userRow['userDis']);?>">
    <div >
        <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
    </div>
    <nav class="navbar navbar-light bg-faded">
        <div class="container">
            <div class="navbar-header">
                <a id="m1" class="navbar-brand" href="home.php">Menu</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="curso.php">Primera lección</a></li>
                    <li><a href="evaluacionCurso.php">Evualuación de la lección</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido :<?php echo strtoupper($userRow['userName']); ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="wrapper">

        <div class="container">

            <div class="page-header">
                <h1 class="text-center"><strong>Verbo to be</strong></h1>
                <hr />
                <h2>Este verbo es el equivalente a los verbos "ser" y "estar", en el idioma inglés goza de una particular importancia.
                Su significado depende del sentido de la oración.</h2>
            </div>



            <div id="padre" class="row">

                <div id="concepto" class="col-xs-12 col-md-8">
                    <p>
                        El verbo “to be” es el verbo más importante del inglés.
                        Se utiliza tanto como un verbo principal como un verbo auxiliar y es irregular en el presente y el pasado.
                    </p>   
                </div>
                <div class="col-xs-6 col-md-4">
                    <img src="assets/img/apendeIngles.PNG" class="img-rounded" alt="Learn English (aprende inglés)" width="304" height="236">
                </div>
            </div>
            <div style="text-align: center">
                    <iframe width="600" height="400" src="https://www.youtube.com/embed/6ToyS-u_YLw" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="row">
                <br>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Pronombre Personal</th>
                        <th>Verbo to be</th>
                        <th>Traducción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>I</td>
                        <td>am</td>
                        <td>Soy / estoy</td>
                    </tr>
                    <tr>
                        <td>You</td>
                        <td>are</td>
                        <td>Eres / Estás</td>
                    </tr>
                    <tr>
                        <td>He</td>
                        <td>is</td>
                        <td>Él es / está</td>
                    </tr>
                    <tr>
                        <td>She</td>
                        <td>is</td>
                        <td>Ella es / está</td>
                    </tr>
                    <tr>
                        <td>It</td>
                        <td>is</td>
                        <td>Él / Ella es / está</td>
                    </tr>
                    <tr>
                        <td>We</td>
                        <td>are</td>
                        <td>Nosotros somos / estamos</td>
                    </tr>
                    <tr>
                        <td>You</td>
                        <td>are</td>
                        <td>Ustedes son / están</td>
                    </tr>
                    <tr>
                        <td>They</td>
                        <td>are</td>
                        <td>Ellos son / están</td>
                    </tr>
                    </tbody>

                </table>



            </div>
        </div>

    </div>


    </body>

    </html>
<?php ob_end_flush(); ?>