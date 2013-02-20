<h3>Tipo de Identificación</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li><a href="<?php echo url_for('facturacion/new') ?>"><i class="icon-plus"></i> Crear</a></li>
        <li><a href="<?php echo url_for('facturacion/index') ?>"><i class="icon-th-list"></i> Listar</a></li>
        <li><a href="<?php echo url_for('facturacion/edit?id='.$adm_tr_docs->getId()) ?>"><i class="icon-edit"></i> Modificar</a></li>
        <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>

<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="2"><span class='icon-eye-open'></span> Vista Previa del Documento</th>
    </tr>
  </thead>  
  <tbody>
    <tr>
      <th class="columna-show">Nro. de Documento:</th>
      <td><?php echo $adm_tr_docs->getNumeroDocumento() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Contacto:</th>
      <td><?php echo $adm_tr_docs->AdmMaContact->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Fecha de Emisión:</th>
      <td><?php echo $adm_tr_docs->getDateTimeObject("fecha_emision")->format("d/m/Y") ?></td>
    </tr>
    <tr>
      <th class="columna-show">Fecha vencimiento:</th>
      <td><?php echo $adm_tr_docs->getDateTimeObject("fecha_vencimiento")->format("d/m/Y") ?></td>
    </tr>
    <tr>
      <th class="columna-show">Total documento:</th>
      <td>
        <?= Helpers::FormatearMonto( $adm_tr_docs->getMontoExento() + $adm_tr_docs->getMontoGravado() + $adm_tr_docs->getMontoImpuesto() ) ?>
      </td>
    </tr>
    <tr>
      <th class="columna-show">Comentarios:</th>
      <td><?php echo $adm_tr_docs->getComentarios() ?></td>
    </tr>
  </tbody>
</table>

<div class="clearfix separador"></div>

<fieldset>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="6"><span class='icon-list-alt'></span> Detalle de Items</th>
    </tr>
    <tr class="btn-inverse">
      <th class="codigo">Código</th>
      <th class="descripcion">Descripción</th>
      <th class="cantidad">Cantidad</th>
      <th class="precio">Precio</th>
      <th class="impuesto">Impuesto</th>
      <th class="total-renglon">Total Renglón</th>
    </tr>
  </thead>
  <tbody>
    <?php if( $adm_tr_docs->AdmTrDocsDetalleR->count() == 0 ): ?>
      <tr>
        <td colspan="6"><b>No existen registros asociados.</b></td>
      </tr>
    <?php else: ?>    
      <?php foreach ($adm_tr_docs->AdmTrDocsDetalleR as $adm_tr_docs_detalle_r): ?>
      <tr>
        <td><?php echo $adm_tr_docs_detalle_r->getId() ?></td>
        <td><?php echo ($adm_tr_docs_detalle_r->getDescripcion())?$adm_tr_docs_detalle_r->getDescripcion() : $adm_tr_docs_detalle_r->AdmMaItems->getNombre() ?></td>
        <td><?php echo (int)$adm_tr_docs_detalle_r->getCantidad() ?></td>
        <td class="total-columna-number"><?php echo Helpers::FormatearMonto($adm_tr_docs_detalle_r->getPrecio()) ?></td>
        <td class="total-columna-number"><?php echo Helpers::FormatearMonto($adm_tr_docs_detalle_r->getMontoImpuesto()) ?></td>
        <td class="total-columna-number"><?php echo Helpers::FormatearMonto($adm_tr_docs_detalle_r->getPrecio()) ?></td>
      </tr>
      <?php endforeach; ?>
    <?php endif; ?>    
  </tbody>
  <tfool>
    <tr>
      <td colspan="5" class="total-columna-label">
        Total
      </td>
      <td class="total-columna-number">
        <?= Helpers::FormatearMonto( $adm_tr_docs->getMontoExento() + $adm_tr_docs->getMontoGravado() + $adm_tr_docs->getMontoImpuesto() ) ?>
      </td>
    </tr>
  <tfool>   
</table>
</fieldset>
