<h3>Tipo de Documentos</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_docs_t/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_docs_t/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_docs_t/edit?id='.$adm_ma_docs_t->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="15"><span class='icon-eye-open'></span> Vista Previa de Tipo de Documentos</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_docs_t->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_docs_t->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Modulo:</th>
      <td><?php echo $adm_ma_docs_t->getModulo() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Origen:</th>
      <td><?php echo $adm_ma_docs_t->getOrigen() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Tipo fiscal:</th>
      <td><?php echo $adm_ma_docs_t->getTipoFiscal() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Afecta cuentas:</th>
      <td><?php echo $adm_ma_docs_t->getAfectaCuentas() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Signo cuentas:</th>
      <td><?php echo $adm_ma_docs_t->getSignoCuentas() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Contiene renglones:</th>
      <td><?php echo $adm_ma_docs_t->getContieneRenglones() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Afecta inventario:</th>
      <td><?php echo $adm_ma_docs_t->getAfectaInventario() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Reserva inventario:</th>
      <td><?php echo $adm_ma_docs_t->getReservaInventario() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Signo inventario:</th>
      <td><?php echo $adm_ma_docs_t->getSignoInventario() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Id cuenta:</th>
      <td><?php echo $adm_ma_docs_t->getIdCuenta() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Activo:</th>
      <td><?php echo ($adm_ma_docs_t->getActivo())?"Si":"No" ?></td>
    </tr>
  </tbody>
</table>