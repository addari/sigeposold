<?php

/**
 * AdmMaContactR filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaContactRFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_contacto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => true)),
      'id_tipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContactT'), 'add_empty' => true)),
      'timestamp'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_contacto' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaContact'), 'column' => 'id')),
      'id_tipo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaContactT'), 'column' => 'id')),
      'timestamp'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact_r_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaContactR';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_contacto' => 'ForeignKey',
      'id_tipo'     => 'ForeignKey',
      'timestamp'   => 'Date',
    );
  }
}
