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
      <li class="active"><a href="#"><i class="icon-th-list"></i> Listar</a></li>
      <li><a class="search-button btn-buscar" href="#"><i class="icon-search"></i> Buscar</a></li>
    </li>
  </ul>
</div>
  <div class="filtro-modulo-general" [?= ($sf_user->getAttribute("filtro.<?php echo $this->getModuleName() ?>.activo"))?'style="display:block !important;"':"" ?]>
    [?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?]
  </div>
</div>

<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="<?php echo count($this->getColumns())+1 ?>"><span class='icon-list-alt'></span> Lista</th>
    </tr>    
    <tr class="btn-inverse">
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
      <td class="acciones">
        <?php if(  isset($this->params['with_show']) && $this->params['with_show'] ): ?>
        <a class="btn" href="[?php echo url_for('<?php echo $this->getModuleName() ?>/show?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]" title="Ver"><span class='icon-eye-open'></span></a>
        <?php endif; ?>        
        <a class="btn" href="[?php echo url_for('<?php echo $this->getModuleName() ?>/edit?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]" title="Modificar"><span class='icon-pencil'></span></a>
        [?php echo link_to('<span class="icon-trash"></span>', '<?php echo $this->getModuleName() ?>/delete?<?php echo $this->getPrimaryKeyUrlParams() ?>, array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?]
      </td>
      <?php endif; ?>      
<?php endif; ?>
<?php $i++; ?>
<?php endforeach; ?>
    </tr>
    [?php endforeach; ?]
  </tbody>
</table>

[?php if ($<?php echo $this->getPluralName() ?>->haveToPaginate()): ?]
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/navegacion') ?>?page=1">«</a></li>
      [?php foreach ($<?php echo $this->getPluralName() ?>->getLinks() as $page): ?]
        [?php if ($page == $<?php echo $this->getPluralName() ?>->getPage()): ?]
          <li class="disabled"><a href="#"><b>[?php echo $page ?]</b></a></li>
        [?php else: ?]
          <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/navegacion') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
        [?php endif; ?]
      [?php endforeach; ?]
      <li><a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/navegacion') ?]?page=[?php echo $<?php echo $this->getPluralName() ?>->getLastPage() ?]">»</a></li>
   </ul>
  </div>
[?php endif; ?]