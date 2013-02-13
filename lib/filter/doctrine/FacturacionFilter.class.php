<?php

/**
 * AdmTrDocs filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FacturacionFilter extends BaseAdmTrDocsFormFilter
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormFilterInput(array("template"=>"%input%")),
      'id_tipo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'),
                                                                  'query' => AdmMaDocsTTable::getTiposByModulo( sfConfig::get("app_modulos_facturacion") ), 'add_empty' => true)),
      'numero_documento'  => new sfWidgetFormFilterInput(array("template"=>"%input%")),
      'contacto'       	  => new sfWidgetFormFilterInput(array("template"=>"%input%")),
      'fecha_emision'     => new sfWidgetFormFilterDate(array("template"=>"%from_date% a %to_date%",'from_date' => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy")), 'to_date' => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy")), 'with_empty' => false)),
      'fecha_vencimiento' => new sfWidgetFormFilterDate(array("template"=>"%from_date% a %to_date%",'from_date' => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy")), 'to_date' => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy")), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPass(array('required' => false)),
      'id_tipo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AdmMaDocsT'), 'column' => 'id')),
      'numero_documento'  => new sfValidatorPass(array('required' => false)),
      'contacto'          => new sfValidatorPass(array('required' => false)),
      'fecha_emision'     => new sfValidatorDateRange(
                                            array('required'  => false, 
                                                  'from_date' => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                    'datetime_output' => 'Y-m-d 00:00:00',
                                                                                    //"date_output"  => 'Y-m-d 00:00:00'
                                                                                    )
                                                                                ), 
                                                  'to_date'   => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                    'datetime_output' => 'Y-m-d 00:00:00',
                                                                                    //"date_output"  => 'd-m-Y 00:00:00',
                                                                                    )
                                                                                )
                                            )),
      'fecha_vencimiento' => new sfValidatorDateRange( 
                                            array('required'  => false, 
                                                  'from_date' => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{3})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                        'datetime_output' => 'Y-m-d 00:00:00',
                                                                                    // "date_output"  => 'd-m-Y 00:00:00',
                                                                                    )
                                                                                ), 
                                                  'to_date'   => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                        'datetime_output' => 'Y-m-d 00:00:00',
                                                                                    // "date_output"  => 'd-m-Y 00:00:00',
                                                                                    )
                                                                                )
                                            ))
	));
  
	$this->widgetSchema->setLabels(array(
    'id'                  => "Id. Documento",
		'id_tipo'             => "Tipo de Documento",
		'numero_documento'    => "Nro. de Documento",
		'fecha_emision'       => "Fecha de Emisión",
		'fecha_vencimiento'   => "Fecha de Vencimiento",
		'contacto'            => "Cliente"
		));

    

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

  }

  public function getModelName()
  {
    return 'AdmTrDocs';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_tipo'           => 'ForeignKey',
      'numero_documento'  => 'Text',
      'contacto'          => 'Text',
      'fecha_emision'     => 'Date',
      'fecha_vencimiento' => 'Date');
  }

public function addContactoColumnQuery(Doctrine_Query $query, $field, $values) {
    $rootAlias = $query->getRootAlias();
    $criterio = $values["text"];
    if ( $criterio ){
      return $query
                ->leftJoin($rootAlias.".AdmMaContact con with r.id_contacto = con.id")
                ->AndWhere("upper(con.nombre) like upper(?)","%$criterio%");
    }
}


public function addFechaEmisionColumnQuery(Doctrine_Query $query, $field, $values) {
  $rootAlias = $query->getRootAlias();

  $fecha_emision = $this->getDefault("fecha_emision");

  if( $fecha_emision["from"]["text"] != "" && $fecha_emision["to"]["text"] != "" ) {
    $fecha_emision_from = Helpers::getFormatoFechaSQL( $fecha_emision["from"]["text"] );
    $fecha_emision_to   = Helpers::getFormatoFechaSQL( $fecha_emision["to"]["text"]   );
    
    return $query
              ->AndWhere($rootAlias.".fecha_emision >= ?",$fecha_emision_from)
              ->AndWhere($rootAlias.".fecha_emision <= ?",$fecha_emision_to);
  }
}

public function addFechaVencimientoColumnQuery(Doctrine_Query $query, $field, $values) {
  $rootAlias = $query->getRootAlias();

  $fecha_vencimiento = $this->getDefault("fecha_vencimiento");

  if( $fecha_vencimiento["from"]["text"] != "" && $fecha_vencimiento["to"]["text"] != "" ) {
    $fecha_vencimiento_from = Helpers::getFormatoFechaSQL( $fecha_vencimiento["from"]["text"] );
    $fecha_vencimiento_to   = Helpers::getFormatoFechaSQL( $fecha_vencimiento["to"]["text"]   );
    
    return $query
              ->AndWhere($rootAlias.".fecha_vencimiento >= ?",$fecha_vencimiento_from)
              ->AndWhere($rootAlias.".fecha_vencimiento <= ?",$fecha_vencimiento_to);
  }
}

}
