<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.modal');

?>
<form action="index.php" method="post" name="adminForm" id="adminForm" class="form-inline">
<div id="editcell">
    <div id="filter-bar" class="btn-toolbar">
        <div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
            <input type="text" class="inputbox inline filter" name="filter_search" id="filter_search" value="<?php echo $this->lists['search'];?>" onchange="document.adminForm.submit();" placeholder="<?php echo JText::_( 'FILTER_BY_TITLE_OR_ENTER_ARTICLE_ID' );?>" title="<?php echo JText::_( 'FILTER_BY_TITLE_OR_ENTER_ARTICLE_ID' );?>"/>
        </div>
        <div class="btn-group pull-left">
            <button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i> <?php echo JText::_( 'FILTER' ); ?></button>
            <button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="jQuery('#adminForm .filter').val('');this.form.submit();"><i class="icon-remove"></i> <?php echo JText::_( 'RESET' ); ?></button>
        </div>
        <div class="btn-group pull-right hidden-phone">
            <label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
            <?php echo $this->page->getLimitBox(); ?>
        </div>
        <div class="clearfix"></div>
    </div>
	<table class="adminlist table table-striped" style="position: relative;">
	<thead>
		<tr>
			<th style="width: 3%" class="center"><?php echo JHTML::_('grid.sort',   'ID', 'c.id', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th style="width: 3%" class="center"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th>
			<th style="width: 30%"><?php echo JHTML::_('grid.sort',   'Name', 'c.name', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th style="width: 20%"><?php echo JText::_('Data'); ?></th>
			<th style="width: 20%" class="hidden-phone"><?php echo JHTML::_('grid.sort',   'TABLE IN DATABASE', 'c.table', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th style="width: 3%" class="nowrap hidden-phone"><?php  echo JText::_('Menu item'); ?></th>
			<th style="width: 3%" class="nowrap hidden-phone">
				<?php echo JHTML::_('grid.sort',   'Published', 'c.published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th style="width: 10%" class="nowrap hidden-phone" ><?php echo JHTML::_('grid.sort',   'Created', 'c.published', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<?php echo $this->page->getListFooter(); ?>
			</td>
	</tfoot>
	<tbody>	<?php
	$dbimage = "components/com_joodb/assets/images/database.png";
	$menuimage = "components/com_joodb/assets/images/add-menu.png";
	$editimage = "components/com_joodb/assets/images/edit.png";
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];

		$published 	= JHTML::_('grid.published', $row,  $i);
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$termLink	= JRoute::_("index.php?option=com_joodb&task=edit&view=joodbentry&cid[]=$row->id");
		$editLink	= JRoute::_("index.php?option=com_joodb&task=listdata&view=listdata&joodbid=$row->id");
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td class="center"><?php echo $row->id; ?></td>
			<td class="center"><?php echo $checked; ?></td>
			<td>
				<a href='<?php echo $termLink; ?>' class="hasTooltip" title="<?php echo addslashes(JText::_("EDIT")." <b>".$row->name)."</b>"?>" >
					<img src="<?php echo $editimage ?>" alt="*" border="0" />
					<?php  echo $row->name; ?>
				</a>
			</td>
            <td>
				<span class="editlinktip hasTooltip" title="<?php echo JText::_( 'Edit data of' )." <b>".$row->table."</b>";?>">
					<a href="<?php echo $editLink; ?>">
						<img src="<?php echo $dbimage ?>" " alt="*" border="0" />
						<?php echo JText::_( 'Edit data' ); ?>
					</a>
				</span>
			</td>
            <td class="hidden-phone"><?php echo $row->table; ?></td>
            <td class="hidden-phone center">
				<span class="editlinktip hasTooltip" title="<?php echo JText::_( 'Create menu item' )." <b>".$row->name."</b>";?>">
					<a class="modal" href="index.php?option=com_joodb&tmpl=component&view=addmenuitem&cid[]=<?php echo $row->id ?>" rel="{handler: 'iframe', size: {x: 480, y: 180}}">
						<img src="<?php echo $menuimage ?>" alt="*" border="0" />
					</a>
				</span>
			</td>
            <td class="hidden-phone center">
	            <?php echo JHtml::_('jgrid.published', $row->published, $i, '', true); ?>
            </th>
			<td class="hidden-phone"><?php echo JHTML::_('date', $row->created, JText::_('DATE_FORMAT_LC3')); ?></td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
	</table>
</div>
<input type="hidden" name="option" value="com_joodb" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="view" value="joodb" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<?php echo JHTML::_( 'form.token' );?>
</form>
