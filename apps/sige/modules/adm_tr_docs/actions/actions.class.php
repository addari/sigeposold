<?php

/**
 * adm_tr_docs actions.
 *
 * @package    sige
 * @subpackage adm_tr_docs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_tr_docsActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_tr_docs.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_tr_docs", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_tr_docs");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_tr_docs.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_tr_docs.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_tr_docs", "");
  }
  
  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmTrDocsFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmTrDocs')->TotalDocumentos();
    $this->adm_tr_docss = new sfDoctrinePager('AdmTrDocs', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_tr_docss->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_tr_docss->setPage( $pagina );
    $this->adm_tr_docss->init();
    $this->setTemplate("index");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_tr_docs/index");
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter = new AdmTrDocsFormFilter();
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    $this->adm_tr_docss = new sfDoctrinePager('AdmTrDocs', $max_paginacion);
    $this->adm_tr_docss->setPage( $pagina );
    $this->adm_tr_docss->init();
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmTrDocsFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmTrDocs')->TotalDocumentos();
    $this->adm_tr_docss = new sfDoctrinePager('AdmTrDocs', $max_paginacion);
    

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_tr_docss->setQuery($this->form_filter->getQuery());  
    }else{
      $this->adm_tr_docss->setQuery( $query );  
    }

    $this->adm_tr_docss->setPage( $pagina );
    $this->adm_tr_docss->init();

    $this->setTemplate("index");
  }  

  public function executeShow(sfWebRequest $request)
  {
    $this->adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_tr_docs);
  }

  public function executeNew(sfWebRequest $request)
  {
    $adm_tr_docs = new AdmtrDocs();
    $adm_tr_docs->setIdEmpresa(1);

    $this->form = new AdmTrDocsForm($adm_tr_docs);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmTrDocsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmTrDocsForm($adm_tr_docs);
    $this->adm_tr_docs = $adm_tr_docs;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmTrDocsForm($adm_tr_docs);

    $this->processForm($request, $this->form);
    $this->factura = $adm_tr_docs;
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $adm_tr_docs->delete();

    $this->redirect('adm_tr_docs/index');
  }

  public function executeRenglonitem(sfWebRequest $request)
  {
   return $this->renderText('some text');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {

    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
      try{
        $conn->beginTransaction();
        $adm_tr_docs = $form->save($conn);
        $adm_tr_docs->actualizarAcumulados();
        $adm_tr_docs->save($conn);
        $conn->commit();
      }catch(Exception $e){
        $conn->rollback();
      }
      $this->redirect('adm_tr_docs/show?id='.$adm_tr_docs->getId());
    }
  }
}
