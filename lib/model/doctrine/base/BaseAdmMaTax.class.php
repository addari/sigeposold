<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdmMaTax', 'doctrine');

/**
 * BaseAdmMaTax
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property string $alias
 * @property decimal $porcentaje
 * @property timestamp $timestamp
 * @property Doctrine_Collection $AdmMaItems
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getNombre()     Returns the current record's "nombre" value
 * @method string              getAlias()      Returns the current record's "alias" value
 * @method decimal             getPorcentaje() Returns the current record's "porcentaje" value
 * @method timestamp           getTimestamp()  Returns the current record's "timestamp" value
 * @method Doctrine_Collection getAdmMaItems() Returns the current record's "AdmMaItems" collection
 * @method AdmMaTax            setId()         Sets the current record's "id" value
 * @method AdmMaTax            setNombre()     Sets the current record's "nombre" value
 * @method AdmMaTax            setAlias()      Sets the current record's "alias" value
 * @method AdmMaTax            setPorcentaje() Sets the current record's "porcentaje" value
 * @method AdmMaTax            setTimestamp()  Sets the current record's "timestamp" value
 * @method AdmMaTax            setAdmMaItems() Sets the current record's "AdmMaItems" collection
 * 
 * @package    sige
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdmMaTax extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('adm_ma_tax');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', 128, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 128,
             ));
        $this->hasColumn('alias', 'string', 64, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('porcentaje', 'decimal', 6, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 6,
             'scale' => '2',
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
        $this->hasMany('AdmMaItems', array(
             'local' => 'id',
             'foreign' => 'id_impuesto'));
    }
}