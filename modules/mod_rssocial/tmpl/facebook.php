<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-facebook-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('facebook_url'); ?>">
			<span class="rssocial-icon rssocial-icon-facebook"></span>
		</a>
		<?php if($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a target="_blank" href="<?php echo $params->get('facebook_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_FACEBOOK_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php
} else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-facebook-container-<?php echo $sharing_alignment; ?>">
		<iframe src="<?php echo $facebook_url; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $facebook_width; ?>px; height:<?php echo $facebook_height; ?>px;" allowTransparency="true"></iframe>
	</li>
<?php } ?>