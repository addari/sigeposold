<?php

/**
 * AdmMaUsers form base class.
 *
 * @method AdmMaUsers getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'username'    => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'id_contacto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => false)),
      'activo'      => new sfWidgetFormInputText(),
      'timestamp'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'username'    => new sfValidatorString(array('max_length' => 255)),  
      'password'    => new sfValidatorString(array('max_length' => 255)),  
      'id_contacto' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'))),  
      'activo'      => new sfValidatorInteger(array('required' => false)),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaUsers';
  }

}
