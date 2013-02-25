<h3>Tipo de Documentos</h3>
<hr>
<div class="content-controles">
<div class="portlet-content">
    <ul class="nav nav-pills">
      <li>
                  <a href="<?php echo url_for('adm_ma_docs_t/new') ?>"><i class="icon-plus"></i> Crear</a>
              </li>
      <li class="active"><a href="#"><i class="icon-th-list"></i> Listar</a></li>
      <li><a class="search-button btn-buscar" href="#"><i class="icon-search"></i> Buscar</a></li>
    </li>
  </ul>
</div>
  <div class="filtro-modulo-general" <?php echo ($sf_user->getAttribute("filtro.adm_ma_docs_t.activo"))?'style="display:block !important;"':"" ?>>
    <?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?>
  </div>
</div>

<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan=14><span class='icon-list-alt'></span> Lista</th>
    </tr>    
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Nombre</th>
      <th>Modulo</th>
      <th>Origen</th>
      <th>Tipo fiscal</th>
      <th>Afecta cuentas</th>
      <th>Signo cuentas</th>
      <th>Contiene renglones</th>
      <th>Afecta inventario</th>
      <th>Reserva inventario</th>
      <th>Signo inventario</th>
      <th>Id cuenta</th>
      <th>Activo</th>
      <th class="acciones-header">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_docs_ts as $adm_ma_docs_t): ?>
    <tr>
      <td><?php echo $adm_ma_docs_t->getId() ?></td>
      <td><?php echo $adm_ma_docs_t->getNombre() ?></td>
      <td><?php echo $adm_ma_docs_t->getModulo() ?></td>
      <td><?php echo $adm_ma_docs_t->getOrigen() ?></td>
      <td><?php echo $adm_ma_docs_t->getTipoFiscal() ?></td>
      <td><?php echo $adm_ma_docs_t->getAfectaCuentas() ?></td>
      <td><?php echo $adm_ma_docs_t->getSignoCuentas() ?></td>
      <td><?php echo $adm_ma_docs_t->getContieneRenglones() ?></td>
      <td><?php echo $adm_ma_docs_t->getAfectaInventario() ?></td>
      <td><?php echo $adm_ma_docs_t->getReservaInventario() ?></td>
      <td><?php echo $adm_ma_docs_t->getSignoInventario() ?></td>
      <td><?php echo $adm_ma_docs_t->getIdCuenta() ?></td>
      <td><?php echo ($adm_ma_docs_t->getActivo())?"Si":"No" ?></td>
      <td class="acciones">
        <a class="btn" href="<?php echo url_for('adm_ma_docs_t/show?id='.$adm_ma_docs_t->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <a class="btn" href="<?php echo url_for('adm_ma_docs_t/edit?id='.$adm_ma_docs_t->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php echo link_to('<span class="icon-trash"></span>', 'adm_ma_docs_t/delete?id='.$adm_ma_docs_t->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
      </td>
            
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($adm_ma_docs_ts->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('adm_ma_docs_t/navegacion') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_docs_ts->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_docs_ts->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('adm_ma_docs_t/navegacion') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('adm_ma_docs_t/navegacion') ?>?page=<?php echo $adm_ma_docs_ts->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>