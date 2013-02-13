<fieldset>
<legend><h3><?php echo sfInflector::humanize($this->getPluralName()) ?> List</h3></legend>

<table class="table table-striped">
  <thead>
    <tr>
<?php foreach ($this->getColumns() as $column): ?>
      <th><?php echo sfInflector::humanize(sfInflector::underscore($column->getPhpName())) ?></th>
<?php endforeach; ?>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    [?php foreach ($<?php echo $this->getPluralName() ?> as $<?php echo $this->getSingularName() ?>): ?]
    <tr>
<?php $i=1; ?>
<?php $columnPrimary = "" ?>
<?php foreach ($this->getColumns() as $column): ?>
<?php if ($column->isPrimaryKey()): ?>
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
      <td>[?php echo $<?php echo $this->getSingularName() ?>->get<?php echo sfInflector::camelize($column->getPhpName()) ?>() ?]</td>
<?php else: ?>
      <?php $columnPrimary = $column; ?>
      <td>[?php echo $<?php echo $this->getSingularName() ?>->get<?php echo sfInflector::camelize($column->getPhpName()) ?>() ?]</td>
<?php endif; ?>
<?php else: ?>
      <td>[?php echo $<?php echo $this->getSingularName() ?>->get<?php echo sfInflector::camelize($column->getPhpName()) ?>() ?]</td>
      <?php if ($i == count($this->getColumns()) ): ?>
      <td><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/<?php echo isset($this->params['with_show']) && $this->params['with_show'] ? 'show' : 'edit' ?>?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]">[?php echo "<span class='icon-pencil'></span> Editar" ?]</a></td>
      <?php endif; ?>      
<?php endif; ?>
<?php $i++; ?>
<?php endforeach; ?>
    </tr>
    [?php endforeach; ?]
  </tbody>
</table>

<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
  <a class="btn" href="[?php echo url_for('<?php echo $this->getUrlForAction('new') ?>') ?]"><span class="icon-plus"></span>  Nuevo</a>
<?php else: ?>
  <a class="btn" href="[?php echo url_for('<?php echo $this->getModuleName() ?>/new') ?]"><span class="icon-plus"></span>  Nuevo</a>
<?php endif; ?>
</fieldset>
