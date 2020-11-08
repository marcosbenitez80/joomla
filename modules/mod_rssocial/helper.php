<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');

class RSSocialHelper
{
	public static function hex2rgb($hex) {
		if (strlen($hex) == 4) {
			$hex = '#'.$hex[1].$hex[1].$hex[2].$hex[2].$hex[3].$hex[3];
		}
		list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
		return "$r, $g, $b";
	}
	
	public static function escape($string){
		return htmlentities($string, ENT_QUOTES, "UTF-8");
	}
	
	public static function getMailToURL(){
		require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';

		$template = JFactory::getApplication()->getTemplate();
		$link     = JUri::getInstance()->toString();
		$url      = 'index.php?option=com_mailto&tmpl=component&template=' . $template . '&link=' . MailToHelper::addLink($link);
		return $url;
	}
}