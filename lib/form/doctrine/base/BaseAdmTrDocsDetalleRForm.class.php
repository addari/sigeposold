<?php

/**
 * AdmTrDocsDetalleR form base class.
 *
 * @method AdmTrDocsDetalleR getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsDetalleRForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_documento'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'), 'add_empty' => false)),
      'id_items'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItems'), 'add_empty' => false)),
      'descripcion'    => new sfWidgetFormTextarea(),
      'cantidad'       => new sfWidgetFormInputText(),
      'costo'          => new sfWidgetFormInputText(),
      'precio'         => new sfWidgetFormInputText(),
      'monto_impuesto' => new sfWidgetFormInputText(),
      'alias_impuesto' => new sfWidgetFormInputText(),
      'timestamp'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'id_documento'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'))),  
      'id_items'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaItems'))),  
      'descripcion'    => new sfValidatorString(array('max_length' => 256)),  
      'cantidad'       => new sfValidatorNumber(array('required' => false)),  
      'costo'          => new sfValidatorNumber(array('required' => false)),  
      'precio'         => new sfValidatorNumber(array('required' => false)),  
      'monto_impuesto' => new sfValidatorNumber(array('required' => false)),  
      'alias_impuesto' => new sfValidatorString(array('max_length' => 128, 'required' => false)),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_detalle_r[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsDetalleR';
  }

}
