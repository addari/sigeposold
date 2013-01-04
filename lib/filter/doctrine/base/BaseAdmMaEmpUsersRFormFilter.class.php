<?php

/**
 * AdmMaEmpUsersR filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaEmpUsersRFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_empresa' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'), 'add_empty' => true)),
      'id_usuario' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaUsers'), 'add_empty' => true)),
      'timestamp'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_empresa' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaEmp'), 'column' => 'id')),
      'id_usuario' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaUsers'), 'column' => 'id')),
      'timestamp'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_emp_users_r_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaEmpUsersR';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'id_empresa' => 'ForeignKey',
      'id_usuario' => 'ForeignKey',
      'timestamp'  => 'Date',
    );
  }
}
