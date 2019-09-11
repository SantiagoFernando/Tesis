 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Administrar
             <small>Alquilantes</small>
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
                 <div class="info-box" id="btnAdd4">
                     <span class="info-box-icon bg-blue"><i class="fa fa-odnoklassniki"></i></span>

                     <div class="info-box-content">
                         <span class="info-box-text">Nueva Persona</span>
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
                             <h3 class="box-title">Detalles de los Alquilantes</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <table id="example3" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Cedula</th>
                                         <th>Apellidos</th>
                                         <th>Nombres</th>
                                         <th>Estado</th>
                                         <th>Acciones</th>
                                     </tr>
                                 </thead>

                                 <tbody id="showPer">
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
                     </div>
                     <!-- /.box -->
                 </div>
             </div>

         </div>
         <!-- /.box-body -->
         <div class="box-footer">
             Footer
         </div>
         <!-- /.box-footer-->
 </div>
 <!-- /.box -->

 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--========== MODAL DE Las Personas ==========-->
 <div class="modal modal-info fade" id="myModal4" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Success Modal</h4>
             </div>
             <div class="modal-body">
                 <!--Formulario para Añadir Personas-->
                 <form name="catf" class="form-horizontal" id="myForm4" method="post" action=""
                     <div class="box-body">
                         <input type="hidden" name="idpersona" value="0">

                         <div class="form-group">
                             <label for="cedula" class="col-sm-2 control-label">Cedula*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="cedulap" name="txtcedula" placeholder="Ingrese la Cedula" maxlength="10" onkeypress="return sololnumeros(event)" onpaste="return false;" onkeyup="validarDoc();">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="apellidos" class="col-sm-2 control-label">Apellidos*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtapellidos" name="txtapellidos" placeholder="Ingrese los Apellidos" onkeyup="mayus(this);" onkeypress="return sololetras(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="nombres" class="col-sm-2 control-label">Nombres*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txtnombres" name="txtnombres" placeholder="Ingrese los Nombres" onkeyup="mayus(this);" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="direccion" class="col-sm-2 control-label">Direccion*</label>

                             <div class="col-sm-9">
                                 <textarea name="txtdir" class="form-control" name="txtdir" id="txtdir" col-md-4 placeholder="Direccion" onkeyup="mayus(this);" onkeypress="return sololetras(event)" onpaste="return false;"></textarea>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="telefono" class="col-sm-2 control-label">Telefono*:</label>

                             <div class="col-sm-9">
                                 <input type="text" class="form-control" id="txttelf" name="txttelf" placeholder="Numero de Telefono" onkeyup="mayus(this);" onkeypress="return sololnumeros(event)" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="correo" class="col-sm-2 control-label">Correo*:</label>

                             <div class="col-sm-9">
                                 <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo / Email" onpaste="return false;">
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="cargo" class="col-sm-2 control-label">Función*:</label>
                             <div class="col-sm-7">
                                 <select name="txtcargo" id="txtcargo" class="form-control">
                                     <option value="DOCENTE">PROFESOR</option>
                                     <option value="ALUMNO">ESTUDIANTE</option>
                                 </select>
                             </div>
                         </div>

                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Salir</button>
                 <button type="button" id="btnSave4" class="btn btn-primary">Guardar</button>

             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->