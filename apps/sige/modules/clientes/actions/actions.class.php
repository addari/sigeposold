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

  public function executeBuscarContactoFactura(){
    $filtro   = $this->getRequestParameter("adm_ma_contact_filters");
    $criterio = $this->getRequestParameter("criterio");
    if ( $criterio ) {
      $filtro = array ( "nombre" => array ( "text" => $criterio ) );
    }

    $this->form_filter = new AdmMaContactFormFilter($filtro);
    $this->adm_ma_contacts = new sfDoctrinePager('AdmMaContact', sfConfig::get("app_paginacion") );
    $this->adm_ma_contacts->getQuery()->from("AdmMaContact");

    if( $filtro["nombre"]["text"] ) {
      $criterio = $filtro["nombre"]["text"];
      $this->adm_ma_contacts->getQuery()->where("upper(nombre) like upper('%".$criterio."%')");
    }

    $this->adm_ma_contacts->setPage($this->getRequestParameter("pagina"),1);
    $this->adm_ma_contacts->init();
    $this->setLayout("layout_mini");
  }  
}
