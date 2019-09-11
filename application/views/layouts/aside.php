 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="<?php echo base_url(); ?>assets/template/images/simbolo.ico" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p><?php echo $this->session->userdata("nombre"); ?></p>
                 <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
             </div>
         </div>

         <!-- /.search form -->
         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
             <li class="header">Menu de Navegacion</li>

             <!--Menu Principal-->
             <li>
                 <a href="<?php echo base_url(); ?>dashboard">
                     <i class="fa fa-home"></i> <span>Inicio</span>
                     <span class="pull-right-container">
                     </span>
                 </a>
             </li>

             <!--Ventana de Prestacion de Equipos-->
             <li>
                 <a href="<?php echo base_url(); ?>prestamos/ctprestamo">
                     <i class="fa fa-files-o"></i> <span>Prestaciones</span>
                     <span class="pull-right-container">
                     </span>
                 </a>
             </li>

             <!--Categorias-->
             <li>
                 <a href="<?php echo base_url(); ?>categorias/ctcategoria">
                     <i class="fa fa-book"></i> <span>Categorias</span>
                     <span class="pull-right-container">
                     </span>
                 </a>
             </li>

             <!--Administracion de Equipos-->
             <li>
                 <a href="<?php echo base_url(); ?>equipos/ctequipos">
                     <i class="fa fa-desktop"></i> <span>Equipos</span>
                     <span class="pull-right-container">
                     </span>
                 </a>
             </li>

             <!--Inicio De Listado Para Administrador-->
             <li class="treeview">
                 <a href="#">
                     <i class="fa fa-male"></i> <span>Administración</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="<?php echo base_url(); ?>personas/ctadmin"><i class="fa fa-circle-o text-yellow"></i> Administrador</a></li>
                     <li><a href="<?php echo base_url(); ?>personas/ctpersona"><i class="fa fa-circle-o text-yellow"></i> Personas</a></li>
                 </ul>
             </li>
             <!--Finaliza Listado Para Administrador-->

             <!--Inicio De Listado Para Reportes-->
             <li class="treeview">
                 <a href="#">
                     <i class="fa fa-folder-open"></i> <span>Reportes</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="<?php echo base_url(); ?>reportes/represtamo"><i class="fa fa-circle-o text-green"></i> Prestamos</a></li>
                     <li><a href="<?php echo base_url(); ?>reportes/devolucion"><i class="fa fa-circle-o text-green"></i> Devoluciones</a></li>
                 </ul>
             </li>
             <!--Finaliza Listado Para Reportes-->

     </section>
     <!-- /.sidebar -->
 </aside>