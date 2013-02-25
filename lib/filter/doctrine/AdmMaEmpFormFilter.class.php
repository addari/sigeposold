<?php

/**
 * AdmMaEmp filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaEmpFormFilter extends BaseAdmMaEmpFormFilter
{
  public function configure()
  {
    $this->setWidgets(array(
      'nombre'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'add_empty' => true)),
      'numero_identificacion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_principal'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'id_tipo_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaIdentT'), 'column' => 'id')),
      'numero_identificacion'  => new sfValidatorPass(array('required' => false)),
      'id_principal'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_emp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

  	$this->widgetSchema->setLabels(array(
      'id_tipo_identificacion' => "Tipo de Identificación"
    ));
  }
}
