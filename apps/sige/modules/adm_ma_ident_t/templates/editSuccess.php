<h3>Tipo de Identificación</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_ident_t/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_ident_t/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li class="active"><a href="#"><i class="icon-edit"></i> Modificar</a><li>
                <li><a href="<?php echo url_for('adm_ma_ident_t/show?id='.$adm_ma_ident_t->getId()) ?>"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>

<div class="vista-factura">
<?php include_partial('form', array("form" => $form, "accion_formulario" => "Editar Tipo de Identificación")) ?>
</div>