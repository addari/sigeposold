<?php

/**
 * adm_ma_emp_users_r actions.
 *
 * @package    sige
 * @subpackage adm_ma_emp_users_r
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_emp_users_rActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_emp_users_r.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_emp_users_r", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_emp_users_r");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_emp_users_r.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_emp_users_r.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_emp_users_r", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_emp_users_r/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaEmpUsersRFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaEmpUsersR');
    $this->adm_ma_emp_users_rs = new sfDoctrinePager('AdmMaEmpUsersR', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_emp_users_rs->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_emp_users_rs->setPage( $pagina );
    $this->adm_ma_emp_users_rs->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaEmpUsersRFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_emp_users_rs = new sfDoctrinePager('AdmMaEmpUsersR', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_emp_users_rs->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_emp_users_rs->setPage( $pagina );
    $this->adm_ma_emp_users_rs->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaEmpUsersRFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_emp_users_rs = new sfDoctrinePager('AdmMaEmpUsersR', $max_paginacion);
    $this->adm_ma_emp_users_rs->setPage( $pagina );
    $this->adm_ma_emp_users_rs->init();
  }



  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_emp_users_r = Doctrine_Core::getTable('AdmMaEmpUsersR')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_emp_users_r);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaEmpUsersRForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaEmpUsersRForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->adm_ma_emp_users_r = Doctrine_Core::getTable('AdmMaEmpUsersR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp_users_r does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaEmpUsersRForm($this->adm_ma_emp_users_r);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_emp_users_r = Doctrine_Core::getTable('AdmMaEmpUsersR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp_users_r does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaEmpUsersRForm($this->adm_ma_emp_users_r);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_emp_users_r = Doctrine_Core::getTable('AdmMaEmpUsersR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp_users_r does not exist (%s).', $request->getParameter('id')));
    $adm_ma_emp_users_r->delete();

    $this->redirect('adm_ma_emp_users_r/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_emp_users_r = $form->save();

      $this->redirect('adm_ma_emp_users_r/show?id='.$adm_ma_emp_users_r->getId());
    }
  }
}
