<script type="text/javascript">
agregarContacto = function ( contacto ) {
  window.opener.agregarContacto( contacto );
  window.close();
}
</script>
<form action="<?php echo url_for('clientes/filtrarContactoFactura') ?>" method="post">
<?php echo $form_filter->renderHiddenFields(); ?>
<table class="table table-bordered sin-lineas-border">
    <thead>
    <tr>
      <th colspan="2" class="btn-info">
        <span class='icon-search'></span> <strong> Buscar Cliente</strong>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th class="linea-left">
        <?php echo $form_filter['nombre']->renderLabel() ?>
      </th>
      <td>
        <?php echo $form_filter['nombre'] ?> 
        <button class="btn" type="submit"><span class="icon-search"></span> Buscar</button> 
        <button class="btn" onclick="window.location.href='<?= url_for("clientes/buscarContactoFactura")?>';" type="reset">Limpiar</button>
        <button class="btn" onclick="window.close()">Cerrar</button>
      </td>
    </tr>
    </tbody>
</table>
</form>

<div class="mensaje"></div>

<table class="table table-striped table-bordered">
  <thead>
    <tr class="btn-inverse">
      <th></th>
      <th>Id</th>
      <th>Nombre</th>
      <th>Numero identificacion</th>
      <th>Direccion</th>
      <th>Telefonos</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adm_ma_contacts as $adm_ma_contact): ?>
    <?php
    $contacto = array(
      "id_contacto"   => $adm_ma_contact->getId(),
      "nombre"        => $adm_ma_contact->getNombre(),
      "exonerado"     => $adm_ma_contact->getExonerado()
      );
    ?>
    <tr>
      <td><a href="#" class="btn" onclick='javascript: agregarContacto(<?= json_encode( $contacto ) ?>);'><span class='icon-hand-up'></span></a></td>
      <td><?php echo $adm_ma_contact->getId() ?></td>
      <td><?php echo $adm_ma_contact->getNombre() ?></td>
      <td><?php echo $adm_ma_contact->getNumeroIdentificacion() ?></td>
      <td><?php echo $adm_ma_contact->getDireccion() ?></td>
      <td><?php echo $adm_ma_contact->getTelefonos() ?></td>
      <td><?php echo $adm_ma_contact->getEmail() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="clear:both;"></div>
<!-- Inicio de paginación -->

<?php if ($adm_ma_contacts->haveToPaginate()): ?>
  <div class="pagination pagination-centered">
    <ul>
      <li><a href="<?php echo url_for('clientes/navegacionContactoFactura') ?>?page=1">«</a></li>
      <?php foreach ($adm_ma_contacts->getLinks() as $page): ?>
        <?php if ($page == $adm_ma_contacts->getPage()): ?>
          <li class="disabled"><a href="#"><b><?php echo $page ?></b></a></li>
        <?php else: ?>
          <li><a href="<?php echo url_for('clientes/navegacionContactoFactura') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="<?php echo url_for('clientes/navegacionContactoFactura') ?>?page=<?php echo $adm_ma_contacts->getLastPage() ?>">»</a></li>
   </ul>
  </div>
<?php endif; ?>
