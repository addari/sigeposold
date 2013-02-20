<?php

/**
 * AdmMaItems form base class.
 *
 * @method AdmMaItems getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmMaItemsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_tipo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItemsT'), 'add_empty' => false)),
      'nombre'      => new sfWidgetFormInputText(),
      'costo'       => new sfWidgetFormInputText(),
      'precio'      => new sfWidgetFormInputText(),
      'id_impuesto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaTax'), 'add_empty' => false)),
      'timestamp'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'id_tipo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItemsT'))),  
      'nombre'      => new sfValidatorString(array('max_length' => 255)),  
      'costo'       => new sfValidatorNumber(array('required' => false)),  
      'precio'      => new sfValidatorNumber(array('required' => false)),  
      'id_impuesto' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaTax'))),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_ma_items[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmMaItems';
  }

}
