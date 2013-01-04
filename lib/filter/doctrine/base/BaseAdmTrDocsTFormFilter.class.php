<?php

/**
 * AdmTrDocsT filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsTFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modulo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'origen'             => new sfWidgetFormFilterInput(),
      'tipo_fiscal'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'afecta_cuentas'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'signo_cuentas'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contiene_renglones' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'afecta_inventario'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reserva_inventario' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'signo_inventario'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_cuenta'          => new sfWidgetFormFilterInput(),
      'timestamp'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'modulo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'origen'             => new sfValidatorPass(array('required' => false)),
      'tipo_fiscal'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afecta_cuentas'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'signo_cuentas'      => new sfValidatorPass(array('required' => false)),
      'contiene_renglones' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afecta_inventario'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reserva_inventario' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'signo_inventario'   => new sfValidatorPass(array('required' => false)),
      'id_cuenta'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_t_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsT';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre'             => 'Text',
      'modulo'             => 'Number',
      'origen'             => 'Text',
      'tipo_fiscal'        => 'Number',
      'afecta_cuentas'     => 'Number',
      'signo_cuentas'      => 'Text',
      'contiene_renglones' => 'Number',
      'afecta_inventario'  => 'Number',
      'reserva_inventario' => 'Number',
      'signo_inventario'   => 'Text',
      'id_cuenta'          => 'Number',
      'timestamp'          => 'Date',
    );
  }
}
