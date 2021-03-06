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
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
    
<body id="<?php echo adapter($userRow['userDis']);?>">
    <div >
        <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
    </div>
    <nav class="navbar navbar-light bg-faded">
        <div id="barraMenu" class="container">
            <div class="navbar-header">
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
                <h1 class="text-center" tabindex="0"><strong>Verbo to be</strong></h1>
                <hr />
                <h2 tabindex="0">Este verbo es el equivalente a los verbos "ser" y "estar", en el idioma inglés goza de una particular importancia.
                Su significado depende del sentido de la oración.</h2>
            </div>



            <div id="divConceptoImagen" class="row">

                <div id="concepto" class="col-xs-12 col-md-8" tabindex="0">
                    <p>
                        El verbo “to be” es el verbo más importante del inglés.
                        Se utiliza tanto como un verbo principal como un verbo auxiliar y es irregular en el presente y el pasado.
                    </p>   
                </div>
                <div class="col-xs-6 col-md-4" tabindex="0">
                    <img src="assets/img/apendeIngles.PNG" class="img-rounded" alt="Learn English (aprende inglés)" width="304" height="236">
                </div>
            </div>
            <div style="text-align: center" tabindex="0">
                    <iframe width="600" height="400" src="https://www.youtube.com/embed/6ToyS-u_YLw" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="row">
                <br>
                <table class="table table-hover" tabindex="0">
                    <thead>
                    <tr>
                        <th tabindex="0">Pronombre Personal</th>
                        <th tabindex="0">Verbo to be</th>
                        <th tabindex="0">Traducción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td tabindex="0">I</td>
                        <td tabindex="0">am</td>
                        <td tabindex="0">Soy / estoy</td>
                    </tr>
                    <tr>
                        <td tabindex="0">You</td>
                        <td tabindex="0">are</td>
                        <td tabindex="0">Eres / Estás</td>
                    </tr>
                    <tr>
                        <td tabindex="0">He</td>
                        <td tabindex="0">is</td>
                        <td tabindex="0">Él es / está</td>
                    </tr>
                    <tr>
                        <td tabindex="0">She</td>
                        <td tabindex="0">is</td>
                        <td tabindex="0">Ella es / está</td>
                    </tr>
                    <tr>
                        <td tabindex="0">It</td>
                        <td tabindex="0">is</td>
                        <td tabindex="0">Él / Ella es / está</td>
                    </tr>
                    <tr>
                        <td tabindex="0">We</td>
                        <td tabindex="0">are</td>
                        <td tabindex="0">Nosotros somos / estamos</td>
                    </tr>
                    <tr>
                        <td tabindex="0">You</td>
                        <td tabindex="0">are</td>
                        <td tabindex="0">Ustedes son / están</td>
                    </tr>
                    <tr>
                        <td tabindex="0">They</td>
                        <td tabindex="0">are</td>
                        <td tabindex="0">Ellos son / están</td>
                    </tr>
                    </tbody>

                </table>



            </div>
        </div>

    </div>


    </body>

    </html>
<?php ob_end_flush(); ?>
