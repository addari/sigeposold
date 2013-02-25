<form action="<?php echo url_for('adm_ma_contact/filtrar') ?>" class="form-horizontal" method="post">
    <?php echo $form_filter->renderHiddenFields(); ?>
    <div class="control-group">
    <?php echo $form_filter['nombre']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['nombre'] ?>
    <?php echo $form_filter['nombre']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['tipo_contacto']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['tipo_contacto'] ?>
    <?php echo $form_filter['tipo_contacto']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['id_tipo_identificacion']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_tipo_identificacion'] ?>
    <?php echo $form_filter['id_tipo_identificacion']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['numero_identificacion']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['numero_identificacion'] ?>
    <?php echo $form_filter['numero_identificacion']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['direccion']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['direccion'] ?>
    <?php echo $form_filter['direccion']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['telefonos']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['telefonos'] ?>
    <?php echo $form_filter['telefonos']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['email']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['email'] ?>
    <?php echo $form_filter['email']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['exonerado']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['exonerado'] ?>
    <?php echo $form_filter['exonerado']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['jubilado']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['jubilado'] ?>
    <?php echo $form_filter['jubilado']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_contact/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>