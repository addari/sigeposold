<?php

/**
 * adm_ma_emp actions.
 *
 * @package    sige
 * @subpackage adm_ma_emp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_empActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_emp.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_emp", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_emp");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_emp.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_emp.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_emp", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_emp/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaEmpFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaEmp');
    $this->adm_ma_emps = new sfDoctrinePager('AdmMaEmp', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_emps->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_emps->setPage( $pagina );
    $this->adm_ma_emps->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaEmpFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_emps = new sfDoctrinePager('AdmMaEmp', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_emps->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_emps->setPage( $pagina );
    $this->adm_ma_emps->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaEmpFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_emps = new sfDoctrinePager('AdmMaEmp', $max_paginacion);
    $this->adm_ma_emps->setPage( $pagina );
    $this->adm_ma_emps->init();
  }



  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_emp = Doctrine_Core::getTable('AdmMaEmp')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_emp);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaEmpForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaEmpForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->adm_ma_emp = Doctrine_Core::getTable('AdmMaEmp')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaEmpForm($this->adm_ma_emp);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_emp = Doctrine_Core::getTable('AdmMaEmp')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaEmpForm($this->adm_ma_emp);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_emp = Doctrine_Core::getTable('AdmMaEmp')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_emp does not exist (%s).', $request->getParameter('id')));
    $adm_ma_emp->delete();

    $this->redirect('adm_ma_emp/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_emp = $form->save();

      $this->redirect('adm_ma_emp/show?id='.$adm_ma_emp->getId());
    }
  }
}
