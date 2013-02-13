<?php

/**
 * clientes actions.
 *
 * @package    sige
 * @subpackage clientes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientesActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.clientes.activo", true);  
    $this->getUser()->setAttribute("filtro.clientes", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.clientes");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.clientes.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.clientes.activo", false);  
      $this->getUser()->setAttribute("filtro.clientes", "");
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->adm_ma_contacts = Doctrine_Core::getTable('AdmMaContact')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaContactForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaContactForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactForm($adm_ma_contact);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactForm($adm_ma_contact);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $adm_ma_contact->delete();

    $this->redirect('clientes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_contact = $form->save();

      $this->redirect('clientes/edit?id='.$adm_ma_contact->getId());
    }
  }

  public function executeBuscarContactoFactura(sfWebRequest $request)
  {
      $this->clearFilter();
      $this->form_filter = new AdmMaContactFormFilter();
      $max_paginacion = sfConfig::get("app_paginacion");
      $pagina         = $request->getParameter('page',1);
      $this->adm_ma_contacts = new sfDoctrinePager('AdmMaContact', $max_paginacion);
      $this->adm_ma_contacts->setPage( $pagina );
      $this->adm_ma_contacts->init();
      $this->setLayout("layout_mini");
  }  

  public function executeNavegacionContactoFactura(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaContactFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_contacts = new sfDoctrinePager('AdmMaContact', $max_paginacion);
    

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_contacts->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_contacts->setPage( $pagina );
    $this->adm_ma_contacts->init();
    
    $this->setTemplate("buscarContactoFactura");
    $this->setLayout("layout_mini");
  }  

  public function executeFiltrarContactoFactura(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaContactFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaContact');
    $this->adm_ma_contacts = new sfDoctrinePager('AdmMaContact', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_contacts->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_contacts->setPage( $pagina );
    $this->adm_ma_contacts->init();
    $this->setTemplate("buscarContactoFactura");
    $this->setLayout("layout_mini");
  }

}
