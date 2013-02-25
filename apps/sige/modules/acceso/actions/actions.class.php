<?php

/**
 * acceso actions.
 *
 * @package    sige
 * @subpackage acceso
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accesoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	
  	
  }

  public function executeCheckacceso(sfWebRequest $request)
  {
  	$usuario = $this->getRequestParameter("usuario");
  	$clave   = $this->getRequestParameter("clave");
  	$reg = Doctrine_Query::create()->
  				from("AdmMaUsers u")->
  				innerJoin("u.AdmMaContact c")->
  				where("u.username = ?",$usuario)->
  				andWhere("u.password = sha1(?)",$clave)->
          andWhere("u.activo = ?",true)->
          fetchOne();

  	if($reg){
      $this->getUser()->setAuthenticated(true);
      
      $this->getUser()->setAttribute("usuario",$reg->getUsername());

  		$this->getUser()->setFlash("mensaje-success","Bienvenido al sistema.");
    }else{
      $this->getUser()->setFlash("mensaje-error","Acceso denegado");
  	}
  	$this->redirect("acceso/index");
  }

  public function executeLogout()
  {
      $this->getUser()->setAuthenticated(false);
      $this->redirect("main/index");
  }  
}
