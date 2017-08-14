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
        <title>Bienvenido - <?php echo $userRow['userName']; ?></title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

    </head>
    <body>
    <div >
        <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
    </div>
    <nav class="navbar navbar-light bg-faded">
        <div class="container" >
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php" tabindex="0">Menu</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" >
                <ul class="nav navbar-nav">
                    <li ><a href="curso.php" tabindex="0">Primera lección</a></li>
                    <li><a href="evaluacionCurso.php" tabindex="0">Evualuación de la lección</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" tabindex="0">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido: <?php echo strtoupper($userRow['userName']); ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php?logout" tabindex="0"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div id="wapper">
        <div class="container">
            <div class="page-header">
                <br>
                <h1 class="text-center" tabindex="0"><strong>Evaluacion de la primera lección</strong></h1>
            </div>
            <form>

                <!--primera pregunta-->
                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-12" tabindex="0">Primera pregunta</legend>
                    <form>
                    <div class="col-sm-12">

                        <p tabindex="0">El verbo to be sirve para describir</p>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label" >
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rc1" >
                                 Acciones
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label"  >
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="ri1">
                                Estados de un objeto
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="ri2" >
                                Ninguna
                            </label>
                        </div>
                    </div>
                    </form>
                </fieldset>

                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-12" tabindex="0">Segunda pregunta</legend>
                    <form>
                    <div class="col-sm-12">

                        <p tabindex="0">Estructura de una pregunta con el verbo to be</p>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label" >
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rc2" >
                                To be + Sujeto (pronombre personal) + oración
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label"  >
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="ri12">
                                Sujeto (pronombre personal) + oración + to be
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="ri22" >
                                Oración + to be + Sujeto (pronombre personal)
                            </label>
                        </div>
                    </div>
                    </form>
                </fieldset>

                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-12" tabindex="0">Tercera pregunta</legend>
                    <form>
                        <div class="col-sm-12">
                            <p tabindex="0">Seleccione la oración que usted crea que esta correcta</p>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rc3" >
                                    I am a student
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label"  >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="ri13">
                                    I a am student
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="ri23" >
                                    I student am a
                                </label>
                            </div>
                        </div>
                    </form>
                </fieldset>

                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-12" tabindex="0">Cuarta pregunta</legend>
                    <form>
                        <div class="col-sm-12">
                            <p tabindex="0">Cual es la estructura de una oración negativa con el verbo to be </p>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rc4" >
                                    To be + not + Sujeto (pronombre personal) + oración
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label"  >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="ri14">
                                    Sujeto (pronombre personal)+ To be + not + oración
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="ri24" >
                                    Oración + not + to be + sujeto (pronombre personal)
                                </label>
                            </div>
                        </div>
                    </form>
                </fieldset>

                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-12" tabindex="0">Quinta pregunta</legend>
                    <form>
                        <div class="col-sm-12">
                            <p tabindex="0">Seleccione la oración que usted crea que esta correctamente escrita</p>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rc5">
                                    I not am a student
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label"  >
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="ri15">
                                    I a am not a student
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="ri25" >
                                    I am not a student
                                </label>
                            </div>
                        </div>
                    </form>
                </fieldset>


                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" tabindex="0">Finalizar Evaluación</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </body>
    </html>
<?php ob_end_flush(); ?>