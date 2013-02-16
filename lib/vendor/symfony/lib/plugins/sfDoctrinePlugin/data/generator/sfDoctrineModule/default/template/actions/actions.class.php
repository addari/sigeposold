[?php

/**
 * <?php echo $this->getModuleName() ?> actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class <?php echo $this->getGeneratedModuleName() ?>Actions extends <?php echo $this->getActionsBaseClass() ?>

{

  private function setFilter($criterios){
    $this->getUser()->setAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>.activo", true);  
    $this->getUser()->setAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>", $criterios);
  }
  
  private function getFilter(){
    return $this->getUser()->getAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>");
  }
  
  private function hasFilter(){
      return $this->getUser()->getAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>.activo", false);  
  }

  private function clearFilter(){
      $this->getUser()->setAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>.activo", false);  
      $this->getUser()->setAttribute("filtro.<?php echo $this->getGeneratedModuleName() ?>", "");
  }

  public function executeLimpiarFiltro(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->redirect("<?php echo $this->getGeneratedModuleName() ?>/index");
  }

  public function executeFiltrar(sfWebRequest $request)
  {

    $filtro = $this->getRequestParameter("filtro");

    $this->form_filter = new <?php echo $this->getModelClass() ?>FormFilter($filtro);

    $this->form_filter->bind($filtro);
    
    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $query = Doctrine_Core::getTable('<?php echo $this->getModelClass() ?>');
    $this-><?php echo $this->getPluralName() ?> = new sfDoctrinePager('<?php echo $this->getModelClass() ?>', $max_paginacion);

    if($this->form_filter->isValid()){
      $this-><?php echo $this->getPluralName() ?>->setQuery($this->form_filter->getQuery());  
      $this->setFilter( $filtro );
    }

    $this-><?php echo $this->getPluralName() ?>->setPage( $pagina );
    $this-><?php echo $this->getPluralName() ?>->init();
    $this->setTemplate("index");
  }

  public function executeNavegacion(sfWebRequest $request)
  {
    $filtro = $this->getRequestParameter("filtro");
    
    if ( $this->hasFilter() ) {
       $filtro = $this->getFilter();
    }
    
    $this->form_filter = new <?php echo $this->getModelClass() ?>FormFilter($filtro);

    $max_paginacion = sfConfig::get("app_paginacion");
    $pagina         = $request->getParameter('page', 1);
    
    $this-><?php echo $this->getPluralName() ?> = new sfDoctrinePager('<?php echo $this->getModelClass() ?>', $max_paginacion);

    if ( $this->hasFilter() ) {
      $this->form_filter->bind($filtro);
      $this-><?php echo $this->getPluralName() ?>->setQuery($this->form_filter->getQuery());  
    }

    $this-><?php echo $this->getPluralName() ?>->setPage( $pagina );
    $this-><?php echo $this->getPluralName() ?>->init();

    $this->setTemplate("index");
  }    

  public function executeIndex(sfWebRequest $request)
  {
    $this->clearFilter();
    $this->form_filter  = new <?php echo $this->getModelClass() ?>FormFilter();
    $max_paginacion     = sfConfig::get("app_paginacion");
    $pagina             = $request->getParameter('page', 1);

    $this-><?php echo $this->getPluralName() ?> = new sfDoctrinePager('<?php echo $this->getModelClass() ?>', $max_paginacion);
    $this-><?php echo $this->getPluralName() ?>->setPage( $pagina );
    $this-><?php echo $this->getPluralName() ?>->init();
  }


<?php //include dirname(__FILE__).'/../../parts/indexAction.php' ?>

<?php if (isset($this->params['with_show']) && $this->params['with_show']): ?>
<?php include dirname(__FILE__).'/../../parts/showAction.php' ?>

<?php endif; ?>
<?php include dirname(__FILE__).'/../../parts/newAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/createAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/editAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/updateAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/deleteAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/processFormAction.php' ?>
}
