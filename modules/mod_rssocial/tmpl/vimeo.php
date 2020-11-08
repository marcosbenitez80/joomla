<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-vimeo-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('vimeo_url'); ?>">
			<span class="rssocial-icon rssocial-icon-vimeo"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-vimeo-caption" target="_blank" href="<?php echo $params->get('vimeo_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_VIMEO_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php } ?>