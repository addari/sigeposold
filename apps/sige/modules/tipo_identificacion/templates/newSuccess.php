<h3>Tipo de Identificación</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
      	<li class="active"><a href="#"><i class="icon-plus"></i> Crear</a></li>
        <li><a href="<?php echo url_for('tipo_identificacion/index') ?>"><i class="icon-th-list"></i> Listar</a></li>
      </li>
    </ul>
  </div>
</div>
<div class="vista-tipo-documento">
<?php include_partial( 'form', array('form' => $form, "accion_formulario" => "Nuevo Tipo de Identificación")) ?>
</div>