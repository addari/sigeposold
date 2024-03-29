<?php

/**
 * AdmMaContact filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_contacto'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'add_empty' => true)),
      'numero_identificacion'  => new sfWidgetFormFilterInput(),
      'direccion'              => new sfWidgetFormFilterInput(),
      'telefonos'              => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'exonerado'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'jubilado'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'tipo_contacto'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_tipo_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaIdentT'), 'column' => 'id')),
      'numero_identificacion'  => new sfValidatorPass(array('required' => false)),
      'direccion'              => new sfValidatorPass(array('required' => false)),
      'telefonos'              => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'exonerado'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'jubilado'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaContact';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'nombre'                 => 'Text',
      'tipo_contacto'          => 'Number',
      'id_tipo_identificacion' => 'ForeignKey',
      'numero_identificacion'  => 'Text',
      'direccion'              => 'Text',
      'telefonos'              => 'Text',
      'email'                  => 'Text',
      'exonerado'              => 'Number',
      'jubilado'               => 'Number',
      'timestamp'              => 'Date',
    );
  }
}
