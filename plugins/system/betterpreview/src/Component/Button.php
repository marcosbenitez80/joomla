<?php
/**
 * @package         Better Preview
 * @version         6.3.3
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2020 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Plugin\System\BetterPreview\Component;

defined('_JEXEC') or die;

/**
 ** Plugin that places the button
 */
class Button extends Helper
{
	function getExtraJavaScript($text)
	{
		return '';
	}
}
