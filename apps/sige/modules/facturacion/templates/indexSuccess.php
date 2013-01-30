<div class="btn-toolbar">
  <div class="btn-group">
    <a class="btn" href="<?php echo url_for('facturacion/new') ?>"><span class="icon-plus"></span> Crear</a> 
  </div>
</div>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="10"><span class='icon-list-alt'></span> Facturación</th>
    </tr>
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Nro. Documento</th>
      <th>Contacto</th>
      <th>Fecha de Emisión</th>
      <th>Monto Total</th>
      <th>Comentarios</th>
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
      <td><?php echo Helpers::FormatearMonto($adm_tr_docs->getMontoImpuesto() + $adm_tr_docs->getMontoGrabado  ()) ?></td>
      <td><?php echo $adm_tr_docs->getComentarios() ?></td>
      <td>
        <a class="btn" href="<?php echo url_for('facturacion/show?id='.$adm_tr_docs->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <a class="btn" href="<?php echo url_for('facturacion/edit?id='.$adm_tr_docs->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php if ( $adm_tr_docs->AdmTrDocsDetalleR->count() == 0 ): ?>
          <?php echo link_to('<span class="icon-trash"></span>', 'facturacion/delete?id='.$adm_tr_docs->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfool>
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