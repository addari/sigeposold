<h3>Usuarios</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_users/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_users/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_users/edit?id='.$adm_ma_users->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="7"><span class='icon-eye-open'></span> Vista Previa de Usuarios</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_users->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Username:</th>
      <td><?php echo $adm_ma_users->getUsername() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Contacto:</th>
      <td><?php echo $adm_ma_users->AdmMaContact->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Activo:</th>
      <td><?php echo ($adm_ma_users->getActivo())?"Si":"No" ?></td>
    </tr>
  </tbody>
</table>