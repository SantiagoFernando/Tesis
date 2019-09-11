<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control de
            <small>Administradores</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue ">
                    <div class="inner">
                        <h3>Nuevo</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>personas/ctadmin/add" class="small-box-footer">Registrar <i class="fa fa-arrow-circle-right "></i></a>
                </div>
            </div>
            <div class="col-xs-12">

                <!--Mensajes de guardar y actualizar-->
                <?php if ($this->session->flashdata("exito")) : ?>
                    <div id="mostrar" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Exito!</h4>
                        <p> <?php echo $this->session->flashdata("exito"); ?></p>
                    </div>
                <?php endif; ?>
                <!--Fin DeMensajes de guardar y actualizar-->

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de Administradores</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($persona)) : ?>
                                    <?php foreach ($persona as $personas) : ?>
                                        <?php if ($personas->rol == "ADMIN") : ?>
                                            <tr>
                                                <td><?php echo $personas->cedula; ?></td>
                                                <td><?php echo $personas->apellido; ?></td>
                                                <td><?php echo $personas->nombre; ?></td>
                                                <td><?php echo $personas->estadopersona; ?></td>
                                                <td>
                                                    <div class="margin">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info">Acciones</button>
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="<?php echo base_url(); ?>personas/ctadmin/edd/<?php echo $personas->idpersona; ?>" data-toggle="tooltip" title="Editar Admin">Editar</a></li>
                                                                <?php if ($personas->estadopersona == 'A') : ?>
                                                                    <li><a href="<?php echo base_url(); ?>personas/ctadmin/desactivar/<?php echo $personas->idpersona; ?>" data-toggle="tooltip" title="Desactivar Admin">Desactivar</a></li>
                                                                <?php else : ?>
                                                                    <li><a href="<?php echo base_url(); ?>personas/ctadmin/activarse/<?php echo $personas->idpersona; ?>" data-toggle="tooltip" title="Activar Admin">Activar</a></li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box -->
                    <!-- /.box-footer-->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->