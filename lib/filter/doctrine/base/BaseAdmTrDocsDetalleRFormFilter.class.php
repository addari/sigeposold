<?php

/**
 * AdmTrDocsDetalleR filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsDetalleRFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_documento'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'), 'add_empty' => true)),
      'id_items'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItems'), 'add_empty' => true)),
      'descripcion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'costo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto_impuesto'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_impuesto' => new sfWidgetFormFilterInput(),
      'timestamp'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_documento'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmTrDocs'), 'column' => 'id')),
      'id_items'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaItems'), 'column' => 'id')),
      'descripcion'     => new sfValidatorPass(array('required' => false)),
      'cantidad'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'costo'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_impuesto'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nombre_impuesto' => new sfValidatorPass(array('required' => false)),
      'timestamp'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_detalle_r_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsDetalleR';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_documento'    => 'ForeignKey',
      'id_items'        => 'ForeignKey',
      'descripcion'     => 'Text',
      'cantidad'        => 'Number',
      'costo'           => 'Number',
      'precio'          => 'Number',
      'monto_impuesto'  => 'Number',
      'nombre_impuesto' => 'Text',
      'timestamp'       => 'Date',
    );
  }
}
