<?php

/**
 * AdmMaContactR form.
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaContactRForm extends BaseAdmMaContactRForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
      'id_contacto' => "Contacto",
      'id_tipo' => "Tipo"
    ));    	
  }
}
