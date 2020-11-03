<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$socials = array(
	'facebook',
	'twitter',
	'youtube',
	'linkedin',
	'lastfm',
	'pinterest',
	'soundcloud',
	'tumblr',
	'flickr',
	'github',
	'vimeo',
	'digg',
	'skype',
	'instagram',
	'rss',
	'stumbleupon',
	'reddit',
	'mail',
	'recommend'
);

$document 					= JFactory::getDocument();
$app						= JFactory::getApplication();
$moduleclass_sfx			= htmlspecialchars($params->get('moduleclass_sfx'));
$container_classes			= '';
$list_classes				= '';
$icons_number				= 0;
$icon_font_color			= RSSocialHelper::hex2rgb($params->get('icon_font_color'));
$icon_background_color		= RSSocialHelper::hex2rgb($params->get('icon_background_color'));
$icon_effect				= '';
$caption_font_color			= RSSocialHelper::hex2rgb($params->get('caption_font_color'));
$caption_background_color	= RSSocialHelper::hex2rgb($params->get('caption_background_color'));
$theme						= '';
$background					= false;
$language					= str_replace('-', '_', JFactory::getLanguage()->getTag());
$current_url				= JUri::getInstance()->toString();
$icon_floating 				= $params->get('icon_float');
$mode						= $params->get('mode');
$button_classes				= '';	// Classes of "more" button
$sharing_alignment			= 'left';

// Get type of socials (icons / sharing buttons)
$mode == 'icons' ? $container_classes = 'rssocial-icons ' : $container_classes = 'rssocial-sharing ';

if ($params->get('icon_theme') == 'nobg' && $mode == 'icons') {
	$theme .= 'rssocial-icons-nobg';
} else if ($mode == 'icons') {
	$theme .= 'rssocial-icons-bg';
	$background = true;
	if ($params->get('icon_theme') != 'bg') {
		$theme .= ' rssocial-icons-' . $params->get('icon_theme');
	}
}
if ($params->get('icon_positioning') == 'inline') {
	$container_classes .= 'rssocial-inline ';
	$container_classes .= 'rssocial-' . $params->get('icon_alignment') . ' ';
	if($params->get('icon_alignment') == 'right') {
		$sharing_alignment = 'right';
	}
} else {
	if ($icon_floating == 'top' || $icon_floating == 'bottom') {
		$container_classes .= 'rssocial-inline ';
	}
	$button_classes .= $theme . '-button-' . $icon_floating;
	if ($mode == 'sharing') {
		$list_classes .= 'rssocial-' . $icon_floating . '-background ';
	} else {
		$list_classes .= 'rssocial-' . $mode . '-' . $icon_floating . ' ';
	}
	$container_classes .= 'rssocial-floating-' . $icon_floating . ' ';
	if ($params->get('icon_fixed') || ($icon_floating == 'bottom')) {
		$container_classes .= 'rssocial-fixed ';
	} else {
		$container_classes .= 'rssocial-absolute ';
	}
}

($mode == 'icons') ? $container_classes .= 'rssocial-icons-bottom-spacing ' : $container_classes .= ' ';

$list_classes .= $theme;

// Get the number of enabled icons
foreach ($socials as $social) {
	if ($params->get($social)) {
		$icons_number += 1;
	}
}

//Set icons effect
if ($theme == 'rssocial-icons-bg rssocial-icons-circle' && $params->get('icon_effect') == 'trim') {
	$icon_effect = 'round-trim';
} else {
	$icon_effect = $params->get('icon_effect');
}

// Facebook parameters
$facebook_width		= $params->get('facebook_width');
$facebook_height	= $params->get('facebook_height');

// Set facebook sharing container width
$document->addStyleDeclaration('.rssocial-sharing-facebook-container-' . $sharing_alignment . '{ width: ' . $facebook_width . 'px; height: ' . $facebook_height . 'px; }');

$facebook_args = array(
	'locale'			=> $language,
	'href'				=> $current_url,
	'layout'			=> $params->get('facebook_like_type'),
	'action'			=> $params->get('facebook_like_action'),
	'show_faces'		=> $params->get('facebook_like_show_faces') ? 'true' : 'false',
	'share'				=> $params->get('facebook_share_button') ? 'true' : 'false',
	'font'				=> $params->get('facebook_like_font'),
);
$facebook_url = 'https://www.facebook.com/plugins/like.php?' . http_build_query($facebook_args, '', '&amp;');

// Pinterest parameters
$pinterest_image		= '';
$pinterest_description	= '';
if ($params->get('pinterest_static_image')) {
	$pinterest_image = $params->get('pinterest_image');
} else {
	if ($app->input->getCmd('option') == 'com_content') {
		$article = JTable::getInstance('content');
		if ($article->load($app->input->getInt('id'))) {
			$text = $article->get('introtext');
			if (preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $text, $matches)) {
				$pinterest_image = JUri::root() . $matches[1];
			}
		}
	}
}
if ($params->get('pinterest_static_description') && $params->get('pinterest_description')) {
	$pinterest_description = $params->get('pinterest_description');
} else {
	$headData = $document->getHeadData();
	$pinterest_description = $headData['description'];
}

