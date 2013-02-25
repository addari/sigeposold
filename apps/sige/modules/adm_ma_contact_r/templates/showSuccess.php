<h3>Relación Contacto - Tipo</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li>
                      <a href="<?php echo url_for('adm_ma_contact_r/new') ?>"><i class="icon-plus"></i> Crear</a>
                  </li>
                <li><a href="<?php echo url_for('adm_ma_contact_r/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_contact_r/edit?id='.$adm_ma_contact_r->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
                <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="5"><span class='icon-eye-open'></span> Vista Previa de Relación Contacto - Tipo</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_contact_r->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Contacto:</th>
      <td><?php echo $adm_ma_contact_r->AdmMaContact->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Tipo:</th>
      <td><?php echo $adm_ma_contact_r->AdmMaContactT->getNombre() ?></td>
    </tr>
  </tbody>
</table>