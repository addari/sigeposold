<h3>Contactos</h3>
<hr>
<div class="content-controles">
  <div class="portlet-content">
      <ul class="nav nav-pills">
        <li><a href="<?php echo url_for('adm_ma_contact/new') ?>"><i class="icon-plus"></i> Crear</a></li>
        <li><a href="<?php echo url_for('adm_ma_contact/index') ?>"><i class="icon-th-list"></i> Lista</a><li>
        <li><a href="<?php echo url_for('adm_ma_contact/edit?id='.$adm_ma_contact->getId()) ?>"><i class="icon-edit"></i> Modificar</a><li>
        <li class="active"><a href="#"><i class="icon-eye-open"></i> Ver</a></li>
      </li>
    </ul>
  </div>
</div>
<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="12"><span class='icon-eye-open'></span> Vista Previa de Contactos</th>
    </tr>
  </thead>	
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_contact->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_contact->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Tipo contacto:</th>
      <td><?php echo ($adm_ma_contact->getTipoContacto())?"Si":"No" ?></td>
    </tr>
    <tr>
      <th class="columna-show">Tipo de Identificación:</th>
      <td><?php echo $adm_ma_contact->AdmMaIdentT->getNombre() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Numero identificación:</th>
      <td><?php echo $adm_ma_contact->getNumeroIdentificacion() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Direccion:</th>
      <td><?php echo $adm_ma_contact->getDireccion() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Telefonos:</th>
      <td><?php echo $adm_ma_contact->getTelefonos() ?></td>
    </tr>
    <tr>
      <th class="columna-show">E.mail:</th>
      <td><?php echo $adm_ma_contact->getEmail() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Exonerado:</th>
      <td><?php echo ($adm_ma_contact->getExonerado())?"Si":"No" ?></td>
    </tr>
    <tr>
      <th class="columna-show">Jubilado:</th>
      <td><?php echo ($adm_ma_contact->getJubilado())?"Si":"No" ?></td>
    </tr>
  </tbody>
</table>