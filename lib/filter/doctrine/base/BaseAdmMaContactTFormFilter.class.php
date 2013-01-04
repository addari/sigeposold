<?php

/**
 * AdmMaContactT filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaContactTFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modulo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'modulo'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact_t_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaContactT';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'modulo'    => 'Number',
      'timestamp' => 'Date',
    );
  }
}
