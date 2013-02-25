<form action="<?php echo url_for('adm_ma_docs_t/filtrar') ?>" class="form-horizontal" method="post">
    <div class="control-group">
    <?php echo $form_filter['nombre']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['nombre'] ?>
    <?php echo $form_filter['nombre']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['modulo']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['modulo'] ?>
    <?php echo $form_filter['modulo']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['origen']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['origen'] ?>
    <?php echo $form_filter['origen']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['tipo_fiscal']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['tipo_fiscal'] ?>
    <?php echo $form_filter['tipo_fiscal']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['afecta_cuentas']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['afecta_cuentas'] ?>
    <?php echo $form_filter['afecta_cuentas']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['signo_cuentas']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['signo_cuentas'] ?>
    <?php echo $form_filter['signo_cuentas']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['contiene_renglones']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['contiene_renglones'] ?>
    <?php echo $form_filter['contiene_renglones']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['afecta_inventario']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['afecta_inventario'] ?>
    <?php echo $form_filter['afecta_inventario']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['reserva_inventario']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['reserva_inventario'] ?>
    <?php echo $form_filter['reserva_inventario']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['signo_inventario']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['signo_inventario'] ?>
    <?php echo $form_filter['signo_inventario']->renderError() ?>
    </div>
  </div>
    <div class="control-group">
    <?php echo $form_filter['id_cuenta']->renderLabel(null,array("class"=>"control-label")) ?>
    <div class="controls">
    <?php echo $form_filter['id_cuenta'] ?>
    <?php echo $form_filter['id_cuenta']->renderError() ?>
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
    <button class="btn" onclick="window.location.href='<?php echo url_for("adm_ma_docs_t/limpiarFiltro")?>';"  type="reset"><i class="icon-remove"></i> Limpiar</button> 
  </div>
</form>