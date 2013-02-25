<?php

/**
 * AdmMaUsers filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaUsersFormFilter extends BaseAdmMaUsersFormFilter
{
  public function configure()
  {
    $choices_combo = array(""=>"Todos","1"=>"Si","0"=>"No");
    $this->setWidgets(array(
      'username'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_contacto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'), 'add_empty' => true)),
      'activo'       => new sfWidgetFormChoice(array('choices'  => $choices_combo))
    ));

    $this->setValidators(array(
      'username'    => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'id_contacto' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaContact'), 'column' => 'id')),
      'activo'      => new sfValidatorChoice(array(
          'required' => false,  
          'choices' => array_keys($choices_combo)
        )),
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->widgetSchema->setLabels(array(
      'username' => "Usuario",
      'id_contacto' => "Contacto"
    ));  	
  }

  public function getModelName()
  {
    return 'AdmMaUsers';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'username'    => 'Text',
      'id_contacto' => 'ForeignKey',
      'activo'      => 'boolean'
    );
  }  
}
