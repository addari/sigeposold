<form action="<?php echo url_for('adm_ma_emp/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['nombre']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['nombre'] ?>
    <?php echo $form_filter['nombre']->renderError() ?>
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
    <?php echo $form_filter['id_principal']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_principal'] ?>
    <?php echo $form_filter['id_principal']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_emp/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>