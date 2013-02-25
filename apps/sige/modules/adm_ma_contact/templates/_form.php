<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('adm_ma_contact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
        <th class="linea-left"><?php echo $form['tipo_contacto']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_contacto'] ?>
          <?php echo $form['tipo_contacto']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['id_tipo_identificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tipo_identificacion'] ?>
          <?php echo $form['id_tipo_identificacion']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['numero_identificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_identificacion'] ?>
          <?php echo $form['numero_identificacion']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion'] ?>
          <?php echo $form['direccion']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['telefonos']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefonos'] ?>
          <?php echo $form['telefonos']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email'] ?>
          <?php echo $form['email']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['exonerado']->renderLabel() ?></th>
        <td>
          <?php echo $form['exonerado'] ?>
          <?php echo $form['exonerado']->renderError() ?>
        </td>
      </tr>
      <tr> 
        <th class="linea-left"><?php echo $form['jubilado']->renderLabel() ?></th>
        <td>
          <?php echo $form['jubilado'] ?>
          <?php echo $form['jubilado']->renderError() ?>
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
