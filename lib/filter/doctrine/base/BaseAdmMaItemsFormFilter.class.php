<?php

/**
 * AdmMaItems filter form base class.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdmMaItemsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItemsT'), 'add_empty' => true)),
      'nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'costo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_impuesto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaTax'), 'add_empty' => true)),
      'timestamp'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_tipo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaItemsT'), 'column' => 'id')),
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'costo'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_impuesto' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaTax'), 'column' => 'id')),
      'timestamp'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_items_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaItems';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_tipo'     => 'ForeignKey',
      'nombre'      => 'Text',
      'costo'       => 'Number',
      'precio'      => 'Number',
      'id_impuesto' => 'ForeignKey',
      'timestamp'   => 'Date',
    );
  }
}
