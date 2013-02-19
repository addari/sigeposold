<form action="<?php echo url_for('adm_ma_contact_t/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['nombre']->renderLabel(array(),array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['nombre'] ?>
    <?php echo $form_filter['nombre']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['modulo']->renderLabel(array(),array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['modulo'] ?>
    <?php echo $form_filter['modulo']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['timestamp']->renderLabel(array(),array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['timestamp'] ?>
    <?php echo $form_filter['timestamp']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_contact_t/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>