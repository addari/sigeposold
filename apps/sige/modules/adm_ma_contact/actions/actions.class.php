<?php

/**
 * adm_ma_contact actions.
 *
 * @package    sige
 * @subpackage adm_ma_contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adm_ma_contactActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.adm_ma_contact.activo", true);  
    $this->getUser()->setAttribute("filtro.adm_ma_contact", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.adm_ma_contact");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.adm_ma_contact.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.adm_ma_contact.activo", false);  
      $this->getUser()->setAttribute("filtro.adm_ma_contact", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("adm_ma_contact/index");
  }

  public function executeFiltrar(sfWebRequest $request)
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
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
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

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new AdmMaContactFormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this->adm_ma_contacts = new sfDoctrinePager('AdmMaContact', $max_paginacion);
    $this->adm_ma_contacts->setPage( $pagina );
    $this->adm_ma_contacts->init();
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

  public function executeShow(sfWebRequest $request)
  {
    $this->adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adm_ma_contact);
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
    $this->forward404Unless($this->adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactForm($this->adm_ma_contact);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaContactForm($this->adm_ma_contact);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_contact = Doctrine_Core::getTable('AdmMaContact')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_contact does not exist (%s).', $request->getParameter('id')));
    $adm_ma_contact->delete();

    $this->redirect('adm_ma_contact/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_contact = $form->save();

      $this->redirect('adm_ma_contact/show?id='.$adm_ma_contact->getId());
    }
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
