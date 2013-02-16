<h3><?php echo sfInflector::humanize($this->getModuleName()) ?></h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
          <?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
            <a href="[?php echo url_for('<?php echo $this->getUrlForAction('new') ?>') ?]"><i class="icon-plus"></i> Crear</a>
          <?php else: ?>
            <a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/new') ?]"><i class="icon-plus"></i> Crear</a>
          <?php endif; ?>
        </li>
        <?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
        <li><a href="[?php echo url_for('<?php echo $this->getUrlForAction('list') ?>') ?]"><i class="icon-th-list"></i> Lista</a></li>
        <li class="active"><a href="[?php echo url_for('<?php echo $this->getUrlForAction('edit') ?>', $<?php echo $this->getSingularName() ?>) ?]"><i class="icon-edit"></i> Modificar</a></li>
        <?php else: ?>
        <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/index') ?]"><i class="icon-th-list"></i> Lista</a><li>
        <li class="active"><a href="#"><i class="icon-edit"></i> Modificar</a><li>
        <?php endif; ?>
        <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/show?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>

<div class="vista-factura">
[?php include_partial('form', array("form" => $form, "accion_formulario" => "Editar <?php echo sfInflector::humanize($this->getModuleName()) ?>")) ?]
</div>