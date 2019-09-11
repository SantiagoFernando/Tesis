 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Administrar
             <small>Equipos</small>
         </h1>

         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Examples</a></li>
             <li class="active">Blank page</li>
         </ol>

     </section>

     <!-- Main content -->
     <section class="content">

         <div class="row">
             <div class="col-md-4 col-sm-6 col-xs-12">
                 <div class="info-box" id="btnAdd1">
                     <span class="info-box-icon bg-blue"><i class="fa fa-laptop"></i></span>

                     <div class="info-box-content">
                         <span class="info-box-text">Nuevo</span>
                         <span class="info-box-number"><?php echo $equipo; ?></span>
                     </div>
                     <!-- /.info-box-content -->
                 </div>
                 <!-- /.info-box -->
             </div>
             <!-- /.col -->
         </div>
         <!--Mostar Un Mensaje-->
         <div class="alert alert-success" style="display:none;"></div>

         <div class="box-body">

             <!--Tabla para agregar los detalles de la factura-->
             <div class="row">
                 <div class="col-xs-12">
                     <div class="box">
                         <div class="box-header">
                             <h3 class="box-title">Detalles del Prestamo</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <table id="example3" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>N°</th>
                                         <th>Serie</th>
                                         <th>Marca</th>
                                         <th>Estado</th>
                                         <th>Acciones</th>
                                     </tr>
                                 </thead>

                                 <tbody id="showEqui">
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                 </tbody>

                                 <tfoot>
                                     <tr>
                                         <th>N°</th>
                                         <th>Serie</th>
                                         <th>Marca</th>
                                         <th>Estado</th>
                                         <th>Acciones</th>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                 </div>
             </div>

         </div>
         <!-- /.box-body -->
         <div class="box-footer">
             <h4>Reporte de Todos Los Equipos</h4>

             <!-- this row will not appear when printing -->
             <div class="row no-print">
                 <div class="col-xs-12">
                     <a href="<?php echo base_url(); ?>equipos/ctequipos/imprimir" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Reportes</a>
                 </div>
             </div>

         </div>
         <!-- /.box-footer-->
 </div>
 <!-- /.box -->

 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--========== MODAL DE LOS EQUIPOS ==========-->
 <div class="modal modal-info fade" id="myModal1" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Success Modal</h4>
             </div>
             <div class="modal-body">
                 <!--Formulario para Añadir Categorias-->
                 <form name="catf" class="form-horizontal" id="myForm1" method="post" action="">
                     <div class="box-body">
                         <input type="hidden" name="idequipo" value="0">

                         <div class="form-group">
                             <label for="adquisicion" class="col-sm-2 control-label">Adquisición*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtadqui" name="txtadqui" placeholder="Tipo de Adquisición" onkeyup="mayus(this);" onkeypress="return sololetras(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="serie" class="col-sm-2 control-label">Serie*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtserie" name="txtserie" placeholder="Ingrese el Numero de Serie" onkeypress="return sololnumeros(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="modelo" class="col-sm-2 control-label">Modelo*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtmodelo" name="txtmodelo" placeholder="Ingrese el Modelo" onkeyup="mayus(this);" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="marca" class="col-sm-2 control-label">Marca*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtmarca" name="txtmarca" placeholder="Ingrese la Marca" onkeyup="mayus(this);" onkeypress="return sololetras(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="numero" class="col-sm-2 control-label">Numero*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtnumero" name="txtnumero" placeholder="Numero de Equipo" onkeyup="mayus(this);" onkeypress="return sololnumeros(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="aula" class="col-sm-2 control-label">Ubicacion*:</label>
                             <div class="col-sm-7">
                                 <select class="form-control" style="width:100%" name="txtaula" id="txtaula">
                                     <option value="AULA PROFESORES">AULA PROFESORES</option>
                                     <option value="LABORATORIO DISEÑO">LABORATORIO DISEÑO</option>
                                     <option value="LABORATORIO CONTABILIDAD">LABORATORIO CONTABILIDAD</option>
                                     <option value="LABORATORIO COMPUTACION">LABORATORIO COMPUTACION</option>
                                     <option value="LABORATORIO 1">LABORATORIO 1</option>
                                     <option value="LABORATORIO 2">LABORATORIO 2</option>
                                     <option value="SECRETARIA">SECRETARIA</option>
                                 </select>
                             </div>
                         </div>

                         <!--Combo box para elegir la categoria-->
                         <div class="form-group">
                             <label for="categoria" class="col-sm-2 control-label">Categorias*</label>
                             <div class="col-sm-7">
                                 <select class="form-control select2" style="width:100%" name="categoria" id="categoria">
                                     <?php foreach ($categorias as $categoria) : ?>
                                         <option value="<?php echo $categoria->idcategoria ?>"><?php echo $categoria->nombrecategoria; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="fecha" class="col-sm-2 control-label">Fecha Compra*</label>
                             <div class="col-sm-5">
                                 <input type="text" class="form-control pull-right" name="fecha" id="fecha" placeholder="0000/00/00">
                             </div>
                             <!-- /.input group -->
                         </div>

                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Salir</button>
                 <button type="button" id="btnSave1" class="btn btn-primary">Guardar</button>

             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->