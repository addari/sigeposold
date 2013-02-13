<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tipo_identificacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table class="table table-bordered formulario-documento sin-lineas-border">
    <thead>
      <tr>
        <th class="btn-info" colspan="2"><span class='icon-list-alt'></span> <?= $accion_formulario ?></th>
      </tr>    
    </thead>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th class="linea-left"><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?php echo $form->renderHiddenFields(false) ?>

  <a class="btn" href="<?php echo url_for('tipo_identificacion/index') ?>"><span class='icon-th-list'></span>  Listar</a>  
  <?php if (!$form->getObject()->isNew()): ?>
    <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
  <?php else: ?>
    <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> Crear</button>
  <?php endif; ?>
  <button class="btn" type="reset" name="yt1"><i class="icon-remove"></i> Limpiar</button>
</form>
