<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
?>
<div id="rssocial-<?php echo $module->id; ?>" class="rssocial-container<?php echo $moduleclass_sfx . ' ' . $container_classes; ?>">
	<?php if ($icon_floating != 'bottom') {?>
	
	<ul id="rssocial-ul-<?php echo $module->id; ?>" class="rssocial-<?php echo $mode . ' ' . $list_classes; ?>">
	<?php
	foreach ($socials as $social) {
		if ($params->get($social)) {
			require JModuleHelper::getLayoutPath('mod_rssocial', $social);
		}
	} ?>
	</ul>
<?php
	if ($params->get('icon_positioning') == 'floating') {
?>
	<?php if ($mode == 'sharing') { ?>
	<button id="rssocial-slide-button" class="rssocial-sharing-button rssocial-sharing-button-<?php echo $params->get('icon_float'); ?>
	rssocial-visible visible-phone" href="javascript:void(0);"><?php echo JText::_('MOD_RSSOCIAL_SOCIALS_TEXT'); ?></button>
	<?php } else { ?>
	<ul id="rssocial-slide-button" class="rssocial-icons <?php echo $theme . ' ' . $button_classes; ?> visible-phone" href="javascript:void(0);">
		<li>
			<a class="rssocial-link" href="javascript:void(0);"><span class="rssocial-icon rssocial-icon-more"><strong>+</strong></span></a>
		</li>
	</ul>
	<?php } ?>
<?php }
	} else { ?>
	<?php
		if ($params->get('icon_positioning') == 'floating') {
	?>
		<?php if ($mode == 'sharing') { ?>
		<button id="rssocial-slide-button" class="rssocial-sharing-button rssocial-sharing-button-<?php echo $params->get('icon_float'); ?>
		rssocial-visible visible-phone" href="javascript:void(0);"><?php echo JText::_('MOD_RSSOCIAL_SOCIALS_TEXT'); ?></button>
		<?php } else { ?>
		<ul id="rssocial-slide-button" class="rssocial-icons <?php echo $theme . ' ' . $button_classes; ?> visible-phone" href="javascript:void(0);">
			<li>
				<a class="rssocial-link" href="javascript:void(0);"><span class="rssocial-icon rssocial-icon-more"><strong>+</strong></span></a>
			</li>
		</ul>
		<div class="rssocial-clear"></div>
		<?php } ?>
	<?php } ?>
	<ul id="rssocial-ul-<?php echo $module->id; ?>" class="rssocial-<?php echo $mode . ' ' . $list_classes; ?>">
	<?php
	foreach ($socials as $social) {
		if ($params->get($social)) {
			require JModuleHelper::getLayoutPath('mod_rssocial', $social);
		}
	} ?>
	</ul>	
<?php } ?>
</div>
<div class="rssocial-clear"></div>
