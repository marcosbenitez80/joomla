<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-instagram-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('instagram_url'); ?>">
			<span class="rssocial-icon rssocial-icon-instagram"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-instagram-caption" target="_blank" href="<?php echo $params->get('instagram_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_INSTAGRAM_TEXT'); ?>
			</a>
		</div>
		<?php } ?>	
	</li>
<?php } ?>