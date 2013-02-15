<?php

/**
 * tipo_identificacion actions.
 *
 * @package    sige
 * @subpackage tipo_identificacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tipo_identificacionActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.tipo_identificacion.activo", true);  
    $this->getUser()->setAttribute("filtro.tipo_identificacion", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.tipo_identificacion");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.tipo_identificacion.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.tipo_identificacion.activo", false);  
      $this->getUser()->setAttribute("filtro.tipo_identificacion", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("tipo_identificacion/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaIdentTFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaIdentT');
    $this->adm_ma_ident_ts = new sfDoctrinePager('AdmMaIdentT', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_ident_ts->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_ident_ts->setPage( $pagina );
    $this->adm_ma_ident_ts->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaIdentTFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_ident_ts = new sfDoctrinePager('AdmMaIdentT', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_ident_ts->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_ident_ts->setPage( $pagina );
    $this->adm_ma_ident_ts->init();

    $this->setTemplate("index");


  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaIdentTFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_ident_ts = new sfDoctrinePager('AdmMaIdentT', $max_paginacion);
    $this->adm_ma_ident_ts->setPage( $pagina );
    $this->adm_ma_ident_ts->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_ident_t = Doctrine_Core::getTable('AdmMaIdentT')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_ident_t);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaIdentTForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaIdentTForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($adm_ma_ident_t = Doctrine_Core::getTable('AdmMaIdentT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_ident_t does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaIdentTForm($adm_ma_ident_t);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adm_ma_ident_t = Doctrine_Core::getTable('AdmMaIdentT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_ident_t does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaIdentTForm($adm_ma_ident_t);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_ident_t = Doctrine_Core::getTable('AdmMaIdentT')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_ident_t does not exist (%s).', $request->getParameter('id')));
    $adm_ma_ident_t->delete();

    $this->redirect('tipo_identificacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_ident_t = $form->save();

      $this->redirect('tipo_identificacion/edit?id='.$adm_ma_ident_t->getId());
    }
  }
}
