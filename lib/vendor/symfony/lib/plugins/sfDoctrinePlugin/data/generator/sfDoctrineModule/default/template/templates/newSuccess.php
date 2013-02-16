<h3><?php echo sfInflector::humanize($this->getModuleName()) ?></h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li class="active">
          <?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
            <a href="[?php echo url_for('<?php echo $this->getUrlForAction('new') ?>') ?]"><i class="icon-plus"></i> Crear</a>
          <?php else: ?>
            <a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/new') ?]"><i class="icon-plus"></i> Crear</a>
          <?php endif; ?>
        </li>
        <?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
        <li><a href="[?php echo url_for('<?php echo $this->getUrlForAction('list') ?>') ?]"><i class="icon-th-list"></i> Lista</a></li>
        <?php else: ?>
        <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/index') ?]"><i class="icon-th-list"></i> Lista</a><li>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</div>

<div class="vista-factura">
[?php include_partial('form', array('form' => $form, "accion_formulario" => "Nuevo <?php echo sfInflector::humanize($this->getModuleName()) ?>")) ?]
</div>