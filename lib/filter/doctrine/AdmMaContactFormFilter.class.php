<?php

/**
 * AdmMaContact filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaContactFormFilter extends BaseAdmMaContactFormFilter
{
  public function configure()
  {

    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modulo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp' => new sfWidgetFormFilterInputHidden(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'modulo'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();



  }
}
