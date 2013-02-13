<?php

/**
 * facturacion actions.
 *
 * @package    sige
 * @subpackage facturacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facturacionActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.facturacion.activo", true);  
    $this->getUser()->setAttribute("filtro.facturacion", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.facturacion");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.facturacion.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.facturacion.activo", false);  
      $this->getUser()->setAttribute("filtro.facturacion", "");
  }
  
  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new FacturacionFilter($filtro);

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
    $this->redirect("facturacion/index");
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter = new FacturacionFilter();
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
    
    $this->form_filter = new FacturacionFilter($filtro);

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

    $this->form = new FacturacionForm($adm_tr_docs);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FacturacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($factura = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $this->form = new FacturacionForm($factura);
    $this->factura = $factura;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $this->form = new FacturacionForm($adm_tr_docs);

    $this->processForm($request, $this->form);
    $this->factura = $adm_tr_docs;
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_tr_docs = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $adm_tr_docs->delete();

    $this->redirect('facturacion/index');
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
      $this->redirect('facturacion/edit?id='.$adm_tr_docs->getId());
    }
  }
}
