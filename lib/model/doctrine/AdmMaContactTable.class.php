<?php

/**
 * AdmMaContactTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdmMaContactTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdmMaContactTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdmMaContact');
    }

    public static function getContactos($campo){
        $q = Doctrine_Query::create()
            ->from("AdmMaContact a");
        return $q;
    }    
}