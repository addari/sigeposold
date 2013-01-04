<?php

/**
 * AdmMaContactT form base class.
 *
 * @method AdmMaContactT getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaContactTForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'modulo'    => new sfWidgetFormInputText(),
      'timestamp' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 255)),
      'modulo'    => new sfValidatorInteger(),
      'timestamp' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact_t[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaContactT';
  }

}
