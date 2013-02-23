<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('clientes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn" href="<?php echo url_for('clientes/index') ?>"><span class="icon-chevron-left"></span> Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('<span class="icon-remove"></span> Eliminar', 'clientes/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn')) ?>
          <?php endif; ?>
          <input class="btn btn-primary" type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo_contacto']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_contacto']->renderError() ?>
          <?php echo $form['tipo_contacto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_tipo_identificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tipo_identificacion']->renderError() ?>
          <?php echo $form['id_tipo_identificacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_identificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_identificacion']->renderError() ?>
          <?php echo $form['numero_identificacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']->renderError() ?>
          <?php echo $form['direccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefonos']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefonos']->renderError() ?>
          <?php echo $form['telefonos'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['exonerado']->renderLabel() ?></th>
        <td>
          <?php echo $form['exonerado']->renderError() ?>
          <?php echo $form['exonerado'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jubilado']->renderLabel() ?></th>
        <td>
          <?php echo $form['jubilado']->renderError() ?>
          <?php echo $form['jubilado'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['timestamp']->renderLabel() ?></th>
        <td>
          <?php echo $form['timestamp']->renderError() ?>
          <?php echo $form['timestamp'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
