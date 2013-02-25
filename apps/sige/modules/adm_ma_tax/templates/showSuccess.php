<h3>Adm ma tax</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_tax/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_tax/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_tax/edit?id='.$adm_ma_tax->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="6"><span class='icon-eye-open'></span> Vista Previa de Adm ma tax</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_tax->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_tax->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Alias:</th>
      <td><?php echo $adm_ma_tax->getAlias() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Porcentaje:</th>
      <td><?php echo $adm_ma_tax->getPorcentaje() ?></td>
    </tr>
  </tbody>
</table>