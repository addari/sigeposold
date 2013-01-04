<fieldset>
<legend><h3>Nuevo <?php echo sfInflector::humanize($this->getSingularName()) ?></h3></legend>
[?php include_partial('form', array('form' => $form)) ?]
</fieldset>