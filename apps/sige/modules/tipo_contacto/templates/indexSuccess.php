<?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?>

<div class="btn-toolbar">
  <div class="btn-group">
    <a class="btn" href="<?php echo url_for('tipo_contacto/new') ?>"><span class="icon-plus"></span>  Crear</a>    
  </div>
</div>
<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_ident_ts as $adm_ma_ident_t): ?>
    <tr>
      <td><?php echo $adm_ma_ident_t->getId() ?></td>
      <td><?php echo $adm_ma_ident_t->getNombre() ?></td>
      <td class="acciones">
        <a class="btn" href="<?php echo url_for('tipo_contacto/show?id='.$adm_ma_ident_t->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <a class="btn" href="<?php echo url_for('tipo_contacto/edit?id='.$adm_ma_ident_t->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php echo link_to('<span class="icon-trash"></span>', 'tipo_contacto/delete?id='.$adm_ma_ident_t->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfool>
    <tr>
      <td colspan="3">
          <div class="pull-right">
            <strong><?php echo $adm_ma_ident_ts->getNbResults() ?></strong> Registros <?php if ($adm_ma_ident_ts->haveToPaginate()): ?> - Página <strong><?php echo $adm_ma_ident_ts->getPage() ?>/<?php echo $adm_ma_ident_ts->getLastPage() ?></strong> <?php endif; ?>
          </div>            
      </td>
    </tr>
  </tfool>  
</table>