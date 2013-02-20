<?php

/**
 * AdmTrDocsT form base class.
 *
 * @method AdmTrDocsT getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsTForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInputText(),
      'modulo'             => new sfWidgetFormInputText(),
      'origen'             => new sfWidgetFormInputText(),
      'tipo_fiscal'        => new sfWidgetFormInputText(),
      'afecta_cuentas'     => new sfWidgetFormInputText(),
      'signo_cuentas'      => new sfWidgetFormInputText(),
      'contiene_renglones' => new sfWidgetFormInputText(),
      'afecta_inventario'  => new sfWidgetFormInputText(),
      'reserva_inventario' => new sfWidgetFormInputText(),
      'signo_inventario'   => new sfWidgetFormInputText(),
      'id_cuenta'          => new sfWidgetFormInputText(),
      'timestamp'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'nombre'             => new sfValidatorString(array('max_length' => 100)),  
      'modulo'             => new sfValidatorInteger(),  
      'origen'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),  
      'tipo_fiscal'        => new sfValidatorInteger(array('required' => false)),  
      'afecta_cuentas'     => new sfValidatorInteger(array('required' => false)),  
      'signo_cuentas'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),  
      'contiene_renglones' => new sfValidatorInteger(array('required' => false)),  
      'afecta_inventario'  => new sfValidatorInteger(array('required' => false)),  
      'reserva_inventario' => new sfValidatorInteger(array('required' => false)),  
      'signo_inventario'   => new sfValidatorString(array('max_length' => 1, 'required' => false)),  
      'id_cuenta'          => new sfValidatorInteger(array('required' => false)),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs_t[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocsT';
  }

}
