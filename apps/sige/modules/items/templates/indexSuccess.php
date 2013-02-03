<fieldset>
<legend><h3>Adm ma itemss List</h3></legend>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Id tipo</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Id impuesto</th>
      <th>Timestamp</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_itemss as $adm_ma_items): ?>
    <tr>
      <td><?php echo $adm_ma_items->getId() ?></td>
      <td><?php echo $adm_ma_items->getIdTipo() ?></td>
      <td><?php echo $adm_ma_items->getNombre() ?></td>
      <td><?php echo $adm_ma_items->getPrecio() ?></td>
      <td><?php echo $adm_ma_items->getIdImpuesto() ?></td>
      <td><?php echo $adm_ma_items->getTimestamp() ?></td>
      <td><a href="<?php echo url_for('items/edit?id='.$adm_ma_items->getId()) ?>"><?php echo "<span class='icon-pencil'></span> Editar" ?></a></td>
            
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn" href="<?php echo url_for('items/new') ?>"><span class="icon-plus"></span>  Nuevo</a>
</fieldset>
