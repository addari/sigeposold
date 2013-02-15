<form action="<?php echo url_for('tipo_identificacion/filtrar') ?>" class="form-horizontal" method="post">
  <div class="control-group">
    <?= $form_filter['id']->renderLabel(array(),array("class"=>"control-label")) ?>
    <div class="controls">
      <?php echo $form_filter['id'] ?> 
    </div>
  </div>

  <div class="control-group">
    <?= $form_filter['nombre']->renderLabel(array(),array("class"=>"control-label")) ?>
    <div class="controls">
      <?php echo $form_filter['nombre'] ?> 
    </div>
  </div>
  
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?= url_for("tipo_identificacion/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>