<?php $form = $this->getFormObject() ?>
<form action="[?php echo url_for('<?php echo $this->getModuleName() ?>/filtrar') ?]" class="form-horizontal" method="post">
  <?php foreach ($form as $name => $field): if (($field->isHidden()) || ($name == "timestamp"))  continue ?>
  <div class="control-group">
    [?php echo $form_filter['<?php echo $name ?>']->renderLabel(null,array("class"=>"control-label")) ?]
    <div class="controls">
    [?php echo $form_filter['<?php echo $name ?>'] ?]
    [?php echo $form_filter['<?php echo $name ?>']->renderError() ?]
    </div>
  </div>
  <?php endforeach; ?>
  
  [?php echo $form_filter->renderHiddenFields(false) ?]
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='[?= url_for("<?php echo $this->getModuleName() ?>/limpiarFiltro")?]';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>