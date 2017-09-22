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
                       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btnEnviar" tabindex="0">Finalizar</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" tabindex="0" id="btnCerrarX">x</button>

                                <h4 class="modal-title" tabindex="0">Resultados de la evaluación</h4>
                            </div>
                            <div class="modal-body">
                                <p id="respuesta1" tabindex="0"></p>
                                <p id="respuesta2" tabindex="0"></p>
                                <p id="respuesta3" tabindex="0"></p>
                                <p id="respuesta4" tabindex="0"></p>
                                <p id="respuesta5" tabindex="0"></p>
                            </div>
                            <div class="modal-footer">
                                <p id="total" tabindex="0"></p>
                                <a href="javascript:location.reload()" tabindex="0">Cerrar</a>

                            </div>
                        </div>

                    </div>
                </div>
            </form>

            <script>
                //variables
                var score1="0",score2="0",score3="0",score4="0",score5="0";
                var nota1=0,nota2=0,nota3=0,nota4=0,nota5=0,total=0;
                //valores del documento
                $(document).ready(function()
                {
                    $('input:radio').keypress(function(e){
                        if((e.keyCode ? e.keyCode : e.which) == 13){
                            $(this).trigger('click');
                        }
                    });
                    $("input[name=primeraPregunta]").change(function () {
                        score1=$(this).val();
                    });
                    $("input[name=segundaPregunta]").change(function () {
                        score2=$(this).val();
                    });
                    $("input[name=terceraPregunta]").change(function () {
                        score3=$(this).val();
                    });
                    $("input[name=cuartaPregunta]").change(function () {
                        score4=$(this).val();
                    });
                    $("input[name=quitaPregunta]").change(function () {
                        score5=$(this).val();
                    });
                });

                //informacion del modal
                $("#btnEnviar").click(function() {
                    if(score1==='rc1')
                    {
                        nota1=20;
                        document.getElementById("respuesta1").innerHTML = 'Respuesta 1 correcta.';
                    }else{
                        nota1=0;
                        document.getElementById("respuesta1").innerHTML = 'Respuesta 1 incorrecta. La respuesta es: Estados relativamente permanentes o transitorios.' ;
                    }
                    if(score2==='rc2')
                    {
                        nota2=20;
                        document.getElementById("respuesta2").innerHTML = 'Respuesta 2 correcta.';
                    }else{
                        nota2=0;
                        document.getElementById("respuesta2").innerHTML = 'Respuesta 2 incorrecta. La respuesta es: To be + Sujeto (pronombre personal) + oración.' ;
                    }
                    if(score3==='rc3')
                    {
                        nota3=20;
                        document.getElementById("respuesta3").innerHTML = 'Respuesta 3 correcta.';
                    }else{
                        nota3=0;
                        document.getElementById("respuesta3").innerHTML = 'Respuesta 3 incorrecta. La respuesta es: I am a student.' ;
                    }
                    if(score4==='rc4')
                    {
                        nota4=20;
                        document.getElementById("respuesta4").innerHTML = 'Respuesta 4 correcta.';
                    }else{
                        nota4=0;
                        document.getElementById("respuesta4").innerHTML = 'Respuesta 4 incorrecta. La respuesta es: Sujeto (pronombre personal)+ To be + not + oración.' ;
                    }
                    if(score5==='rc5')
                    {
                        nota5=20;
                        document.getElementById("respuesta5").innerHTML = 'Respuesta 5 correcta.';
                    }else{
                        nota5=0;
                        document.getElementById("respuesta5").innerHTML = 'Respuesta 5 incorrecta. La respuesta es: I am not a student.' ;
                    }

                    total=nota1+nota2+nota3+nota4+nota5;
                    document.getElementById("total").innerHTML ='Total = '+ total+'/100';
                });

                $('#btnCerrar').click(function() {
                    location.reload();
                });
                $('#btnCerrarX').click(function() {
                    location.reload();
                });
            </script>
        </div>
    </div>
    </body>
    </html>
<?php ob_end_flush(); ?>