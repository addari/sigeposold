<h3>Relación Empresas - Usuarios</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_emp_users_r/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_emp_users_r/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_emp_users_r/edit?id='.$adm_ma_emp_users_r->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="5"><span class='icon-eye-open'></span> Vista Previa de Empresa</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_emp_users_r->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Empresa:</th>
      <td><?php echo $adm_ma_emp_users_r->AdmMaEmp->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Usuario:</th>
      <td><?php echo $adm_ma_emp_users_r->AdmMaUsers->getUsername() ?></td>
    </tr>
  </tbody>
</table>