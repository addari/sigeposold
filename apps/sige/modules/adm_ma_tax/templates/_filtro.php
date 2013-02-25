<form action="<?php echo url_for('adm_ma_tax/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['nombre']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['nombre'] ?>
    <?php echo $form_filter['nombre']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['alias']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['alias'] ?>
    <?php echo $form_filter['alias']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['porcentaje']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['porcentaje'] ?>
    <?php echo $form_filter['porcentaje']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_tax/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>