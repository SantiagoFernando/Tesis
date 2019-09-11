 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Categorias
       <small>Administración De Categorias</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="info-box" id="btnAdd">
           <span class="info-box-icon bg-blue"><i class="fa fa-folder-open"></i></span>

           <div class="info-box-content">
             <span class="info-box-text">Nueva Categoria</span>
             <span class="info-box-number"><?php echo $numeroCat; ?></span>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
     </div>
     <!--Mostar Un Mensaje-->
     <div class="alert alert-success" style="display:none;">

     </div>
     <!--Fin De Mostar Un Mensaje-->
     <div class="row">
       <div class="col-md-8">
         <div class="box box-success">
           <div class="box-header with-border">
             <h3 class="box-title">Listado de Categorias</h3>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="table-responsive">
               <table class="table no-margin">
                 <thead>
                   <tr>
                     <th>N.</th>
                     <th>Nombre</th>
                     <th>Estado</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody id="showdata">

                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
 </div>
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--========== MODAL DE LOS DATOS PARA LAS CATEGORIAS ==========-->
 <div class="modal modal-info fade" id="myModal" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Success Modal</h4>
       </div>
       <div class="modal-body">
         <!--Formulario para Añadir Categorias-->
         <form name="catf" class="form-horizontal" id="myForm" method="post" action="">
           <div class="box-body">
             <input type="hidden" name="idcategoria" value="0">
             <div class="form-group">
               <label for="nombrecategoria" class="col-sm-2 control-label">Nombre*:</label>

               <div class="col-sm-10">
                 <input type="text" class="form-control" id="nombrecategoria" name="nombrecategoria" placeholder="Nombre Categoria" onkeyup="mayus(this);" onkeypress="return sololetras(event)" onpaste="return false;">
               </div>
             </div>
           </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Salir</button>
         <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>

       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->