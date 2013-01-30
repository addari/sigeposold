<fieldset>
<legend><h3>Adm ma contacts List</h3></legend>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Tipo contacto</th>
      <th>Id tipo identificacion</th>
      <th>Numero identificacion</th>
      <th>Direccion</th>
      <th>Telefonos</th>
      <th>Email</th>
      <th>Exonerado</th>
      <th>Jubilado</th>
      <th>Timestamp</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_contacts as $adm_ma_contact): ?>
    <tr>
            <td><?php echo $adm_ma_contact->getId() ?></td>
      <td><?php echo $adm_ma_contact->getNombre() ?></td>
            
      <td><?php echo $adm_ma_contact->getTipoContacto() ?></td>
            
      <td><?php echo $adm_ma_contact->getIdTipoIdentificacion() ?></td>
            
      <td><?php echo $adm_ma_contact->getNumeroIdentificacion() ?></td>
            
      <td><?php echo $adm_ma_contact->getDireccion() ?></td>
            
      <td><?php echo $adm_ma_contact->getTelefonos() ?></td>
            
      <td><?php echo $adm_ma_contact->getEmail() ?></td>
            
      <td><?php echo $adm_ma_contact->getExonerado() ?></td>
            
      <td><?php echo $adm_ma_contact->getJubilado() ?></td>
            
      <td><?php echo $adm_ma_contact->getTimestamp() ?></td>
            <td><a href="<?php echo url_for('clientes/edit?id='.$adm_ma_contact->getId()) ?>"><?php echo "<span class='icon-pencil'></span> Editar" ?></a></td>
            
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn" href="<?php echo url_for('clientes/new') ?>"><span class="icon-plus"></span>  Nuevo</a>
</fieldset>
