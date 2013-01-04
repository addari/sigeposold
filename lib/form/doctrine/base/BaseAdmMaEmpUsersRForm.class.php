<?php

/**
 * AdmMaEmpUsersR form base class.
 *
 * @method AdmMaEmpUsersR getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaEmpUsersRForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'id_empresa' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'), 'add_empty' => false)),
      'id_usuario' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaUsers'), 'add_empty' => false)),
      'timestamp'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_empresa' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'))),
      'id_usuario' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaUsers'))),
      'timestamp'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_emp_users_r[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaEmpUsersR';
  }

}
