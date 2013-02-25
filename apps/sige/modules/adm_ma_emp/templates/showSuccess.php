<h3>Empresas</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_emp/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_emp/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_emp/edit?id='.$adm_ma_emp->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="7"><span class='icon-eye-open'></span> Vista Previa de Empresas</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_emp->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_emp->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Tipo de Identificación:</th>
      <td><?php echo $adm_ma_emp->AdmMaIdentT->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Numero identificación:</th>
      <td><?php echo $adm_ma_emp->getNumeroIdentificacion() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Id principal:</th>
      <td><?php echo $adm_ma_emp->getIdPrincipal() ?></td>
    </tr>
  </tbody>
</table>