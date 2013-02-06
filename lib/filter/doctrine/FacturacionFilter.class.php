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
      // 'fecha_emision'     => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy",'add_empty' => false)),
      // 'fecha_vencimiento' => new sfWidgetFormFilterInput(array("template"=>"%input%"), array("data-date-format" => "dd/mm/yyyy",'add_empty' => false))
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
                                                                                    'datetime_output' => "Y-m-d"
                                                                                    )
                                                                                ), 
                                                  'to_date'   => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                    'datetime_output' => "Y-m-d"
                                                                                    )
                                                                                )
                                            )),
      'fecha_vencimiento' => new sfValidatorDateRange( 
                                            array('required'  => false, 
                                                  'from_date' => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{3})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                    'datetime_output' => "Y-m-d"
                                                                                    )
                                                                                ), 
                                                  'to_date'   => new sfValidatorDateTime(
                                                                                  array(
                                                                                    'required' => false,
                                                                                    'date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~',
                                                                                    'datetime_output' => "Y-m-d"
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

    $this->widgetSchema->setNameFormat('filtro[%s]');

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
    return $query
              ->leftJoin($rootAlias.".AdmMaContact con with r.id_contacto = con.id")
              ->where("upper(con.nombre) like upper(?)","%$criterio%");
}




}
