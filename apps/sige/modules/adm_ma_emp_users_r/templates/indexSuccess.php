<h3>Relación Empresas - Usuarios</h3>
<hr>
<div class="content-controles">
<div class="portlet-content">
    <ul class="nav nav-pills">
      <li>
                  <a href="<?php echo url_for('adm_ma_emp_users_r/new') ?>"><i class="icon-plus"></i> Crear</a>
              </li>
      <li class="active"><a href="#"><i class="icon-th-list"></i> Listar</a></li>
      <li><a class="search-button btn-buscar" href="#"><i class="icon-search"></i> Buscar</a></li>
    </li>
  </ul>
</div>
  <div class="filtro-modulo-general" <?php echo ($sf_user->getAttribute("filtro.adm_ma_emp_users_r.activo"))?'style="display:block !important;"':"" ?>>
    <?php include_partial( 'filtro', array( "form_filter" => $form_filter ) ) ?>
  </div>
</div>

<div id="mensaje-notifiacion"></div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="5"><span class='icon-list-alt'></span> Lista</th>
    </tr>    
    <tr class="btn-inverse">
      <th>Id</th>
      <th>Empresa</th>
      <th>Usuario</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_emp_users_rs as $adm_ma_emp_users_r): ?>
    <tr>
            <td><?php echo $adm_ma_emp_users_r->getId() ?></td>
      <td><?php echo $adm_ma_emp_users_r->AdmMaEmp->getNombre() ?></td>
            
      <td><?php echo $adm_ma_emp_users_r->AdmMaUsers->getUsername() ?></td>
            <td class="acciones">
                <a class="btn" href="<?php echo url_for('adm_ma_emp_users_r/show?id='.$adm_ma_emp_users_r->getId()) ?>" title="Ver"><span class='icon-eye-open'></span></a>
                
        <a class="btn" href="<?php echo url_for('adm_ma_emp_users_r/edit?id='.$adm_ma_emp_users_r->getId()) ?>" title="Modificar"><span class='icon-pencil'></span></a>
        <?php echo link_to('<span class="icon-trash"></span>', 'adm_ma_emp_users_r/delete?id='.$adm_ma_emp_users_r->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn', "title"=>"Eliminar")) ?>
      </td>
            
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($adm_ma_emp_users_rs->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('adm_ma_emp_users_r/navegacion') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_emp_users_rs->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_emp_users_rs->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('adm_ma_emp_users_r/navegacion') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('adm_ma_emp_users_r/navegacion') ?>?page=<?php echo $adm_ma_emp_users_rs->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>