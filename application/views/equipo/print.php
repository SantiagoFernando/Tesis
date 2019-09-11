<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reportes de los Equipos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-pdf-o"></i> Instituto Tecnologico Superior Daniel Albarez Burneo.
                        <small class="pull-right">Date: 2/10/2014</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="box-body">
                <div class="box">
                    <!-- /.box-header -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>N° de Serie</th>
                                <th>Numero</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Aula</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($equipos as $equipo) : ?>
                            <tr>
                                <th><?php echo $equipo->idequipo; ?></th>
                                <th><?php echo $equipo->serie; ?></th>
                                <th><?php echo $equipo->numero; ?></th>
                                <th><?php echo $equipo->marca; ?></th>
                                <th><?php echo $equipo->modelo; ?></th>
                                <th><?php echo $equipo->ubicacion; ?></th>
                                <th><?php echo $equipo->estadoequipo; ?></th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>N° de Serie</th>
                                <th>Numero</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Aula</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>