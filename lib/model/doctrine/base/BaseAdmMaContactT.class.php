<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdmMaContactT', 'doctrine');

/**
 * BaseAdmMaContactT
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property integer $modulo
 * @property timestamp $timestamp
 * @property Doctrine_Collection $AdmMaContactR
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getNombre()        Returns the current record's "nombre" value
 * @method integer             getModulo()        Returns the current record's "modulo" value
 * @method timestamp           getTimestamp()     Returns the current record's "timestamp" value
 * @method Doctrine_Collection getAdmMaContactR() Returns the current record's "AdmMaContactR" collection
 * @method AdmMaContactT       setId()            Sets the current record's "id" value
 * @method AdmMaContactT       setNombre()        Sets the current record's "nombre" value
 * @method AdmMaContactT       setModulo()        Sets the current record's "modulo" value
 * @method AdmMaContactT       setTimestamp()     Sets the current record's "timestamp" value
 * @method AdmMaContactT       setAdmMaContactR() Sets the current record's "AdmMaContactR" collection
 * 
 * @package    sige
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdmMaContactT extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('adm_ma_contact_t');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('modulo', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
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
        $this->hasMany('AdmMaContactR', array(
             'local' => 'id',
             'foreign' => 'id_tipo'));
    }
}