<form action="<?php echo url_for('adm_ma_emp_users_r/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['id_empresa']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_empresa'] ?>
    <?php echo $form_filter['id_empresa']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['id_usuario']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_usuario'] ?>
    <?php echo $form_filter['id_usuario']->renderError() ?>
    </div>
  </div>
    
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_emp_users_r/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>