
<form action="<?php echo url_for('tipo_identificacion/filtrar') ?>" method="post">
  <?php echo $form_filter->renderHiddenFields(false) ?>
<table class="table table-bordered sin-lineas-border filtro-modulo-general">
    <thead>
    <tr>
      <th colspan="2" class="btn-info">
        <span class='icon-search'></span> <strong> Busqueda de Tipo de Identificación</strong>
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
          <?php echo $form_filter['nombre']->renderLabel() ?>
        </th>
        <td>
          <?php echo $form_filter['nombre'] ?> 
        </td>
      </tr>      
      <th colspan="2" class="linea-left">
      	<button class="btn" type="submit"><span class="icon-search"></span> Buscar</button> 
        <button class="btn" onclick="window.location.href='<?= url_for("tipo_identificacion/limpiarFiltro")?>';" type="reset">Limpiar</button>
      </th>
    </tr>
    </tbody>
</table>
</form>