<?php

/**
 * AdmMaDocsT filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaDocsTFormFilter extends BaseAdmMaDocsTFormFilter
{
  public function configure()
  {
  	$choices_combo = array(""=>"Todos","1"=>"Si","0"=>"No");
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modulo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'origen'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_fiscal'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'afecta_cuentas'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'signo_cuentas'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contiene_renglones' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'afecta_inventario'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reserva_inventario' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'signo_inventario'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_cuenta'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activo'             => new sfWidgetFormChoice(array(
        'choices'  => $choices_combo
      )),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'modulo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'origen'             => new sfValidatorPass(array('required' => false)),
      'tipo_fiscal'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afecta_cuentas'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'signo_cuentas'      => new sfValidatorPass(array('required' => false)),
      'contiene_renglones' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afecta_inventario'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reserva_inventario' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'signo_inventario'   => new sfValidatorPass(array('required' => false)),
      'id_cuenta'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activo'             => new sfValidatorChoice(array(
          'required' => false,  
          'choices' => array_keys($choices_combo)
        )),
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();  	
  }

  public function getModelName()
  {
    return 'AdmMaDocsT';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre'             => 'Text',
      'modulo'             => 'Number',
      'origen'             => 'Text',
      'tipo_fiscal'        => 'Number',
      'afecta_cuentas'     => 'Number',
      'signo_cuentas'      => 'Text',
      'contiene_renglones' => 'Number',
      'afecta_inventario'  => 'Number',
      'reserva_inventario' => 'Number',
      'signo_inventario'   => 'Text',
      'id_cuenta'          => 'Number',
      'activo'             => 'boolean'
    );
  }  
}
