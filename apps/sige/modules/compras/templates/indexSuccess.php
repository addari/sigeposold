<?php include_partial( 'templates', array( "form_filter" => $form_filter ) ) ?>
<div class="btn-toolbar">
  <div class="btn-group">
    <a class="btn" href="<?php echo url_for('facturacion/new') ?>"><span class="icon-plus"></span> Crear</a> 
  </div>
</div>
<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="8"><span class='icon-list-alt'></span> Facturación</th>
    </tr>
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Nro. Documento</th>
      <th>Contacto</th>
      <th>Fecha de Emisión</th>
      <th>Fecha de Vencimiento</th>
      <th>Total Documento</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_tr_docss as $adm_tr_docs): ?>
    <tr>
      <td><?php echo $adm_tr_docs->getId() ?></td>
      <td><?php echo $adm_tr_docs->getNumeroDocumento() ?></td>
      <td><?php echo $adm_tr_docs->AdmMaContact->getNombre() ?></td>
      <td><?php echo $adm_tr_docs->getDateTimeObject("fecha_emision")->format("d/m/Y") ?></td>
      <td><?php echo $adm_tr_docs->getDateTimeObject("fecha_vencimiento")->format("d/m/Y") ?></td>
      <td class="total-columna-number"><?= Helpers::FormatearMonto($adm_tr_docs->getTotalDocumento()) ?></td>
      <td>
        <a class="btn" href="<?php echo url_for('facturacion/show?id='.$adm_tr_docs->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <?php if ( $adm_tr_docs->AdmTrDocsFiscalR->count() == 0 ): ?>
          <a class="btn" href="<?php echo url_for('facturacion/edit?id='.$adm_tr_docs->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php else: ?>
          <a class="btn disabled" href="#" title="Modificar" onclick="javascript: App.Helpers.MensajeNotificacion ({tipo: 'error', mensaje: 'No es posible editar el documento por tener impresión fiscal.',selector:'#mensaje-notifiacion'});"><span class='icon-pencil'></span></a>
        <?php endif; ?>
        <?php if ( $adm_tr_docs->AdmTrDocsDetalleR->count() == 0 ): ?>
          <?php echo link_to('<span class="icon-trash"></span>', 'facturacion/delete?id='.$adm_tr_docs->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
        <?php else: ?>
          <a class="btn disabled" href="#" title="Eliminar" onclick="javascript: App.Helpers.MensajeNotificacion ({tipo: 'error', mensaje: 'Este documento contiene items, por favor elimine los items para poder eliminarlo.',selector:'#mensaje-notifiacion'});"><span class='icon-trash'></span></a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfool>
    <tr>
      <td colspan="5" class="total-columna-label">
        Total
      </td>
      <td class="total-columna-number">
        <?php $sumTotal = 0; ?>
        <?php foreach($adm_tr_docss->getResults() as $documento): ?>
            <?php $sumTotal += $documento->getTotalDocumento(); ?>
        <?php endforeach; ?>
            <?= Helpers::FormatearMonto( $sumTotal ) ?>
      </td>
      <td></td>
    </tr>
    <tr>
      <td colspan="10">
          <div class="pull-right">
            <strong><?php echo $adm_tr_docss->getNbResults() ?></strong> Registros <?php if ($adm_tr_docss->haveToPaginate()): ?> - Página <strong><?php echo $adm_tr_docss->getPage() ?>/<?php echo $adm_tr_docss->getLastPage() ?></strong> <?php endif; ?>
          </div>            
      </td>
    </tr>
  </tfool>
</table>

<?php if ($adm_tr_docss->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('facturacion/index') ?>?page=1">«</a></li>
      <?php foreach ($adm_tr_docss->getLinks() as $page): ?>
        <?php if ($page == $adm_tr_docss->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('facturacion/index') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('facturacion/index') ?>?page=<?php echo $adm_tr_docss->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>