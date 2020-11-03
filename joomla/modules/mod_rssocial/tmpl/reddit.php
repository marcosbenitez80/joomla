<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-reddit-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('reddit_url'); ?>">
			<span class="rssocial-icon rssocial-icon-reddit"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-reddit-caption" target="_blank" href="<?php echo $params->get('reddit_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_REDDIT_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php
} else {?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-reddit-counter-<?php
	if ($params->get('reddit_style') == '4') {
			echo 'vertical';
		} else {
			echo 'horizontal';
		}
		echo '-' . $sharing_alignment; ?>">
		<?php echo $reddit_style; ?>
	</li>
<?php } ?>