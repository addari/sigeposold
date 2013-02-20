<h3>Tipo de Documentos</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li class="active">
                      <a href="<?php echo url_for('adm_ma_docs_t/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_docs_t/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
              </li>
    </ul>
  </div>
</div>

<div class="vista-factura">
<?php include_partial('form', array('form' => $form, "accion_formulario" => "Nuevo Tipo de Documentos")) ?>
</div>