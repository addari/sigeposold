<?php

/**
 * adm_ma_users actions.
 *
 * @package    sige
 * @subpackage adm_ma_users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_usersActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_users.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_users", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_users");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_users.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_users.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_users", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_users/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaUsersFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaUsers');
    $this->adm_ma_userss = new sfDoctrinePager('AdmMaUsers', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_userss->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_userss->setPage( $pagina );
    $this->adm_ma_userss->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaUsersFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_userss = new sfDoctrinePager('AdmMaUsers', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_userss->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_userss->setPage( $pagina );
    $this->adm_ma_userss->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaUsersFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_userss = new sfDoctrinePager('AdmMaUsers', $max_paginacion);
    $this->adm_ma_userss->setPage( $pagina );
    $this->adm_ma_userss->init();
  }



  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_users = Doctrine_Core::getTable('AdmMaUsers')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_users);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaUsersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaUsersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->adm_ma_users = Doctrine_Core::getTable('AdmMaUsers')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_users does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaUsersForm($this->adm_ma_users);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_users = Doctrine_Core::getTable('AdmMaUsers')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_users does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaUsersForm($this->adm_ma_users);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_users = Doctrine_Core::getTable('AdmMaUsers')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_users does not exist (%s).', $request->getParameter('id')));
    $adm_ma_users->delete();

    $this->redirect('adm_ma_users/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $sw = false;
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      if(!$form->isNew()){
        $reg = Doctrine_Query::create()
               ->from("AdmMaUsers u")
               ->where("u.id = ?", $form->getObject()->getId() )
               ->fetchOne();

        $current_password = $form->getValue("password");
        $old_password     = $reg->getPassword();
        $sw=true;
      }
      $adm_ma_users = $form->save();

      if($sw == true && ($current_password != $old_password)){
        $adm_ma_users->setPassword(sha1($current_password));
      }else{
        $adm_ma_users->setPassword(sha1($current_password));
      }

      $adm_ma_users->save();

      $this->redirect('adm_ma_users/show?id='.$adm_ma_users->getId());
    }
  }
}
