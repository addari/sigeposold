<?php

/**
 * AdmTrDocsFiscalR filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsFiscalRFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_documento'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'), 'add_empty' => true)),
      'serial_equipo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reimpresion'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_comprobante' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_documento'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmTrDocs'), 'column' => 'id')),
      'serial_equipo'      => new sfValidatorPass(array('required' => false)),
      'reimpresion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_comprobante' => new sfValidatorPass(array('required' => false)),
      'timestamp'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_fiscal_r_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsFiscalR';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'id_documento'       => 'ForeignKey',
      'serial_equipo'      => 'Text',
      'reimpresion'        => 'Number',
      'numero_comprobante' => 'Text',
      'timestamp'          => 'Date',
    );
  }
}
