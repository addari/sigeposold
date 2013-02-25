<?php

/**
 * AdmMaUsers form.
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaUsersForm extends BaseAdmMaUsersForm
{
  public function configure()
  {
    echo $this->getDefault("password");

    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'username'           => new sfWidgetFormInputText(),
      'password'           => new sfWidgetFormInputPassword(array(),array("value"=>$this->getObject()->getPassword())),
      'confirmar_password' => new sfWidgetFormInputPassword(array(),array("value"=>$this->getObject()->getPassword())),      
      'id_contacto'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => false)),
      'activo'             => new sfWidgetFormInputCheckbox(array(),array("value"=>1))
    ));

    $this->widgetSchema->setLabels(array(
      "password"          =>"Contraseña",
      "id_contacto"       => "Contacto",
      "confirmar_password"=>"Confirmar Contraseña"
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),  
      'username'                => new sfValidatorString(array('max_length' => 255)),  
      'password'                => new sfValidatorString(
                                             array('max_length' => 80),
                                             array('required' => false)
                                             ),
      'confirmar_password'       => new sfValidatorString(
                                             array('max_length' => 80),
                                             array('required' => false)
                                             ),      
      'id_contacto'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'))),  
      'activo'                  => new sfValidatorBoolean(array('required' => false))
    ));

    $this->mergePostValidator(new sfValidatorSchemaCompare( 
          'password', sfValidatorSchemaCompare::EQUAL,'confirmar_password', 
    array(), array( 
               'invalid' => 'Las dos contraseñas deben ser iguales.' 
           ) 
        ));

    $this->widgetSchema->setNameFormat('adm_ma_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
  }
}