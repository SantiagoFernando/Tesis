 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Administración de Prestamos
         </h1>
     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box">
             <div class="box-header with-border">
                 <h3 class="box-title">Prestamos Nuevos y Pendientes</h3>

                 <div class="box-tools pull-right">

                 </div>
             </div>

             <div class="box-body">

                 <div class="row">

                     <div class="col-md-12">
                         <!-- Custom Tabs -->
                         <div class="nav-tabs-custom">
                             <ul class="nav nav-tabs">
                                 <li class="active"><span class='label label-info'><a href="#tab_1" data-toggle="tab">Prestamos</a></span></li>
                                 <li><span class='label label-info'><a href="#tab_2" data-toggle="tab">Alquilados</a></span></li>
                             </ul>

                             <form class="form-horizontal" role="form" name="frmDatos" onsubmit=" return vacios()" action="<?php echo base_url(); ?>/prestamos/ctprestamo/guardar" method="post">
                                 <div class="tab-content">

                                     <!-- /.tab-pane 1-->
                                     <div class="tab-pane active" id="tab_1">

                                         <!--Inicio 1ra fila-->
                                         <div class="row">
                                             <div class="form-group">
                                                 <label for="txtcedula" class="col-sm-2 control-label">Cedula</label>
                                                 <div class="col-sm-3">
                                                     <input type="text" class="form-control" id="autoc1" name="txtcedulap" onkeypress="return sololnumeros(event)" placeholder="Cedula" maxlength="10">

                                                     <input type="hidden" name="idper" id="idper">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label for="txtapeper" class="col-sm-2 control-label">Apellidos</label>
                                                 <div class="col-sm-3">
                                                     <input type="text" readonly id="txtapeper" name="txtapeper" class="form-control" placeholder="Apellidos">
                                                 </div>
                                             </div>
                                         </div>
                                         <!--Fin 1ra fila-->

                                         <!--Inicio 2da fila-->
                                         <div class="row">
                                             <div class="form-group">
                                                 <label class="col-sm-2 control-label" for="txtnomper">Nombre</label>
                                                 <div class="col-sm-3">
                                                     <input type="text" readonly id="txtnomper" name="txtnomper" class="form-control" placeholder="Nombre">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label for="fecha" class="col-sm-2 control-label">Fecha Prestamo</label>
                                                 <div class="date col-sm-3">
                                                     <input type="text" class="form-control pull-right" name="fecha" id="fecha" placeholder="0000/00/00">
                                                 </div>
                                                 <!-- /.input group -->
                                             </div>

                                         </div>
                                         <!--Fin 2da fila-->

                                         <div class="row">
                                             <div class="form-group">
                                                 <label for="txtencargado" class="col-sm-2 control-label">Encargado:</label>
                                                 <div class="col-sm-5">
                                                     <select name="txtencargado" id="txtencargado" class="form-control">
                                                         <?php foreach ($personas as $persona) : ?>
                                                             <?php if ($persona->rol == "ADMIN") : ?>
                                                                 <option value="<?php echo $persona->apellido . " " . $persona->nombre; ?>"><?php echo $persona->apellido . " " . $persona->nombre; ?></option>
                                                             <?php endif; ?>
                                                         <?php endforeach; ?>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="form-group">
                                                 <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
                                                 <div class="col-sm-3">
                                                     <select name="categoria" id="categoria" class="form-control">
                                                         <?php foreach ($categorias as $categoria) : ?>
                                                             <option value="<?php echo $categoria->idcategoria ?>"><?php echo $categoria->nombrecategoria; ?></option>
                                                         <?php endforeach; ?>
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label for="equipos" class="col-sm-2 control-label">Equipos</label>
                                                 <div class="col-sm-3">
                                                     <select name="equipos" id="equipos" class="form-control" disabled="">
                                                         <option value="">---SELECCIONE---</option>
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label for="equipos" class="col-sm-2 control-label"></label>
                                                 <div class="col-sm-3">
                                                     <button type="button" id="btnTb" class="btn btn-primary">Agregar</button>
                                                 </div>
                                             </div>

                                         </div>

                                         <div class="row">
                                             <table id="example3" class="table table-bordered table-striped">
                                                 <thead>
                                                     <tr>
                                                         <th>Categioria</th>
                                                         <th>Numero</th>
                                                         <th>Acciones</th>
                                                     </tr>
                                                 </thead>

                                                 <tbody id="showPre">
                                                     <tr>
                                                         <td></td>
                                                         <td></td>
                                                         <td></td>
                                                     </tr>
                                                 </tbody>

                                                 <tfoot>
                                                     <tr>
                                                         <th>Categioria</th>
                                                         <th>Numero</th>
                                                         <th>Acciones</th>
                                                     </tr>
                                                 </tfoot>
                                             </table>

                                             <input type="hidden" id="txtDt" name="txtDt">

                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                                 <button type="submit" class="btn btn-primary">Guardar</button>
                                             </div>

                                         </div>

                                     </div>

                                     <input type="hidden" name="txtDt" id="txtDt">
                                     <!-- /.tab-pane 1 End-->

                                     <!--/. tab-pane 2 star-->
                                     <div class="tab-pane" id="tab_2">

                                         <table id="example2" class="table table-bordered table-striped">
                                             <thead>
                                                 <tr>
                                                     <th>Cedula</th>
                                                     <th>Persona</th>
                                                     <th>Fecha</th>
                                                     <th>Estado</th>
                                                     <th>Acciones</th>
                                                 </tr>
                                             </thead>

                                             <tbody id="showprestamos">
                                                 <!--<?php if (!empty($prestamos)) : ?>
                                                     <?php foreach ($prestamos as $prestamo) : ?>
                                                         <?php if ($prestamo->estadoprestamo == "PENDIENTE") : ?>
                                                             <tr>
                                                                 <td><?php echo $prestamo->persona; ?></td>
                                                                 <td><?php echo $prestamo->apellidoper . '' . $prestamo->nombreper; ?></td>
                                                                 <td><?php echo $prestamo->fechaprestamo; ?></td>
                                                                 <td><?php echo $prestamo->estadoprestamo; ?></td>
                                                                 <td>
                                                                     <input type="hidden" name="txtV" id="txtV" value="<?php echo $prestamo->idprestamo ?>">

                                                                     <div class="btn-group">

                                                                         <button type="button" class="btn btn-info btn-ver-pres" value="<?php echo $prestamo->idprestamo ?>" data-toggle="modal" data-target='#modal-default'><i class="fa fa-align-left"></i></button>

                                                                         <button type="button" class="btn btn-warning btn-ver-pres" value="<?php echo $prestamo->idprestamo ?>" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button>

                                                                         <button type="button" class="btn btn-danger btn-ver-pres" name="btnA" value="<?php echo $prestamo->idprestamo ?>" data-toggle="modal" data-target="#modal-default"><i class="fa fa-gear"></i></button>

                                                                     </div>
                                                                 </td>
                                                             </tr>
                                                         <?php endif; ?>
                                                     <?php endforeach; ?>
                                                 <?php endif; ?>-->
                                             </tbody>
                                             <tfoot>
                                                 <tr>
                                                     <th>Cedula</th>
                                                     <th>Persona</th>
                                                     <th>Fecha</th>
                                                     <th>Estado</th>
                                                     <th>Acciones</th>
                                                 </tr>
                                             </tfoot>
                                         </table>

                                     </div>
                                     <!--/. tab-pane 2 end-->

                                 </div>
                                 <!-- /.tab-content -->
                             </form>
                         </div>
                         <!-- nav-tabs-custom -->
                     </div>
                     <!-- /.col -->

                 </div>

             </div>
             <!-- /.box-body -->
             <div class="box-footer">

             </div>
             <!-- /.box-footer-->
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--Modal de la Informacion del  Prestamo-->
 <div class="modal fade" id="modal-default">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Modal</h4>
             </div>
             <div class="modal-body">
                 <!--Formulario para Añadir Categorias-->
                 <form name="catf" class="form-horizontal" id="myForm1" method="post" action="">
                     <div class="box-body">
                         <input type="text" name="idprestamo" id="idprestamo" value="0">

                         <div class="form-group">
                             <label for="txtencar" class="col-sm-3 control-label">Encargado*:</label>

                             <div class="col-sm-5">
                                 <input type="text" readonly class="form-control" id="txtencar" name="txtencar">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="obser" class="col-sm-3 control-label">Observación*:</label>

                             <div class="col-sm-7">
                                 <textarea name="txtobser" id="txtobser" class="form-control col-md-4" placeholder="Alguna Observacion ¿?"></textarea>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="fecha2" class="col-sm-3 control-label">Fecha Prestamo*:</label>
                             <div class="date col-sm-4">
                                 <input type="text" class="form-control pull-right" name="fecha2" id="fecha2" placeholder="0000/00/00">
                             </div>
                             <!-- /.input group -->
                         </div>

                         <div class="form-group">
                             <div class="table-responsive">
                                 <table class="table no-margin">
                                     <thead>
                                         <tr>
                                             <th>Equipo</th>
                                             <th>Numero</th>
                                         </tr>
                                     </thead>

                                     <tbody">
                                     </tbody>
                                     <?php foreach ($detalles as $detalle) : ?>
                                         <?php if ($detalle->iddetalle == 2) : ?>
                                             <tr>
                                                 <td><?php echo $detalle->categoria; ?></td>
                                                 <td><?php echo $detalle->equipoid; ?></td>
                                             </tr>
                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                     <tfoot>
                                         <tr>
                                             <th>Equipo</th>
                                             <th>Numero</th>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                         </div>

                     </div>
                 </form>
                 <!--Formulario para las Funciones de la Devolucion, Anulaion-->
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary"> Finalizar</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->