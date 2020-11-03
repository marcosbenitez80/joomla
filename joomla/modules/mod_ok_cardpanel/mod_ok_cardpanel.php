<?php
/**
 * @package mod_ok_cardpanel - Ok Card Panel for Joomla! 3.6
 * @version 1.0.0
 * @author Alexander Green
 * @copyright (C) 2017- OrionKit. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
// no direct access
defined('_JEXEC') or die('Restricted access'); // no direct access
require_once __DIR__ . '/helper.php';
$item = modOk_cardpanelHelper::getItem($params);
require(JModuleHelper::getLayoutPath('mod_ok_cardpanel'));
require_once('helper.php');
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . '/modules/mod_ok_cardpanel/assets/css/style.css');
$document->addScript(JURI::base() . '/modules/mod_ok_cardpanel/assets/js/orionkit.js');
?>