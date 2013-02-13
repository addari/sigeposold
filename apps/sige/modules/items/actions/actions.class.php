<?php

/**
 * items actions.
 *
 * @package    sige
 * @subpackage items
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsActions extends sfActions
{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.items.activo", true);  
    $this->getUser()->setAttribute("filtro.items", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.items");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.items.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.items.activo", false);  
      $this->getUser()->setAttribute("filtro.items", "");
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->adm_ma_itemss = Doctrine_Core::getTable('AdmMaItems')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdmMaItemsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdmMaItemsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($adm_ma_items = Doctrine_Core::getTable('AdmMaItems')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_items does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaItemsForm($adm_ma_items);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adm_ma_items = Doctrine_Core::getTable('AdmMaItems')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_items does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdmMaItemsForm($adm_ma_items);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adm_ma_items = Doctrine_Core::getTable('AdmMaItems')->find(array($request->getParameter('id'))), sprintf('Object adm_ma_items does not exist (%s).', $request->getParameter('id')));
    $adm_ma_items->delete();

    $this->redirect('items/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adm_ma_items = $form->save();

      $this->redirect('items/edit?id='.$adm_ma_items->getId());
    }
  }

  public function executeBuscarItemFactura(sfWebRequest $request){
    $this->clearFilter();
    $this->form_filter = new AdmMaItemsFormFilter();
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page',1);
    $this->adm_ma_itemss = new sfDoctrinePager('AdmMaItems', $max_paginacion);
    $this->adm_ma_itemss->setPage( $pagina );
    $this->adm_ma_itemss->init();
    $this->setLayout("layout_mini");
  }

  public function executeNavegacionItemFactura(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new AdmMaItemsFormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this->adm_ma_itemss = new sfDoctrinePager('AdmMaItems', $max_paginacion);
    

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this->adm_ma_itemss->setQuery($this->form_filter->getQuery());  
    }

    $this->adm_ma_itemss->setPage( $pagina );
    $this->adm_ma_itemss->init();
    
    $this->setTemplate("buscarItemFactura");
    $this->setLayout("layout_mini");
  }  

  public function executeFiltrarItemFactura(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new AdmMaItemsFormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('AdmMaItems');
    $this->adm_ma_itemss = new sfDoctrinePager('AdmMaItems', $max_paginacion);

    if($this->form_filter->isValid()){
      $this->adm_ma_itemss->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this->adm_ma_itemss->setPage( $pagina );
    $this->adm_ma_itemss->init();
    $this->setTemplate("buscarItemFactura");
    $this->setLayout("layout_mini");
  }  
}
