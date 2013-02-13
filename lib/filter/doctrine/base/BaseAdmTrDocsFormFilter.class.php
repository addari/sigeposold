<?php

/**
 * AdmTrDocs filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_empresa'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'), 'add_empty' => true)),
      'id_tipo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'), 'add_empty' => true)),
      'numero_documento'  => new sfWidgetFormFilterInput(),
      'id_contacto'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => true)),
      'fecha_emision'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_vencimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'monto_exento'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto_gravado'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto_impuesto'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto_descuento'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentarios'       => new sfWidgetFormFilterInput(),
      'timestamp'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_empresa'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaEmp'), 'column' => 'id')),
      'id_tipo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaDocsT'), 'column' => 'id')),
      'numero_documento'  => new sfValidatorPass(array('required' => false)),
      'id_contacto'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaContact'), 'column' => 'id')),
      'fecha_emision'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_vencimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'monto_exento'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_gravado'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_impuesto'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_descuento'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'comentarios'       => new sfValidatorPass(array('required' => false)),
      'timestamp'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocs';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_empresa'        => 'ForeignKey',
      'id_tipo'           => 'ForeignKey',
      'numero_documento'  => 'Text',
      'id_contacto'       => 'ForeignKey',
      'fecha_emision'     => 'Date',
      'fecha_vencimiento' => 'Date',
      'monto_exento'      => 'Number',
      'monto_gravado'     => 'Number',
      'monto_impuesto'    => 'Number',
      'monto_descuento'   => 'Number',
      'comentarios'       => 'Text',
      'timestamp'         => 'Date',
    );
  }
}
