<?php

/**
 * AdmMaTax form base class.
 *
 * @method AdmMaTax getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaTaxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'alias'      => new sfWidgetFormInputText(),
      'porcentaje' => new sfWidgetFormInputText(),
      'timestamp'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 128)),
      'alias'      => new sfValidatorString(array('max_length' => 64)),
      'porcentaje' => new sfValidatorNumber(array('required' => false)),
      'timestamp'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_tax[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaTax';
  }

}
