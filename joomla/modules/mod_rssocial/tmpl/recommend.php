<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

$url = RSSocialHelper::getMailToURL();
if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-recommend-icon" class="rssocial-link <?php echo $icon_effect;?>" target="_blank" onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;" href="<?php echo $url; ?>">
			<span class="rssocial-icon rssocial-icon-lkdto"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-recommend-caption" target="_blank" onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;" href="<?php echo $url; ?>">
				<?php echo JText::_('MOD_RSSOCIAL_RECOMMEND_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php } ?>