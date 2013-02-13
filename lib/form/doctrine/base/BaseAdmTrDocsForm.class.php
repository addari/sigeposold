<?php

/**
 * AdmTrDocs form base class.
 *
 * @method AdmTrDocs getObject() Returns the current form's model object
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdmTrDocsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_empresa'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'), 'add_empty' => false)),
      'id_tipo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'), 'add_empty' => false)),
      'numero_documento'  => new sfWidgetFormInputText(),
      'id_contacto'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => false)),
      'fecha_emision'     => new sfWidgetFormDate(),
      'fecha_vencimiento' => new sfWidgetFormDate(),
      'monto_exento'      => new sfWidgetFormInputText(),
      'monto_gravado'     => new sfWidgetFormInputText(),
      'monto_impuesto'    => new sfWidgetFormInputText(),
      'monto_descuento'   => new sfWidgetFormInputText(),
      'comentarios'       => new sfWidgetFormTextarea(),
      'timestamp'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_empresa'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'))),
      'id_tipo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'))),
      'numero_documento'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'id_contacto'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'))),
      'fecha_emision'     => new sfValidatorDate(),
      'fecha_vencimiento' => new sfValidatorDate(),
      'monto_exento'      => new sfValidatorNumber(array('required' => false)),
      'monto_gravado'     => new sfValidatorNumber(array('required' => false)),
      'monto_impuesto'    => new sfValidatorNumber(array('required' => false)),
      'monto_descuento'   => new sfValidatorNumber(array('required' => false)),
      'comentarios'       => new sfValidatorString(array('required' => false)),
      'timestamp'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adm_tr_docs[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdmTrDocs';
  }

}
