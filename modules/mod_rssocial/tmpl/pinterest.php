<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-pinterest-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('pinterest_url'); ?>">
			<span class="rssocial-icon rssocial-icon-pinterest"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-pinterest-caption" target="_blank" href="<?php echo $params->get('pinterest_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_PINTEREST_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php
} else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-pinterest-<?php echo $params->get('pinterest_size'); ?>-counter-<?php echo $params->get('pinterest_counter') . '-' . $sharing_alignment; ?>">
		<a href="//www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode($current_url); ?>&media=<?php echo rawurlencode($pinterest_image); ?>&description=<?php echo rawurlencode($pinterest_description); ?>" data-pin-do="buttonPin" data-pin-config="<?php echo $params->get('pinterest_counter'); ?>" data-pin-height="<?php echo $params->get('pinterest_size'); ?>"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_<?php echo $params->get('pinterest_size'); ?>.png" /></a>
		<!-- Please call pinit.js only once per page -->
	</li>
	<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
<?php } ?>