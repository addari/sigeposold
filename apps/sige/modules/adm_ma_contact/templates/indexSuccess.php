<h3>Contactos</h3>
<hr>
<div class="content-controles">
<div class="portlet-content">
    <ul class="nav nav-pills">
      <li>
          <a href="<?php echo url_for('adm_ma_contact/new') ?>"><i class="icon-plus"></i> Crear</a>
      </li>
      <li class="active"><a href="#"><i class="icon-th-list"></i> Listar</a></li>
      <li><a class="search-button btn-buscar" href="#"><i class="icon-search"></i> Buscar</a></li>
    </li>
  </ul>
</div>
  <div class="filtro-modulo-general" <?php echo ($sf_user->getAttribute("filtro.adm_ma_contact.activo"))?'style="display:block !important;"':"" ?>>
    <?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?>
  </div>
</div>

<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="12"><span class='icon-list-alt'></span> Lista</th>
    </tr>    
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Nombre</th>
      <th>Tipo de Contacto</th>
      <th>Tipo de Identificación</th>
      <th>Numero de Identificación</th>
      <th>Dirección</th>
      <th>Telefonos</th>
      <th>E-mail</th>
      <th>Exonerado</th>
      <th>Jubilado</th>
      <th class="acciones-header">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_contacts as $adm_ma_contact): ?>
    <tr>
      <td><?php echo $adm_ma_contact->getId() ?></td>
      <td><?php echo $adm_ma_contact->getNombre() ?></td>
      <td><?php echo ($adm_ma_contact->getTipoContacto())?"Si":"No" ?></td>
      <td><?php echo $adm_ma_contact->AdmMaIdentT->getNombre() ?></td>
      <td><?php echo $adm_ma_contact->getNumeroIdentificacion() ?></td>
      <td><?php echo $adm_ma_contact->getDireccion() ?></td>
      <td><?php echo $adm_ma_contact->getTelefonos() ?></td>
      <td><?php echo $adm_ma_contact->getEmail() ?></td>
      <td><?php echo ($adm_ma_contact->getExonerado())?"Si":"No" ?></td>
      <td><?php echo ($adm_ma_contact->getJubilado())?"Si":"No" ?></td>
      <td class="acciones">
        <a class="btn" href="<?php echo url_for('adm_ma_contact/show?id='.$adm_ma_contact->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <a class="btn" href="<?php echo url_for('adm_ma_contact/edit?id='.$adm_ma_contact->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php echo link_to('<span class="icon-trash"></span>', 'adm_ma_contact/delete?id='.$adm_ma_contact->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($adm_ma_contacts->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('adm_ma_contact/navegacion') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_contacts->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_contacts->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('adm_ma_contact/navegacion') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('adm_ma_contact/navegacion') ?>?page=<?php echo $adm_ma_contacts->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>