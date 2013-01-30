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
  public function executeIndex(sfWebRequest $request)
  {
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmTrDocs')->createQuery("a")->Where("a.id_tipo = ?",1);
    $this->adm_tr_docss = new sfDoctrinePager('AdmTrDocs', $max_paginacion);
    $this->adm_tr_docss->setQuery( $query );
    $this->adm_tr_docss->setPage( $pagina );
    $this->adm_tr_docss->init();


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
    $this->forward404Unless($factura = Doctrine_Core::getTable('AdmTrDocs')->find(array($request->getParameter('id'))), sprintf('Object adm_tr_docs does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmTrDocsForm($factura);
    $this->factura = $factura;
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
