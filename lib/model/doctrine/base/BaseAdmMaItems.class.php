<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdmMaItems', 'doctrine');

/**
 * BaseAdmMaItems
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_tipo
 * @property string $nombre
 * @property decimal $costo
 * @property decimal $precio
 * @property integer $id_impuesto
 * @property timestamp $timestamp
 * @property AdmMaItemsT $AdmMaItemsT
 * @property AdmMaTax $AdmMaTax
 * @property Doctrine_Collection $AdmTrDocsDetalleR
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method integer             getIdTipo()            Returns the current record's "id_tipo" value
 * @method string              getNombre()            Returns the current record's "nombre" value
 * @method decimal             getCosto()             Returns the current record's "costo" value
 * @method decimal             getPrecio()            Returns the current record's "precio" value
 * @method integer             getIdImpuesto()        Returns the current record's "id_impuesto" value
 * @method timestamp           getTimestamp()         Returns the current record's "timestamp" value
 * @method AdmMaItemsT         getAdmMaItemsT()       Returns the current record's "AdmMaItemsT" value
 * @method AdmMaTax            getAdmMaTax()          Returns the current record's "AdmMaTax" value
 * @method Doctrine_Collection getAdmTrDocsDetalleR() Returns the current record's "AdmTrDocsDetalleR" collection
 * @method AdmMaItems          setId()                Sets the current record's "id" value
 * @method AdmMaItems          setIdTipo()            Sets the current record's "id_tipo" value
 * @method AdmMaItems          setNombre()            Sets the current record's "nombre" value
 * @method AdmMaItems          setCosto()             Sets the current record's "costo" value
 * @method AdmMaItems          setPrecio()            Sets the current record's "precio" value
 * @method AdmMaItems          setIdImpuesto()        Sets the current record's "id_impuesto" value
 * @method AdmMaItems          setTimestamp()         Sets the current record's "timestamp" value
 * @method AdmMaItems          setAdmMaItemsT()       Sets the current record's "AdmMaItemsT" value
 * @method AdmMaItems          setAdmMaTax()          Sets the current record's "AdmMaTax" value
 * @method AdmMaItems          setAdmTrDocsDetalleR() Sets the current record's "AdmTrDocsDetalleR" collection
 * 
 * @package    sige
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdmMaItems extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('adm_ma_items');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_tipo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('costo', 'decimal', 10, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('precio', 'decimal', 10, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('id_impuesto', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('timestamp', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AdmMaItemsT', array(
             'local' => 'id_tipo',
             'foreign' => 'id'));

        $this->hasOne('AdmMaTax', array(
             'local' => 'id_impuesto',
             'foreign' => 'id'));

        $this->hasMany('AdmTrDocsDetalleR', array(
             'local' => 'id',
             'foreign' => 'id_items'));
    }
}