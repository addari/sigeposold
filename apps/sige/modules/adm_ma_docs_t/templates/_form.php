<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('adm_ma_docs_t/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-bordered formulario-documento sin-lineas-border">
    <thead>
      <tr>
        <th class="btn-info" colspan="2"><span class='icon-list-alt'></span> <?php echo $accion_formulario ?></th>
      </tr>    
    </thead>    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th class="linea-left"><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre'] ?>
          <?php echo $form['nombre']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['modulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['modulo'] ?>
          <?php echo $form['modulo']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['origen']->renderLabel() ?></th>
        <td>
          <?php echo $form['origen'] ?>
          <?php echo $form['origen']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['tipo_fiscal']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_fiscal'] ?>
          <?php echo $form['tipo_fiscal']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['afecta_cuentas']->renderLabel() ?></th>
        <td>
          <?php echo $form['afecta_cuentas'] ?>
          <?php echo $form['afecta_cuentas']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['signo_cuentas']->renderLabel() ?></th>
        <td>
          <?php echo $form['signo_cuentas'] ?>
          <?php echo $form['signo_cuentas']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['contiene_renglones']->renderLabel() ?></th>
        <td>
          <?php echo $form['contiene_renglones'] ?>
          <?php echo $form['contiene_renglones']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['afecta_inventario']->renderLabel() ?></th>
        <td>
          <?php echo $form['afecta_inventario'] ?>
          <?php echo $form['afecta_inventario']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['reserva_inventario']->renderLabel() ?></th>
        <td>
          <?php echo $form['reserva_inventario'] ?>
          <?php echo $form['reserva_inventario']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['signo_inventario']->renderLabel() ?></th>
        <td>
          <?php echo $form['signo_inventario'] ?>
          <?php echo $form['signo_inventario']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['id_cuenta']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_cuenta'] ?>
          <?php echo $form['id_cuenta']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['activo'] ?>
          <?php echo $form['activo']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th class="linea-left"><?php echo $form['timestamp']->renderLabel() ?></th>
        <td>
          <?php echo $form['timestamp'] ?>
          <?php echo $form['timestamp']->renderError() ?>
        </td>
      </tr>
    </tbody>
  </table>
            <?php echo $form->renderHiddenFields(false) ?>
    <div class="form-actions">
    <?php if (!$form->getObject()->isNew()): ?>
      <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
    <?php else: ?>
      <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Crear</button>
    <?php endif; ?>
    <button class="btn" type="reset"><i class="icon-remove"></i> Limpiar</button>
  </div>
</form>
