<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-tumblr-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('tumblr_url'); ?>">
			<span class="rssocial-icon rssocial-icon-tumblr"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-tumblr-caption" target="_blank" href="<?php echo $params->get('tumblr_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_TUMBLR_TEXT'); ?>
			</a>
		</div>
		<?php } ?>	
	</li>
<?php } else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-tumblr-counter<?php echo '-' . $sharing_alignment; ?>">
		<a href="https://www.tumblr.com/share" style="display:inline-block; text-indent:-9999px; overflow:hidden; <?php echo $tumblr_style; ?> top left no-repeat transparent;"></a>
	</li>
<?php } ?>