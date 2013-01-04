<?php

/**
 * AdmTrDocsFiscalR form base class.
 *
 * @method AdmTrDocsFiscalR getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsFiscalRForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'id_documento'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'), 'add_empty' => false)),
      'serial_equipo'      => new sfWidgetFormInputText(),
      'reimpresion'        => new sfWidgetFormInputText(),
      'numero_comprobante' => new sfWidgetFormInputText(),
      'timestamp'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_documento'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmTrDocs'))),
      'serial_equipo'      => new sfValidatorString(array('max_length' => 128)),
      'reimpresion'        => new sfValidatorInteger(array('required' => false)),
      'numero_comprobante' => new sfValidatorString(array('max_length' => 128)),
      'timestamp'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_fiscal_r[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsFiscalR';
  }

}
