
<form action="<?php echo url_for('adm_tr_docs/filtrar') ?>" class="form-horizontal" method="post">
  <?php echo $form_filter->renderHiddenFields(false) ?>
  <div class="control-group">
    <?php echo $form_filter['id']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id'] ?>
    <?php echo $form_filter['id']->renderError() ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form_filter['id_tipo']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_tipo'] ?>
    <?php echo $form_filter['id_tipo']->renderError() ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form_filter['numero_documento']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['numero_documento'] ?>
    <?php echo $form_filter['numero_documento']->renderError() ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form_filter['contacto']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['contacto'] ?>
    <?php echo $form_filter['contacto']->renderError() ?>
    </div>
  </div>  

  <div class="control-group">
    <?php echo $form_filter['fecha_emision']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['fecha_emision'] ?>
    <?php echo $form_filter['fecha_emision']->renderError() ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form_filter['fecha_vencimiento']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['fecha_vencimiento'] ?>
    <?php echo $form_filter['fecha_vencimiento']->renderError() ?>
    </div>
  </div>

  <div class="form-actions">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Buscar</button>   
    <button class="btn" onclick="window.location.href='<?= url_for("adm_tr_docs/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>