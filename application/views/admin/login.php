<!DOCTYPE html>
<span lang="en">

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/template/login/images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/css/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/login/css/main.css">
        <!--===============================================================================================-->
    </head>

    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="<?php echo base_url(); ?>auth/login">
                        <p class="center_login_here"></p>
                        <span class="login100-form-title">
                            Inicio
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Favor Ingrese Cedula">
                            <input class="input100" type="text" name="username" value="1105153801" placeholder="Usuario" onkeypress="return sololnumeros(event)" onpaste="return false;">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Favor Ingrese Contraseña">
                            <input class="input100" type="password" name="password" placeholder="Contraseña">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Olvido
                            </span>

                            <a href="<?php echo base_url(); ?>auth/recuperar" class="txt2">
                                Contraseña?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                <input type="submit" class="login100-form-btn" value="Iniciar Sesion">
                            </button>
                        </div>

                        <!--Datos ingresados erroneos-->
                        <?php if ($this->session->flashdata("Error")) : ?>
                            <div class="alert alert-danger">
                                <div class="container">
                                    <div class="alert-icon">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <b>Error Alerta</b>
                                        <p><?php echo $this->session->flashdata("Error") ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="flex-col-c p-t-100 p-b-40">
                            <!--Validar existencia de Usuarios-->
                            <?php if ($persona <= 0) : ?>
                                <span class="txt1 p-b-9">
                                    ¿No tienes una Cuenta?
                                </span>
                                <a href="<?php echo base_url(); ?>auth/singin" class="txt3">
                                    Registrate Ahora
                                </a>
                            <?php else : ?>
                                <h5>Bienvenido</h5>
                            <?php endif; ?>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/bootstrap/js/popper.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/template/login/js/main.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>assets/dist/js/validaciones.js"></script>

    </body>

</span>