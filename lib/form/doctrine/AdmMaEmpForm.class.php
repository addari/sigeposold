<?php

/**
 * AdmMaEmp form.
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaEmpForm extends BaseAdmMaEmpForm
{
  public function configure()
  {
  	$this->widgetSchema->setLabels(array(
  	  'numero_identificacion'  => "Numero de Identificación",
      'id_tipo_identificacion' => "Tipo de Identificación"
    ));
  }
}
