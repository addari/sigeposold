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

  public function executeBuscarItemFactura(){
    $filtro   = $this->getRequestParameter("adm_ma_items_filters");
    $criterio = $this->getRequestParameter("criterio");
    if ( $criterio ) {
      $filtro = array ( "nombre" => array ( "text" => $criterio ) );
    }

    $this->form_filter = new AdmMaItemsFormFilter($filtro);
    $this->adm_ma_itemss = new sfDoctrinePager('AdmMaItems', sfConfig::get("app_paginacion") );
    $this->adm_ma_itemss->getQuery()->from("AdmMaItems");

    if( $filtro["nombre"]["text"] ) {
      $criterio = $filtro["nombre"]["text"];
      $this->adm_ma_itemss->getQuery()->where("upper(nombre) like upper('%".$criterio."%')");
    }

    $this->adm_ma_itemss->setPage($this->getRequestParameter("pagina"),1);
    $this->adm_ma_itemss->init();
    $this->setLayout("layout_mini");
  }
}
