<?php if($sf_user->hasFlash("mensaje-error")): ?>
	<script>
		$(function(){
			$("#mensaje-notificacion").html( App.Helpers.Mensaje({tipo: "error", mensaje: "<?= $sf_user->getFlash('mensaje-error') ?>"}) );
		})
	</script>
<?php endif; ?>

<?php if($sf_user->hasFlash("mensaje-success")): ?>
	<script>
		$(function(){
			$("#mensaje-notificacion").html( App.Helpers.Mensaje({tipo: "success_true", mensaje: "<?= $sf_user->getFlash('mensaje-success') ?>"}) );
		})
	</script>
<?php endif; ?>

<div id="mensaje-notificacion"></div>