// Tumblr parameters
if ($params->get('tumblr_style') == '1') {
	$tumblr_style = 'height:20px; width:81px; background:url(\'https://platform.tumblr.com/v1/share_1.png\')';
} else if ($params->get('tumblr_style') == '2') { 
	$tumblr_style = 'height:20px; width:81px; background:url(\'https://platform.tumblr.com/v1/share_1T.png\')';
} else if ($params->get('tumblr_style') == '3') { 
	$tumblr_style = 'height:20px; width:63px; background:url(\'https://platform.tumblr.com/v1/share_2.png\')';
} else if ($params->get('tumblr_style') == '4') { 
	$tumblr_style = 'height:20px; width:63px; background:url(\'https://platform.tumblr.com/v1/share_2T.png\')';
} else if ($params->get('tumblr_style') == '5') { 
	$tumblr_style = 'height:20px; width:129px; background:url(\'https://platform.tumblr.com/v1/share_3.png\')';
} else if ($params->get('tumblr_style') == '6') { 
	$tumblr_style = 'height:20px; width:129px; background:url(\'https://platform.tumblr.com/v1/share_3T.png\')';
} else if ($params->get('tumblr_style') == '7') {
	$tumblr_style = 'height:20px; width:20px; background:url(\'https://platform.tumblr.com/v1/share_4.png\')';
} else {
	$tumblr_style = 'height:20px; width:20px; background:url(\'https://platform.tumblr.com/v1/share_4T.png\')';
}

// Reddit parameters
if ($params->get('reddit_style') == '1') {
	$reddit_style = '<a href="http://www.reddit.com/submit" onclick="window.location = \'http://www.reddit.com/submit?url=\' + encodeURIComponent(window.location); return false"> <img src="https://www.reddit.com/static/spreddit1.gif" alt="submit to reddit" border="0" /> </a>';
} else if ($params->get("reddit_style") == '2') {
	$reddit_style = '<a href="http://www.reddit.com/submit" onclick="window.location = \'http://www.reddit.com/submit?url=\' + encodeURIComponent(window.location); return false"> <img src="https://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>';
} else if ($params->get("reddit_style") == '3') {
	$reddit_style = '<script type="text/javascript" src="https://www.reddit.com/static/button/button1.js"></script>';
} else {
	$reddit_style = '<script type="text/javascript" src="https://www.reddit.com/static/button/button2.js"></script>';
}

// Set equal width for all caption fields
$document->addScriptDeclaration("RSSocial.captionEqualWidth();");

// Slide-in floating social icons
$document->addScriptDeclaration("RSSocial.showOnClick('{$params->get('icon_positioning')}', '$icon_floating', '{$module->id}', '$mode', '{$params->get('icon_fixed')}', '{$params->get('caption')}', '$icons_number');");

// Set social list width
if (!($params->get('icon_positioning') == 'floating' && ($icon_floating == 'top' || $icon_floating == 'bottom'))) {
	$document->addScriptDeclaration("RSSocial.setListWidth('{$module->id}', '{$params->get('caption')}');");
}

// Set icons font size
$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons li { font-size: ' . $params->get('icon_size') . 'px; }');

// Set captions font size
$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-caption a { font-size: ' . $params->get('caption_size') . 'px; }');

// Resize icons list
$document->addScriptDeclaration("RSSocial.floatingResize('{$module->id}', '{$params->get('icon_positioning')}', '$icon_floating');");

// Set social icons font color, background color and transparency
if ($background) {
	$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons-bg .rssocial-link { color: rgb(' . $icon_font_color . '); }');
	$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons-bg .rssocial-link { background-color: rgba(' . $icon_background_color . ', ' . (float)$params->get('icon_transparency') . '); }');
	$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons-bg .rssocial-link:hover { background-color: rgba(' . $icon_background_color . ', ' . (float)$params->get('icon_transparency_hover') . '); }');
} else {
	$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons-nobg .rssocial-link { color: rgba(' . $icon_font_color . ', ' . (float)$params->get('icon_transparency') . '); }');
	$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons-nobg .rssocial-link:hover { color: rgba(' . $icon_font_color . ', ' . (float)$params->get('icon_transparency_hover') . '); }');
}

// Set captions font color, background color and transparency
$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons .rssocial-caption a { color: rgb(' . $caption_font_color . '); }');
$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons .rssocial-caption { background-color: rgba(' . $caption_background_color . ', ' . (float)$params->get('caption_transparency') . '); }');
$document->addStyleDeclaration('#rssocial-' . $module->id . ' .rssocial-icons .rssocial-caption:hover { background-color: rgba(' . $caption_background_color . ', ' . (float)$params->get('caption_transparency_hover') . '); }');

// Put icons container to html document body
if ($params->get('icon_positioning') == 'floating') {
	$document->addScriptDeclaration("RSSocial.moveToBody('{$module->id}');");
}

JHtml::_('jquery.framework');
JHtml::stylesheet('mod_rssocial/rssocial.css', array('version' => 'auto', 'relative' => true));
JHtml::stylesheet('mod_rssocial/rssocial-anim.css', array('version' => 'auto', 'relative' => true));
JHtml::stylesheet('mod_rssocial/rssocial-font.css', array('version' => 'auto', 'relative' => true));
JHtml::script('mod_rssocial/rssocial.js', array('version' => 'auto', 'relative' => true));

require JModuleHelper::getLayoutPath('mod_rssocial');