<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('items/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn" href="<?php echo url_for('items/index') ?>"><span class="icon-chevron-left"></span> Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('<span class="icon-remove"></span> Eliminar', 'items/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Realmente desea eliminar éste registro?' , 'class' => 'btn')) ?>
          <?php endif; ?>
          <input class="btn btn-primary" type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tipo']->renderError() ?>
          <?php echo $form['id_tipo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['precio']->renderLabel() ?></th>
        <td>
          <?php echo $form['precio']->renderError() ?>
          <?php echo $form['precio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_impuesto']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_impuesto']->renderError() ?>
          <?php echo $form['id_impuesto'] ?>
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
