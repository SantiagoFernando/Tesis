 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Inico
       <small>del Sistema</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Administrar</h3>

         <div class="box-tools pull-right">
           
         </div>
       </div>
       <div class="box-body">
         <div class="row">
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-aqua">
               <div class="inner">
                 <h3><?php echo $equipo; ?></h3>

                 <p>Equipos</p>
               </div>
               <div class="icon">
                 <i class="ion ion-bag"></i>
               </div>
               <a href="<?php echo base_url(); ?>equipos/ctequipos" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-green">
               <div class="inner">
                 <h3><?php echo $prestamo; ?><sup style="font-size: 20px"></sup></h3>

                 <p>Prestamos</p>
               </div>
               <div class="icon">
                 <i class="ion ion-stats-bars"></i>
               </div>
               <a href="<?php echo base_url(); ?>prestamos/ctprestamo" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-yellow">
               <div class="inner">
                 <h3><?php echo $persona; ?></h3>

                 <p>Personas</p>
               </div>
               <div class="icon">
                 <i class="ion ion-person-add"></i>
               </div>
               <a href="<?php echo base_url(); ?>personas/ctpersona" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-red">
               <div class="inner">
                 <h3><?php echo $numeroCat; ?></h3>

                 <p>Categorias</p>
               </div>
               <div class="icon">
                 <i class="ion ion-pie-graph"></i>
               </div>
               <a href="<?php echo base_url(); ?>categorias/ctcategoria" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
       <div class="box-footer">
         <h4>Respaldo de la Base de datos</h4>
         <a type="button" class="btn btn-info pull-left" href="<?php echo base_url(); ?>/prestamos/ctprestamo/backup">Back Up</a>
       </div>
       <!-- /.box-footer-->
     </div>
     <!-- /.box -->

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->