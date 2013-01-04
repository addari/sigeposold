<?php

/**
 * AdmMaUsers filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaUsersFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_contacto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => true)),
      'activo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'    => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'id_contacto' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaContact'), 'column' => 'id')),
      'activo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_users_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaUsers';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'username'    => 'Text',
      'password'    => 'Text',
      'id_contacto' => 'ForeignKey',
      'activo'      => 'Number',
      'timestamp'   => 'Date',
    );
  }
}
