<script type="text/javascript">
agregarItem = function (item) {
    var model = window.opener.App.Facturacion.Collection.Items_Collection.get( item.producto_id ),
        output = "";

    if( !_.isUndefined ( model )){
      output = App.Helpers.Mensaje({
                tipo:    "error",
                mensaje: "El producto <strong>"+item.descripcion+"</strong> ya fue cargado"
              });
      
      $(".mensaje").html( output );
      return false;
    }

    window.opener.agregarItem( item );
    window.close();
}
</script>
<form action="<?php echo url_for('adm_ma_items/filtrarItemFactura') ?>" method="post">
<?php echo $form_filter->renderHiddenFields(); ?>
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
        <?php echo $form_filter['nombre']->renderLabel() ?>
      </th>
      <td>
        <?php echo $form_filter['nombre'] ?> 
        <button class="btn" type="submit"><span class="icon-search"></span> Buscar</button> 
        <button class="btn" onclick="window.location.href='<?= url_for("adm_ma_items/buscarItemFactura")?>';" type="reset">Limpiar</button>
        <button class="btn" onclick="window.close()">Cerrar</button>
      </td>
    </tr>
    </tbody>
</table>
</form>

<div class="mensaje"></div>  

<table class="table table-striped table-bordered">
  <thead>
    <tr class="btn-inverse">
      <th class="columna-seleccion"></th>
      <th>ID</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Impuesto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_itemss as $adm_ma_items): ?>
    <?php
    $item = array(
      "producto_id"   => $adm_ma_items->getId(),
      "descripcion"   => $adm_ma_items->getNombre(),
      "precio"        => $adm_ma_items->getPrecio(),
      "costo"         => $adm_ma_items->getCosto(),
      "impuesto"      => $adm_ma_items->AdmMaTax->getAlias(),
      "porc_impuesto" => $adm_ma_items->AdmMaTax->getPorcentaje(),
      "monto_impuesto"=> $adm_ma_items->getPrecio() * ( $adm_ma_items->AdmMaTax->getPorcentaje() / 100 )
      );
    ?>
    <tr>
      <td><a href="#" class="btn" onclick='agregarItem(<?= json_encode($item) ?>);'><span class='icon-hand-up'></span></a></td>
      <td><?php echo $adm_ma_items->getId() ?></td>
      <td><?php echo $adm_ma_items->getNombre() ?></td>
      <td><?php echo Helpers::FormatearMonto($adm_ma_items->getPrecio()) ?></td>
      <td><?php echo $adm_ma_items->AdmMaTax->getAlias() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfool>
    <tr>
      <td colspan="5">
          <div class="pull-right">
            <strong><?php echo $adm_ma_itemss->getNbResults() ?></strong> Registros <?php if ($adm_ma_itemss->haveToPaginate()): ?> - Página <strong><?php echo $adm_ma_itemss->getPage() ?>/<?php echo $adm_ma_itemss->getLastPage() ?></strong> <?php endif; ?>
          </div>            
      </td>
    </tr>
  </tfool>  
</table>

<div style="clear:both;"></div>
<!-- Inicio de paginación -->

<?php if ($adm_ma_itemss->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('adm_ma_items/navegacionItemFactura') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_itemss->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_itemss->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('adm_ma_items/navegacionItemFactura') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('adm_ma_items/navegacionItemFactura') ?>?page=<?php echo $adm_ma_itemss->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>