<form action="<?php echo url_for('adm_ma_users/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['username']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['username'] ?>
    <?php echo $form_filter['username']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['id_contacto']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_contacto'] ?>
    <?php echo $form_filter['id_contacto']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['activo']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['activo'] ?>
    <?php echo $form_filter['activo']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_users/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>