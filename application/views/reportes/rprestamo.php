 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Reportes
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <form action="<?php echo current_url(); ?>" method="POST">

       <!-- Default box -->
       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Reportes por Fecha y Categoria</h3>

           <div class="box-tools pull-right">

           </div>
         </div>
         <div class="box-body">

           <div class="row">

             <div class="col-md-12">
               <!-- Custom Tabs -->
               <div class="nav-tabs-custom">
                 <ul class="nav nav-tabs">
                   <li class="active"><a href="#tab_1" data-toggle="tab">Alquilados</a></li>
                 </ul>


                 <div class="tab-content">
                   <!-- /.tab3 Inicio-->
                   <div class="tab-pane-active" id="tab_1">

                     <!--Inicio 2da fila-->
                     <div class="row">
                       <!--Combo box para elegir la categoria-->

                       <label for="categoria" class="col-sm-1 control-label">Categorias*</label>
                       <div class="col-sm-3">
                         <select class="form-control select2" style="width:100%" name="categoria" id="categoria">
                           <?php foreach ($categorias as $categoria) : ?>
                           <option value="<?php echo $categoria->idcategoria ?>"><?php echo $categoria->nombrecategoria; ?></option>
                           <?php endforeach; ?>
                         </select>
                       </div>

                       <label for="" class="col-md-1 control-label">Desde:</label>
                       <div class="col-md-3">
                         <input type="date" name="fechainicio" class="form-control" value="<?php echo !empty($fechainicio) ? $fechainicio : ''; ?>">
                       </div>

                       <label for="" class="col-md-1 control-label">Hasta:</label>
                       <div class="col-md-3">
                         <input type="date" name="fechafin" class="form-control" value="<?php echo !empty($fechafin) ? $fechafin : ''; ?>">
                       </div>
                       <div class="col-md-4">
                         <label for="" class="col-md-1 control-label"></label>
                       </div>
                       <!-- /.input group -->
                     </div>

                   </div>
                   <!--Fin 2da fila-->

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

                   </div>

                 </div>
                 <!-- /.tab-pane 1-->

               </div>
               <!-- /.tab-content -->

             </div>
             <!-- nav-tabs-custom -->
           </div>
           <!-- /.col -->

         </div>

       </div>
       <!-- /.box-body -->
       <div class="box-footer">
         <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
         <a href="<?php echo base_url(); ?>reportes/rcitas" class="btn btn-danger">Restablecer</a>
       </div>
       <!-- /.box-footer-->
 </div>
 <!-- /.box -->

 </form>
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->