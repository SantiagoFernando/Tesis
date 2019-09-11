 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Controlar
       <small>Devoluciones</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Examples</a></li>
       <li class="active">Blank page</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Devoluciones</h3>

         <div class="box-tools pull-right">
         </div>
       </div>
       <div class="box-body">
         <!--Inicio del Tabulador-->
         <div class="row">

           <!--Inicio del COL-MD-12-->
           <div class="col-md-12">

             <!--Tab Customs-->
             <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                 <li class="active"><a href="#tab_1" data-toggle="tab">Devueltos</a></li>
                 <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
               </ul>

               <form class="form-horizontal" role="form" name="frmDatos" onsubmit=" return vacios()" action="<?php echo base_url(); ?>/prestamos/ctprestamo/guardar" method="post">

                 <div class="tab-content">

                   <!-- /.tab1 Inicio-->
                   <div class="tab-pane active" id="tab_1">

                     <!-- /.box-header -->
                     <div class="box-body">

                       <table id="example1" class="table table-bordered table-striped">
                         <thead>
                           <tr>
                             <th>Cedula</th>
                             <th>Apellidos</th>
                             <th>Nombres</th>
                             <th>Fecha Pre.</th>
                             <th>Acciones</th>
                           </tr>
                         </thead>

                         <tbody>
                           <?php foreach ($prestamos as $prestamo) : ?>
                             <tr>
                               <td><?php echo $prestamo->persona; ?></td>
                               <td><?php echo $prestamo->apellidoper; ?></td>
                               <td><?php echo $prestamo->nombreper; ?></td>
                               <td><?php echo $prestamo->fechaprestamo; ?></td>
                               <td>
                                 <div class="btn-group">
                                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info" title="Devolucion"><i class="fa fa-edit"></i></button>
                                 </div>
                               </td>
                             </tr>
                           <?php endforeach; ?>
                         </tbody>



                         <tfoot>
                           <tr>
                             <th>Cedula</th>
                             <th>Apellidos</th>
                             <th>Nombres</th>
                             <th>Fecha Pre.</th>
                             <th>Acciones</th>
                           </tr>
                         </tfoot>
                       </table>
                     </div>
                     <!-- /.box-body -->

                   </div>
                   <!-- /.tab1 Fin-->

                 </div>

               </form>

             </div>
             <!--Tab Custon End-->

           </div>
           <!--Final del COL-MD-12-->

           <!---Final del Div Row-->
         </div>
         <!--Final del Metodo y DIseño del Tabulador-->
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