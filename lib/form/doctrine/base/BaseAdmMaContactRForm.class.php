<?php

/**
 * AdmMaContactR form base class.
 *
 * @method AdmMaContactR getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaContactRForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_contacto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => false)),
      'id_tipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContactT'), 'add_empty' => false)),
      'timestamp'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'id_contacto' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'))),  
      'id_tipo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContactT'))),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact_r[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaContactR';
  }

}
