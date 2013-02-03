
<form action="<?php echo url_for('facturacion/filtrar') ?>" method="post">
  <?php echo $form_filter->renderHiddenFields(false) ?>
<table class="table table-bordered sin-lineas-border">
    <thead>
    <tr>
      <th colspan="2" class="btn-info">
        <span class='icon-search'></span> <strong> Busqueda de Item</strong>
      </th>
    </tr>
    </thead>
    <tbody>
      <tr>
        <th class="linea-left">
          <?php echo $form_filter['id']->renderLabel() ?>
        </th>
        <td>
          <?php echo $form_filter['id'] ?> 
        </td>
      </tr>      
      <tr>
        <th class="linea-left">
          <?php echo $form_filter['id_tipo']->renderLabel() ?>
        </th>
        <td>
          <?php echo $form_filter['id_tipo'] ?> 
        </td>
      </tr>
      <tr>
        <th class="linea-left">
          <?php echo $form_filter['numero_documento']->renderLabel() ?>
        </th>
        <td>
          <?php echo $form_filter['numero_documento'] ?> 
        </td>
      </tr>
      <tr>
        <th class="linea-left">
          <?php echo $form_filter['contacto']->renderLabel() ?>
        </th>
        <td>
          <?php echo $form_filter['contacto'] ?> 
        </td>
      </tr>       
      <tr>
          <th class="linea-left">
            <?php echo $form_filter['fecha_emision']->renderLabel() ?>
          </th>
          <td>
            <?php echo $form_filter['fecha_emision'] ?> 
          </td>
      </tr>
      <tr>
          <th class="linea-left">
            <?php echo $form_filter['fecha_vencimiento']->renderLabel() ?>
          </th>
          <td>
            <?php echo $form_filter['fecha_vencimiento'] ?> 
          </td>
      </tr>

      <th colspan="2" class="linea-left">
      	<button class="btn" type="submit"><span class="icon-search"></span> Buscar</button> 
        <button class="btn" onclick="window.location.href='<?= url_for("facturacion/limpiarFiltro")?>';" type="reset">Limpiar</button>
      </th>
    </tr>
    </tbody>
</table>
</form>