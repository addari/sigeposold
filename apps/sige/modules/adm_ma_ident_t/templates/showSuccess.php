<h3>Tipo de Identificación</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_ident_t/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_ident_t/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_ident_t/edit?id='.$adm_ma_ident_t->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="4"><span class='icon-eye-open'></span> Vista Previa de Tipo de Identificación</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_ident_t->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_ident_t->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Timestamp:</th>
      <td><?php echo $adm_ma_ident_t->getTimestamp() ?></td>
    </tr>
  </tbody>
</table>