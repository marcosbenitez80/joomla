<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-linkedin-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('linkedin_url'); ?>">
			<span class="rssocial-icon rssocial-icon-linkedin"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-linkedin-caption" target="_blank" href="<?php echo $params->get('linkedin_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_LINKEDIN_TEXT'); ?>
			</a>
		</div>
		<?php } ?>	
	</li>
<?php
} else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-linkedin-counter-<?php echo $params->get('linkedin_counter'); ?>-<?php echo $sharing_alignment; ?>">	
		<script src="//platform.linkedin.com/in.js" type="text/javascript">
			lang:<?php echo $language; ?></script>
		<script type="IN/Share"
			data-url="<?php echo $current_url; ?>"
			data-counter="<?php echo $params->get('linkedin_counter'); ?>">
		</script>
	</li>
<?php } ?>