[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<?php $form = $this->getFormObject() ?>
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
[?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>') ?]
<?php else: ?>
<form action="[?php echo url_for('<?php echo $this->getModuleName() ?>/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?<?php echo $this->getPrimaryKeyUrlParams('$form->getObject()', true) ?> : '')) ?]" method="post" [?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?]>
[?php if (!$form->getObject()->isNew()): ?]
<input type="hidden" name="sf_method" value="put" />
[?php endif; ?]
<?php endif;?>
  <table class="table table-bordered formulario-documento sin-lineas-border">
    <thead>
      <tr>
        <th class="btn-info" colspan="2"><span class='icon-list-alt'></span> [?= $accion_formulario ?]</th>
      </tr>    
    </thead>    
    <tbody>
<?php if (isset($this->params['non_verbose_templates']) && $this->params['non_verbose_templates']): ?>
      [?php echo $form ?]
<?php else: ?>
      [?php echo $form->renderGlobalErrors() ?]
<?php foreach ($form as $name => $field): if (($field->isHidden()) || ($name == "timestamp"))  continue ?>
      <tr> 
        <th class="linea-left">[?php echo $form['<?php echo $name ?>']->renderLabel() ?]</th>
        <td>
          [?php echo $form['<?php echo $name ?>'] ?]
          [?php echo $form['<?php echo $name ?>']->renderError() ?]
        </td>
      </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>
  <?php if (!isset($this->params['non_verbose_templates']) || !$this->params['non_verbose_templates']): ?>
          [?php echo $form->renderHiddenFields(false) ?]
  <?php endif; ?>
  <div class="form-actions">
    [?php if (!$form->getObject()->isNew()): ?]
      <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
    [?php else: ?]
      <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Crear</button>
    [?php endif; ?]
    <button class="btn" type="reset"><i class="icon-remove"></i> Limpiar</button>
  </div>
</form>
