<?php

/**
 * AdmMaContactR filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaContactRFormFilter extends BaseAdmMaContactRFormFilter
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
      'id_contacto' => "Contacto",
      'id_tipo' => "Tipo"
    ));  	
  }
}
