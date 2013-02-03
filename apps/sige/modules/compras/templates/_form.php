<form class="form-factura" action="<?php echo url_for('facturacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php echo $form->renderHiddenFields(false) ?>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

  <table class="table table-bordered formulario-documento sin-lineas-border">
    <thead>
      <tr>
        <th class="btn-info" colspan="4"><span class='icon-list-alt'></span> <?= $accion_formulario ?></th>
      </tr>    
    </thead>
    <tbody>
      <tr>
        <th class="linea-left"><?php echo $form['id_tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tipo'] ?>          
          <?php echo $form['id_tipo']->renderError() ?>
        </td>
        <th>
          <?php echo $form['fecha_emision']->renderLabel() ?>
        </th>
        <td>
          <input name="factura[fecha_emision]" data-date-format="dd/mm/yyyy" id="factura_fecha_emision" class="span2" size="16" type="text" value="<?= $form->getObject()->getDateTimeObject('fecha_emision')->format("d/m/Y") ?>" >
          <?php echo $form['fecha_emision']->renderError() ?>
        </td>        
      </tr>

      <tr>
        <th class="linea-left"><?php echo $form['numero_documento']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_documento'] ?>
          <?php echo $form['numero_documento']->renderError() ?>
        </td>
        <th>
          <?php echo $form['fecha_vencimiento']->renderLabel() ?>
        </th>
        <td>
          <input name="factura[fecha_vencimiento]" data-date-format="dd/mm/yyyy" id="factura_fecha_vencimiento" class="span2" size="16" type="text" value="<?= $form->getObject()->getDateTimeObject('fecha_vencimiento')->format("d/m/Y") ?>" >
          <?php echo $form['fecha_vencimiento']->renderError() ?>
        </td>        
      </tr>      

      <tr>
        <th class="linea-left"><?php echo $form['id_contacto']->renderLabel() ?></th>
        <td colspan="3">
          <a href="#" class="btn btn-buscar buscar-cliente" onclick="javascript: buscarCliente();"><i class="<?= (!$form->getObject()->isNew())?'icon-trash':'icon-search' ?>"></i></a> <?php echo $form['contacto'] ?>
          <?php echo $form['id_contacto']->renderError() ?>
        </td>
      </tr>   
    </tbody>      
  </table>

  <div class="mensaje"></div>
    
  <div id="contenedor-items"></div>

  <table class="table table-bordered formulario-documento">
      <thead>
      <tr>
        <th class="btn-info">
          <span class='icon-list-alt'></span> <strong> Comentarios</strong>
        </th> 
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          <?php echo $form['comentarios'] ?>
          <?php echo $form['comentarios']->renderError() ?>
        </td>    
      </tr>
      </tbody>
  </table>
  <a class="btn" href="<?php echo url_for('facturacion/index') ?>"><span class='icon-th-list'></span>  Listar</a>
  <?php if (!$form->getObject()->isNew()): ?>
  <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
  <?php else: ?>
  <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> Crear</button>
  <?php endif; ?>
  <button class="btn" type="reset" name="yt1"><i class="icon-remove"></i> Limpiar</button>
</form>
