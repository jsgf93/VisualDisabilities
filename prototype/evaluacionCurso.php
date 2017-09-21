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
$userRow=mysql_fetch_array($res);?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <title>Bienvenido - <?php echo $userRow['userDis']; ?></title>
    </head>
    <body id="<?php echo adapter($userRow['userDis']);?>">
    <div >
        <img id="banner" src="assets/img/inglesFuturo.jpg" alt="Hombre y mujer ejecutivos a lado de un texto que dice: El inglés te conecta con el mundo" height="250">
    </div>
    <nav class="navbar navbar-light bg-faded">
        <div id="barraMenu" class="container" >
            <div class="navbar-header">
                <a id="m1" class="navbar-brand" href="home.php" tabindex="0">Menu</a>
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
        <div class="container" id="dina4">
            <div class="page-header">
                <br>
                <h1 class="text-center" tabindex="0"><strong>Evaluación de la Primera Lección</strong></h1>
            </div>
            <form method="post" action="evaluacionCurso.php">

                <!--primera pregunta-->
                <fieldset class="form-group row">
                    <legend id="p1" class="col-form-legend col-sm-12" tabindex="0">Primera pregunta</legend>

                    <div class="col-sm-12">

                        <h2 tabindex="0">El verbo to be sirve para describir</h2>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label" >
                                <input class="form-check-input" type="radio" name="primeraPregunta" id="gridRadios1" value="ri11">
                                 Acciones.
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label"  >
                                <input class="form-check-input" type="radio" name="primeraPregunta" id="gridRadios2" value="rc1">
                                Estados relativamente permanentes o transitorios.
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="primeraPregunta" id="gridRadios3" value="ri12">
                                Ninguna.
                            </label>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="form-group row">
                    <legend id="p2" class="col-form-legend col-sm-12" tabindex="0">Segunda pregunta</legend>

                    <div class="col-sm-12">

                        <h2 tabindex="0">Estructura de una pregunta con el verbo to be</h2>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label" >
                                <input class="form-check-input" type="radio" name="segundaPregunta" id="gridRadios4" value="rc2" >
                                To be + Sujeto (pronombre personal) + oración.
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label"  >
                                <input class="form-check-input" type="radio" name="segundaPregunta" id="gridRadios5" value="ri21">
                                Sujeto (pronombre personal) + oración + to be.
                            </label>
                        </div>
                        <div class="form-check" tabindex="0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="segundaPregunta" id="gridRadios6" value="ri22" >
                                Oración + to be + Sujeto (pronombre personal).
                            </label>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="form-group row">
                    <legend id="p3" class="col-form-legend col-sm-12" tabindex="0">Tercera pregunta</legend>

                        <div class="col-sm-12">
                            <h2 tabindex="0">Seleccione la oración que usted crea que esta correcta</h2>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="terceraPregunta" id="gridRadios7" value="rc3" >
                                    I am a student.
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label"  >
                                    <input class="form-check-input" type="radio" name="terceraPregunta" id="gridRadios8" value="ri13">
                                    I a am student.
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="terceraPregunta" id="gridRadios9" value="ri23" >
                                    I student am a.
                                </label>
                            </div>
                        </div>

                </fieldset>

                <fieldset class="form-group row">
                    <legend id="p4" class="col-form-legend col-sm-12" tabindex="0">Cuarta pregunta</legend>

                        <div class="col-sm-12">
                            <h2 tabindex="0">Cual es la estructura de una oración negativa con el verbo to be </h2>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="cuartaPregunta" id="gridRadios10" value="ri41" >
                                    To be + not + Sujeto (pronombre personal) + oración
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                            <label class="form-check-label" >
                                <input class="form-check-input" type="radio" name="cuartaPregunta" id="gridRadios10" value="rc4">
                                    Sujeto (pronombre personal)+ To be + not + oración
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="cuartaPregunta" id="gridRadios12" value="ri42" >
                                    Oración + not + to be + sujeto (pronombre personal)
                                </label>
                            </div>
                        </div>
                </fieldset>

                <fieldset class="form-group row">
                    <legend id="p5" class="col-form-legend col-sm-12" tabindex="0">Quinta pregunta</legend>
                        <div class="col-sm-12">
                            <h2 tabindex="0">Seleccione la oración que usted crea que esta correctamente escrita</h2>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label" >
                                    <input class="form-check-input" type="radio" name="quitaPregunta" id="gridRadios13" value="ri51">
                                    I not am a student.
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label"  >
                                    <input class="form-check-input" type="radio" name="quitaPregunta" id="gridRadios14" value="ri52">
                                    I a am not a student.
                                </label>
                            </div>
                            <div class="form-check" tabindex="0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="quitaPregunta" id="gridRadios15" value="rc5">
                                    I am not a student.
                                </label>
                            </div>
                        </div>

                </fieldset>


                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" tabindex="0"/>
                        <?php
                        //Si se pulsa el botón de enviar
                        if (isset($_POST['enviar'])) {
                            if ($_POST['primeraPregunta'] == 'rc1'){
                                $respuesta1='Pregunta 1: respuesta correcta';
                                $valor1=20;
                            }
                            else{
                                $respuesta1='Pregunta 1: respuesta incorrecta, la respuesta correcta es : Estados relativamente permanentes o transitorios.';
                                $valor1=0;
                            }
                            if ($_POST['segundaPregunta'] == 'rc2'){
                                $respuesta2='Pregunta 2: respuesta correcta';
                                $valor2=20;
                            }
                            else{
                                $respuesta2='Pregunta 2: respuesta incorrecta, la respuesta correcta es : To be + Sujeto (pronombre personal) + oración.';
                                $valor2=0;
                            }
                            if ($_POST['terceraPregunta'] == 'rc3'){
                                $respuesta3='Pregunta 3: respuesta correcta';
                                $valor3 = 20;
                            }
                            else{
                                $respuesta3='Pregunta 3: respuesta incorrecta, la respuesta correcta es : I am a student.';
                                $valor3=0;
                            }
                            if ($_POST['cuartaPregunta'] == 'rc4'){
                                $respuesta4='Pregunta 4: respuesta correcta';
                                $valor4 = 20;
                            }
                            else {
                                $respuesta4 = 'Pregunta 4: respuesta incorrecta, la respuesta correcta es : Sujeto (pronombre personal)+ To be + not + oración';
                                $valor4 = 0;
                            }
                            if ($_POST['quitaPregunta'] == 'rc5'){
                                $respuesta5='Pregunta 5: respuesta correcta';
                                $valor5 = 20;
                            }
                            else {
                                $respuesta5 = 'Pregunta 5: respuesta incorrecta, la respuesta correcta es : I am not a student';
                                $valor5 = 0;
                            }
                            $total=$valor1+$valor2+$valor3+$valor4+$valor5;
                                echo '<script type="text/javascript">
                                    $(window).load(function(){
                                        $(\'#myModal\').modal(\'show\');
                                    });
                                    </script>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" tabindex="0">&times;</button>
                                <h4 id="r1" class="modal-title" tabindex="0">Resultado de la evaluación</h4>
                            </div>
                            <div class="modal-body">
                                <div tabindex="0" ><?php echo $respuesta1; ?></div>
                                <div tabindex="0" ><?php echo $respuesta2; ?></div>
                                <div tabindex="0" ><?php echo $respuesta3; ?></div>
                                <div tabindex="0" ><?php echo $respuesta4; ?></div>
                                <div tabindex="0" ><?php echo $respuesta5; ?></div>
                                <div class="form-group">
                                    <hr />
                                </div>
                                <div tabindex="0">Calificación:<?php echo $total; ?>/100</div>
                            </div>
                            <div class="modal-footer">
                                <button tabindex="0" type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </body>
    </html>
<?php ob_end_flush(); ?>