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

    $choices_combo = array(""=>"Todos","1"=>"Si","0"=>"No");
    $this->setWidgets(array(
      'nombre'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_contacto'          => new sfWidgetFormChoice(array(
        'choices'  => $choices_combo
      )),
      'id_tipo_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaIdentT'), 'add_empty' => true)),
      'numero_identificacion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefonos'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exonerado'              => new sfWidgetFormChoice(array(
        'choices'  => $choices_combo
      )),
      'jubilado'               => new sfWidgetFormChoice(array(
        'choices'  => $choices_combo
      )),
      'timestamp'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));
    


    $this->setValidators(array(
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'tipo_contacto'          => new sfValidatorChoice(array(
          'required' => false,  
          'choices' => array_keys($choices_combo)
        )),
      'id_tipo_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaIdentT'), 'column' => 'id')),
      'numero_identificacion'  => new sfValidatorPass(array('required' => false)),
      'direccion'              => new sfValidatorPass(array('required' => false)),
      'telefonos'              => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'exonerado'              => new sfValidatorChoice(array(
          'required' => false,  
          'choices' => array_keys($choices_combo)
        )),
      'jubilado'               => new sfValidatorChoice(array(
          'required' => false,  
          'choices' => array_keys($choices_combo)
        )),
      'timestamp'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    $this->widgetSchema->setLabels(array(
      'tipo_contacto' => "Tipo de Contacto",
      'id_tipo_identificacion' => "Tipo de Identificación",
      'direccion' => "Dirección",
      'email' => "E-mail"
    ));

    $this->setDefault("tipo_contacto",NULL);
    $this->setDefault("jubilado",     NULL);
    $this->setDefault("exonerado",    NULL);
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'nombre'                 => 'Text',
      'tipo_contacto'          => 'Boolean',
      'id_tipo_identificacion' => 'ForeignKey',
      'numero_identificacion'  => 'Text',
      'direccion'              => 'Text',
      'telefonos'              => 'Text',
      'email'                  => 'Text',
      'exonerado'              => 'Boolean',
      'jubilado'               => 'Boolean',
      'timestamp'              => 'Date',
    );
  }


  
}
