<?php

/**
 * AdmMaIdentT filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaIdentTFormFilter extends BaseAdmMaIdentTFormFilter
{
  public function configure()
  {
  	$this->setWidgets(array(
  	  'id'        => new sfWidgetFormFilterInput(array("template"=>"%input%")),
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false))
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPass(array('required' => false)),
      'nombre'    => new sfValidatorPass(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
  }
}
