<table class="lista-show table table-striped table-bordered">
  <thead>
    <tr>
      <th class="btn-info" colspan="2"><span class='icon-eye-open'></span> Vista Previa de Tipo de contacto</th>
    </tr>
  </thead>  
  <tbody>
    <tr>
      <th class="columna-show">Id:</th>
      <td><?php echo $adm_ma_ident_t->getId() ?></td>
    </tr>
    <tr>
      <th class="columna-show">Nombre:</th>
      <td><?php echo $adm_ma_ident_t->getNombre() ?></td>
    </tr>
  </tbody>
</table>

<a class="btn" href="<?php echo url_for('tipo_identificacion/index') ?>"><span class='icon-th-list'></span>  Listar</a> <a class="btn" href="<?php echo url_for('tipo_identificacion/edit?id='.$adm_ma_ident_t->getId()) ?>"><span class='icon-edit'></span> Modificar</a>



