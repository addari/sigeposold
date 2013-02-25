<?php

/**
 * AdmMaContact form.
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaContactForm extends BaseAdmMaContactForm
{
  public function configure()
  {

    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'nombre'                 => new sfWidgetFormInputText(),
      'tipo_contacto'          => new sfWidgetFormInputCheckbox(),
      'id_tipo_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'add_empty' => true)),
      'numero_identificacion'  => new sfWidgetFormInputText(),
      'direccion'              => new sfWidgetFormTextarea(),
      'telefonos'              => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'exonerado'              => new sfWidgetFormInputCheckbox(),
      'jubilado'               => new sfWidgetFormInputCheckbox(),
      'timestamp'              => new sfWidgetFormDateTime(),
    ));


    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'nombre'                 => new sfValidatorString(array('max_length' => 255)),  
      'tipo_contacto'          => new sfValidatorBoolean(array('required' => false)),  
      'id_tipo_identificacion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'required' => false)),  
      'numero_identificacion'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),  
      'direccion'              => new sfValidatorString(array('required' => false)),  
      'telefonos'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),  
      'email'                  => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),  
      'exonerado'              => new sfValidatorBoolean(array('required' => false)),  
      'jubilado'               => new sfValidatorBoolean(array('required' => false)),  
      'timestamp' => new sfValidatorDateTime(array('required' => false)),
    ));
  
    $this->widgetSchema->setLabels(array(
      'id_tipo_identificacion' => "Tipo de Identificación",
      'direccion' => "Dirección",
      'email' => "E-mail"
    ));

    $this->widgetSchema->setNameFormat('adm_ma_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);


    $this->setupInheritance();

    $this->setDefault("tipo_contacto",NULL);
    $this->setDefault("jubilado",     NULL);
    $this->setDefault("exonerado",    NULL);
  }
}
