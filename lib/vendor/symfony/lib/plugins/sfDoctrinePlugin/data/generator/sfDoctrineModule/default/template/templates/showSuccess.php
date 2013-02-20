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
        <li><a href="[?php echo url_for('<?php echo $this->getUrlForAction('edit') ?>', $<?php echo $this->getSingularName() ?>) ?]"><i class="icon-edit"></i> Modificar</a></li>
        <?php else: ?>
        <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/index') ?]"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/edit?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]"><i class="icon-edit"></i> Modificar</a><li>
        <?php endif; ?>
        <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="<?php echo count($this->getColumns())+1 ?>"><span class='icon-eye-open'></span> Vista Previa de <?php echo sfInflector::humanize($this->getModuleName()) ?></th>
    </tr>
  </thead>	
  <tbody>
<?php foreach ($this->getColumns() as $column): if($column->getPhpName()=="timestamp") continue ?>
    <tr>
      <th class="columna-show"><?php echo sfInflector::humanize(sfInflector::underscore($column->getPhpName())) ?>:</th>
      <td>[?php echo $<?php echo $this->getSingularName() ?>->get<?php echo sfInflector::camelize($column->getPhpName()) ?>() ?]</td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>