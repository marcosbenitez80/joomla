<?php

// no direct access
defined('_JEXEC') or die('Restricted access');
$version = new JVersion();

JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');

?><form action="index.php" method="post" name="adminForm" id="adminForm">
    <div id="editcell">
        <div id="filter-bar" class="btn-toolbar">
            <div class="filter-search btn-group pull-left">
                <label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
                <input type="text" class="filter inputbox inline" name="search" id="search" style="width:200px;" value="<?php echo $this->lists['search'];?>" onchange="document.adminForm.submit();" placeholder="<?php echo JText::_( 'FILTER_BY_TITLE_OR_ENTER_ARTICLE_ID' );?>" title="<?php echo JText::_( 'FILTER_BY_TITLE_OR_ENTER_ARTICLE_ID' );?>"/>
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
                <th width="1%" class="center"><?php echo JHTML::_('grid.sort',   'ID', 'c.'.$this->lists['fid'], $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
                <th width="1%" class="center"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th>
                <th class="title" width="20%"><?php echo JHTML::_('grid.sort',   'Title', 'c.'.$this->lists['ftitle'], $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
                <th ><?php echo JText::_('Main Content'); ?></th>
                <?php if (!empty($this->lists['fdate'])) : ?>
                    <th width="10%" class="hidden-phone"><?php echo JHTML::_('grid.sort',   'Date', 'c.'.$this->lists['fdate'], $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
                <?php endif; ?>
                <th width="5%" nowrap="nowrap"><?php
					if (!empty($this->lists['fstate'])) {
						echo JHTML::_('grid.sort',   'Published', 'c.'.$this->lists['fstate'], $this->lists['order_Dir'], $this->lists['order'] );
					} else echo JText::_( 'Published' );
					?>
                </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="6">
					<?php echo $this->page->getListFooter(); ?>
                </td>
            </tfoot>
            <tbody>	<?php
			$k = 0;
			for ($i=0, $n=count( $this->items ); $i < $n; $i++)
			{
				$row = &$this->items[$i];
				$checked 	= JHTML::_('grid.id', $i, $row->{$this->lists['fid']} );
				$editLink	= JRoute::_("index.php?option=com_joodb&task=editdata&view=editdata&joodbid=".$this->lists['joodbid']."&cid[]=".$row->{$this->lists['fid']});
				if ($this->lists['fstate']) {
					$row->published = $row->{$this->lists['fstate']};
					$published 	= JHtml::_('jgrid.published', $row->published, $i, 'data_', true);
				} else {
					$published	= '<i class="icon icon-ban-circle hasTooltip" title="'.JText::_('Not availiable').'"></i>';
				}
				?>
                <tr class="<?php echo "row$k"; ?>">
                    <td class="center"><?php echo $row->{$this->lists['fid']}; ?></td>
                    <td class="center"><?php echo $checked; ?></td>
                    <td><a href='<?php echo $editLink; ?>' class="hasTooltip" title="<?php echo jText::_("EDIT")." <b>".addslashes($row->{$this->lists['ftitle']})."</b>"; ?>" ><i class="icon-edit"></i> <?php  echo $row->{$this->lists['ftitle']}; ?></a></td>
                    <td><?php echo substr(strip_tags($row->{$this->lists['fcontent']}),0,180); ?> &hellip;</td>
	                <?php if (!empty($this->lists['fdate'])) : ?>
                        <td class="hidden-phone"><?php echo JHTML::_('date', $row->{$this->lists['fdate']} , JText::_('DATE_FORMAT_LC3')); ?></td>
	                <?php endif; ?>
                    <td class="hidden-phone center">
						<?php echo $published; ?>
                    </td>
                </tr>
				<?php
				$k = 1 - $k;
			}
			?>
            </tbody>
        </table>
        <input type="hidden" name="option" value="com_joodb" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="joodbid" value="<?php echo $this->lists['joodbid']; ?>" />
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="view" value="listdata" />
        <input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
		<?php echo JHTML::_( 'form.token' );?>
    </div>
</form>

