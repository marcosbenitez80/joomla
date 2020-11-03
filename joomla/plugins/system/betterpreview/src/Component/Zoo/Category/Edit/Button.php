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

namespace RegularLabs\Plugin\System\BetterPreview\Component\Zoo\Category\Edit;

defined('_JEXEC') or die;

use Joomla\CMS\Factory as JFactory;
use RegularLabs\Plugin\System\BetterPreview\Component\Button as Main_Button;

class Button extends Main_Button
{
	function getURL($name)
	{
		$id = JFactory::getApplication()->input->get('cid', [0], 'array');
		$id = (int) $id[0];

		if ( ! $id)
		{
			return false;
		}

		require_once JPATH_ADMINISTRATOR . '/components/com_zoo/config.php';

		$zoo = \App::getInstance('zoo');

		$item = $zoo->table->category->get($id);

		return $zoo->route->category($item, 0);
	}
}
