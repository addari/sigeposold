<?php

/**
 * adm_ma_contact_r actions.
 *
 * @package    sige
 * @subpackage adm_ma_contact_r
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_contact_rActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_contact_r.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_contact_r", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_contact_r");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_contact_r.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_contact_r.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_contact_r", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_contact_r/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaContactRFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaContactR');
    $this->adm_ma_contact_rs = new sfDoctrinePager('AdmMaContactR', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_contact_rs->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_contact_rs->setPage( $pagina );
    $this->adm_ma_contact_rs->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaContactRFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_contact_rs = new sfDoctrinePager('AdmMaContactR', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_contact_rs->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_contact_rs->setPage( $pagina );
    $this->adm_ma_contact_rs->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaContactRFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_contact_rs = new sfDoctrinePager('AdmMaContactR', $max_paginacion);
    $this->adm_ma_contact_rs->setPage( $pagina );
    $this->adm_ma_contact_rs->init();
  }



  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_contact_r = Doctrine_Core::getTable('AdmMaContactR')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_contact_r);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaContactRForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaContactRForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->adm_ma_contact_r = Doctrine_Core::getTable('AdmMaContactR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact_r does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactRForm($this->adm_ma_contact_r);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_contact_r = Doctrine_Core::getTable('AdmMaContactR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact_r does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactRForm($this->adm_ma_contact_r);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_contact_r = Doctrine_Core::getTable('AdmMaContactR')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact_r does not exist (%s).', $request->getParameter('id')));
    $adm_ma_contact_r->delete();

    $this->redirect('adm_ma_contact_r/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_contact_r = $form->save();

      $this->redirect('adm_ma_contact_r/show?id='.$adm_ma_contact_r->getId());
    }
  }
}
