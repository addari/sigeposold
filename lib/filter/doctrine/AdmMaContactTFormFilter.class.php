<?php

/**
 * AdmMaContactT filter form.
 *
 * @package    sige
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdmMaContactTFormFilter extends BaseAdmMaContactTFormFilter
{
  public function configure()
  {

    $this->setWidgets(array(
                'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
                'modulo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
                ));


    $this->widgetSchema->setNameFormat('filtro[%s]');
  }
}
