<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-mail-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="mailto:<?php echo RSSocialHelper::escape($params->get('mail_url')); ?>">
			<span class="rssocial-icon rssocial-icon-mail"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-mail-caption" target="_blank" href="mailto:<?php echo RSSocialHelper::escape($params->get('mail_url')); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_MAIL_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php } ?>