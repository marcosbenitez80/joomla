<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-stumbleupon-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('stumbleupon_url'); ?>">
			<span class="rssocial-icon rssocial-icon-stumbleupon"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-stumbleupon-caption" target="_blank" href="<?php echo $params->get('stumbleupon_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_STUMBLEUPON_TEXT'); ?>
			</a>
		</div>
		<?php } ?>
	</li>
<?php
} else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-stumbleupon-<?php
		if ($params->get('stumbleupon_style') == '6') {
			echo 'nocounter-';
		} else {
			echo 'counter-';
			if ($params->get('stumbleupon_style') == '5') {
				echo 'vertical-';
			} else {
				echo 'horizontal-';
			}
		}
		echo $sharing_alignment; ?>">
		<!-- Place this tag where you want the su badge to render -->
		<su:badge layout="<?php echo $params->get('stumbleupon_style'); ?>"></su:badge>
		<!-- Place this snippet wherever appropriate -->
	</li>
	<script type="text/javascript">	
	  (function() {
		var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
		li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
	  })();
	</script>
<?php } ?>