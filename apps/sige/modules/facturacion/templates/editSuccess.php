<div class="vista-factura">
<?php include_partial( 'form', array('form' => $form, "accion_formulario" => "Editar Documento", "factura" => $factura )) ?>
</div>

<?php include_partial('templates') ?>
<?php include_partial('funcionalidad', array("factura"=> $factura, "form"=>$form)) ?>


