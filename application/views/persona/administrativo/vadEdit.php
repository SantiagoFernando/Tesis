<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Actualizar
      <small>Administrador</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_generales" data-toggle="tab">Datos Generales</a></li>
                    <li><a href="#tab_cuenta" data-toggle="tab">Cuenta</a></li>
                  </ul>

                  <form action="<?php echo base_url(); ?>personas/ctadmin/actualizar" method="post">
                    <input type="hidden" name="txtidpersona" value="<?php echo $persona->idpersona; ?>">
                    <div class="tab-content">

                      <!-- /.tab1 Inicio-->
                      <div class="tab-pane active" id="datos_generales">

                        

                        <!--Inicio 1ra fila-->
                        <div class="row">
                          <div class="form-group col-md-6 <?php echo (form_error("txtapellido")) ? 'has-error' : ''; ?>">
                            <label for="txtapellidos">Apellidos</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" id="txtapellido" name="txtapellido" class="form-control" placeholder="Ingresar apellidos" onkeyup="mayus(this);" value="<?php echo set_value("txtapellidos") ?><?php echo $persona->apellido; ?>" onkeypress="return sololetras(event)">
                            </div>
                            <?php echo form_error("txtapellido", "<span class='help-block'>", "</span>"); ?>
                          </div>

                          <div class="form-group col-sm-6  <?php echo (form_error("txtnombre")) ? 'has-error' : ''; ?>">
                            <label for="txtnombre">Nombre</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" id="txtnombre" name="txtnombre" value="<?php echo set_value("txtnombre") ?><?php echo $persona->nombre; ?>" class="form-control" placeholder="Nombre" onkeypress="return sololetras(event)" onkeyup="mayus(this);" onpaste="return false;">
                            </div>
                            <?php echo form_error("txtnombre", "<span class='help-block'>", "</span>"); ?>
                          </div>
                        </div>
                        <!--Fin 1ra fila-->

                        <!--Inicio 2da fila-->
                        <div class="row">
                          <div class="form-group col-sm-6 <?php echo (form_error("txtcedula")) ? 'has-error' : ''; ?>">
                            <label for="txtcedula">Cédula</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file"></i></span>
                              <input type="text" id="cedula" value="<?php echo set_value("txtnombre") ?><?php echo $persona->cedula; ?>" name="txtcedula" class="form-control" maxlength="10" onkeypress="return sololnumeros(event)" onpaste="return false;" onkeyup="validarDocumento();" placeholder="Cédula">
                            </div>
                            <?php echo form_error("txtcedula", "<span class='help-block'>", "</span>"); ?>
                          </div>

                          <div class="form-group col-sm-6 <?php echo (form_error("txttelefono")) ? 'has-error' : ''; ?>">
                            <label for="txttelefono">Telefono</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-tty"></i></span>
                              <input type="text" id="txttelefono" name="txttelefono" class="form-control" placeholder="Telefono" onkeypress="return sololnumeros(event)" onpaste="return false;" value="<?php echo set_value("txttelefono") ?><?php echo $persona->telefono; ?>">
                            </div>
                            <?php echo form_error("txttelefono", "<span class='help-block'>", "</span>"); ?>
                          </div>

                        </div>
                        <!--Fin 2da fila-->

                        <!--Inicio 3ra fila-->
                        <div class="row">
                          <div class="form-group col-sm-6 <?php echo (form_error("txtemail")) ? 'has-error' : ''; ?>">
                            <label for="txtemail">Email</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" id="txtemail" name="txtemail" value="<?php echo set_value("txtemail") ?><?php echo $persona->email; ?>" class="form-control" placeholder="Email">
                            </div>
                            <?php echo form_error("txtemail", "<span class='help-block'>", "</span>"); ?>
                          </div>

                          <div class="form-group col-sm-6 <?php echo (form_error("txtdireccion")) ? 'has-error' : ''; ?>">
                            <label for="txtdireccion">Dirección</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                              <textarea type="textarea" name="txtdireccion" id="txtdireccion" class="form-control" placeholder="Dirección" onkeypress="return sololetras(event)" onpaste="return false;" onkeyup="mayus(this);"><?php echo set_value("txtdireccion") ?><?php echo $persona->direccion; ?></textarea>
                            </div>
                            <?php echo form_error("txtdireccion", "<span class='help-block'>", "</span>"); ?>
                          </div>

                        </div>
                        <!--Fin 3ra fila-->

                      </div>
                      <!-- /.tab-pane 1-->

                      <div class="tab-pane" id="tab_cuenta">
                        <!--Inicio 1ra fila-->
                        <div class="row">

                          <div class="form-group col-sm-6 <?php echo (form_error("txtClave")) ? 'has-error' : ''; ?>">
                            <label for="passwordCuenta">Clave</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-info"></i></span>
                              <input type="password" value="<?php echo set_value("txtclave") ;?>" name="txtclave" id="txtclave" class="form-control" placeholder="Contraseña">
                            </div>
                            <?php echo form_error("txtclave", "<span class='help-block'>", "</span>"); ?>
                          </div>

                          <div class="form-group col-sm-6 <?php echo (form_error("txtClave2")) ? 'has-error' : ''; ?>">
                            <label for="passwordCuentaVerificar">Repita Clave</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-info"></i></span>
                              <input type="password" value="<?php echo set_value("txtclave2") ;?>" name="txtclave2" id="txtclave2" class="form-control" placeholder="Repita Contraseña" onkeyup="validacion('txtclave2')">
                            </div>
                            <?php echo form_error("txtclave2", "<span class='help-block'>", "</span>"); ?>
                          </div>

                        </div>
                        <!--Fin 1ra fila-->
                      </div>
                      <!-- /.tab-pane 2-->

                    </div>

                    <div class="modal-footer">
                      <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>personas/ctadmin">Cancelar</a>
                      <input type="submit" class="btn btn-info pull-right" value="Actualizar">
                    </div>

                  </form>
                </div>
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!--Mensajes de Error-->
      <div class="col-md-4">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Errores!</h4>
          <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>
      </div>
      <!--Fin de Mensajes de Error-->
    </div>
  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->