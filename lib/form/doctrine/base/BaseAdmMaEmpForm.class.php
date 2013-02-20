<?php

/**
 * AdmMaEmp form base class.
 *
 * @method AdmMaEmp getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaEmpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'nombre'                 => new sfWidgetFormInputText(),
      'id_tipo_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'add_empty' => true)),
      'numero_identificacion'  => new sfWidgetFormInputText(),
      'id_principal'           => new sfWidgetFormInputText(),
      'timestamp'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'nombre'                 => new sfValidatorString(array('max_length' => 255)),  
      'id_tipo_identificacion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'required' => false)),  
      'numero_identificacion'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),  
      'id_principal'           => new sfValidatorInteger(array('required' => false)),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_emp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaEmp';
  }

}
