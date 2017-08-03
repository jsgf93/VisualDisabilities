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
                <h1 class="text-center"><strong>Evaluacion de la primera lección</strong></h1>

            </div>
            <form>


                <fieldset class="form-group row">

                    <legend class="col-form-legend col-sm-12">La evaluación consta de diez preguntas, seleccione la que crea correcta:</legend>
                    <div class="col-sm-12">
                        <h3>Primera pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                 lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Segunda pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Tercera pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Cuarta pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Quinta pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Sexta pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Septima pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Octava pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Novena pregunta</h3>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                lal
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3>Decima pregunta</h3>
                        <p><strong>El pronombre IT, va seguido del verbo to be:</strong></p>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                                am
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                is
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                are
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Finalizar Evaluación</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    </body>
    </html>
<?php ob_end_flush(); ?>