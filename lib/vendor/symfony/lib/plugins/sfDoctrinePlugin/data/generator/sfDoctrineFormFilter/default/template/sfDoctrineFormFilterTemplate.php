[?php

/**
 * <?php echo $this->table->getOption('name') ?> filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class <?php echo $this->table->getOption('name') ?>FormFilter extends Base<?php echo $this->table->getOption('name') ?>FormFilter
{
<?php if ($parent = $this->getParentModel()): ?>
  /**
   * @see <?php echo $parent ?>FormFilter
   */
  public function configure()
  {
    parent::configure();
  }
<?php else: ?>
  public function configure()
  {

    $this->setWidgets(array(
    <?php foreach ($this->getColumns() as $column): ?>
    <?php if (($column->isPrimaryKey()) || $column->getFieldName() == "timestamp") continue ?>
          '<?php echo $column->getFieldName() ?>'<?php echo str_repeat(' ', $this->getColumnNameMaxLength() - strlen($column->getFieldName())) ?> => new <?php echo $this->getWidgetClassForColumn($column) ?>(<?php echo $this->getWidgetOptionsForColumn($column) ?>),
    <?php endforeach; ?>
    <?php foreach ($this->getManyToManyRelations() as $relation): ?>
          '<?php echo $this->underscore($relation['alias']) ?>_list'<?php echo str_repeat(' ', $this->getColumnNameMaxLength() - strlen($this->underscore($relation['alias']).'_list')) ?> => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => '<?php echo $relation['table']->getOption('name') ?>')),
    <?php endforeach; ?>
    ));

    $this->widgetSchema->setNameFormat('filtro[%s]');
  }
<?php endif; ?>
}
