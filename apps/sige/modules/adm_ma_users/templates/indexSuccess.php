<h3>Usuarios</h3>
<hr>
<div class="content-controles">
<div class="portlet-content">
    <ul class="nav nav-pills">
      <li>
                  <a href="<?php echo url_for('adm_ma_users/new') ?>"><i class="icon-plus"></i> Crear</a>
              </li>
      <li class="active"><a href="#"><i class="icon-th-list"></i> Listar</a></li>
      <li><a class="search-button btn-buscar" href="#"><i class="icon-search"></i> Buscar</a></li>
    </li>
  </ul>
</div>
  <div class="filtro-modulo-general" <?php echo ($sf_user->getAttribute("filtro.adm_ma_users.activo"))?'style="display:block !important;"':"" ?>>
    <?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?>
  </div>
</div>

<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="7"><span class='icon-list-alt'></span> Lista</th>
    </tr>    
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Username</th>
      <th>Contacto</th>
      <th>Activo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_userss as $adm_ma_users): ?>
    <tr>
      <td><?php echo $adm_ma_users->getId() ?></td>
      <td><?php echo $adm_ma_users->getUsername() ?></td>
      <td><?php echo $adm_ma_users->AdmMaContact->getNombre() ?></td>
      <td><?php echo ($adm_ma_users->getActivo())?"Si":"No" ?></td>
      <td class="acciones">
        <a class="btn" href="<?php echo url_for('adm_ma_users/show?id='.$adm_ma_users->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
        <a class="btn" href="<?php echo url_for('adm_ma_users/edit?id='.$adm_ma_users->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php echo link_to('<span class="icon-trash"></span>', 'adm_ma_users/delete?id='.$adm_ma_users->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($adm_ma_userss->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('adm_ma_users/navegacion') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_userss->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_userss->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('adm_ma_users/navegacion') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('adm_ma_users/navegacion') ?>?page=<?php echo $adm_ma_userss->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>