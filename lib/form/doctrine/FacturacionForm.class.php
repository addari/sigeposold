<?php

/**
 * AdmTrDocs form.
 *
 * @package    sige
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FacturacionForm extends BaseAdmTrDocsForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_empresa'        => new sfWidgetFormInputHidden(),
      'id_tipo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'),
                                                                  'query' => AdmMaDocsTTable::getTiposByModulo( sfConfig::get("app_modulos_facturacion") ), 'add_empty' => false)),
      'numero_documento'  => new sfWidgetFormInputText(),
      'id_contacto'       => new sfWidgetFormInputHidden(),
      'exonerado'         => new sfWidgetFormInputHidden(),
      'items'             => new sfWidgetFormInputHidden(),
      'remove_items'      => new sfWidgetFormInputHidden(),
      'contacto'          => new sfWidgetFormInputText(array(),array("class"=>"campo-largo", "readonly"=>"readonly")),
      'fecha_emision'     => new sfWidgetFormInputText(),
      'fecha_vencimiento' => new sfWidgetFormInputText(),
      'monto_exento'      => new sfWidgetFormInputText(),
      'monto_gravado'     => new sfWidgetFormInputText(),
      'monto_impuesto'    => new sfWidgetFormInputText(),
      'monto_descuento'   => new sfWidgetFormInputText(),
      'comentarios'       => new sfWidgetFormTextarea(array(),array("class"=>"comentario")),
      'timestamp'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_empresa'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaEmp'))),
      'id_tipo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaDocsT'))),
      'numero_documento'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'id_contacto'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdmMaContact'))),
      'fecha_emision'     => new sfValidatorDate(
                                             array('date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~'),
                                             array('bad_format'        => 'Formato de fecha invalido, verifique.'),
                                             array('date_output'        => 'd/m/Y'),
                                             array('required'=>"campo requerido.")
                                             ),
      'fecha_vencimiento' => new sfValidatorDate(
                                             array('date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~'),
                                             array('bad_format'        => 'Formato de fecha invalido, verifique.'),
                                             array('date_output'        => 'd/m/Y'),
                                             array('required'=>"campo requerido.")
                                             ),
      'monto_exento'      => new sfValidatorNumber(array('required' => false)),
      'monto_gravado'     => new sfValidatorNumber(array('required' => false)),
      'monto_impuesto'    => new sfValidatorNumber(array('required' => false)),
      'monto_descuento'   => new sfValidatorNumber(array('required' => false)),
      'comentarios'       => new sfValidatorString(array('required' => false)),
      'exonerado' => new sfValidatorString(array('required' => false)),
      'contacto'  => new sfValidatorString(array('required' => false)),
      'items'  => new sfValidatorString(array('required' => false)),
      'remove_items'  => new sfValidatorString(array('required' => false))
    ));

	$this->widgetSchema->setLabels(array(
		'id_tipo'             => "Tipo de Documento",
		'numero_documento'    => "Nro. de Documento",
		'fecha_emision'       => "Fecha de Emisión",
		'fecha_vencimiento'   => "Fecha de Vencimiento",
		'id_contacto'         => "Cliente"
		));


    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    if( !$this->isNew()){
      $this->setDefault("contacto",$this->getObject()->AdmMaContact->getNombre());
    }

    $this->widgetSchema->setNameFormat('factura[%s]');
    $this->setupInheritance();

  }

  public function save ($con=null)
  {

    $documento = parent::save($con);

    $remove_items = json_decode($this->getValue("remove_items"));

    foreach( $remove_items as $item){
      $renglon = Doctrine_Core::getTable('AdmTrDocsDetalleR')->find($item->id);
      $renglon->delete( $con );
    }

    $items = json_decode($this->getValue("items"));

    //add or update renglon
    foreach( $items as $item){

        if ( $item->id ){
          $detalle_item = Doctrine_Core::getTable('AdmTrDocsDetalleR')->find($item->id);
        }else{
          $detalle_item = new AdmTrDocsDetalleR();  
          $detalle_item->setIdDocumento ( $documento->getId() );
        }
          $detalle_item->setDescripcion   ( $item->descripcion );
          $detalle_item->setIdItems       ( $item->producto_id );
          $detalle_item->setCantidad      ( $item->cantidad );
          $detalle_item->setPrecio        ( $item->precio );
          $detalle_item->setCosto         ( $item->costo );
          $detalle_item->setMontoImpuesto ( $item->monto_impuesto );
          $detalle_item->setAliasImpuesto ( $item->alias_impuesto );

          $detalle_item->save( $con );
      }
    return $documento;

  }



}
