<?php

/**
 * adm_ma_docs_t actions.
 *
 * @package    sige
 * @subpackage adm_ma_docs_t
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_docs_tActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_docs_t.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_docs_t", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_docs_t");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_docs_t.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_docs_t.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_docs_t", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_docs_t/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaDocsTFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaDocsT');
    $this->adm_ma_docs_ts = new sfDoctrinePager('AdmMaDocsT', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_docs_ts->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_docs_ts->setPage( $pagina );
    $this->adm_ma_docs_ts->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaDocsTFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_docs_ts = new sfDoctrinePager('AdmMaDocsT', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_docs_ts->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_docs_ts->setPage( $pagina );
    $this->adm_ma_docs_ts->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaDocsTFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_docs_ts = new sfDoctrinePager('AdmMaDocsT', $max_paginacion);
    $this->adm_ma_docs_ts->setPage( $pagina );
    $this->adm_ma_docs_ts->init();
  }



  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_docs_t = Doctrine_Core::getTable('AdmMaDocsT')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_docs_t);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaDocsTForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaDocsTForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->adm_ma_docs_t = Doctrine_Core::getTable('AdmMaDocsT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_docs_t does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaDocsTForm($this->adm_ma_docs_t);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_docs_t = Doctrine_Core::getTable('AdmMaDocsT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_docs_t does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaDocsTForm($this->adm_ma_docs_t);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_docs_t = Doctrine_Core::getTable('AdmMaDocsT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_docs_t does not exist (%s).', $request->getParameter('id')));
    $adm_ma_docs_t->delete();

    $this->redirect('adm_ma_docs_t/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_docs_t = $form->save();

      $this->redirect('adm_ma_docs_t/edit?id='.$adm_ma_docs_t->getId());
    }
  }
}
