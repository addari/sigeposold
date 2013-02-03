<?php

/**
 * AdmMaDocsTTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdmMaDocsTTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdmMaDocsTTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdmMaDocsT');
    }

    public static function getTiposByModulo($id){
		$q = Doctrine_Query::create()
	        ->from('AdmMaDocsT a')
	        ->where('a.modulo = ?', $id);
	    return $q;
    }

}