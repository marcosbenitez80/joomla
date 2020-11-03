<?php
/**
* @package		JooDatabase - http://joodb.feenders.de
* @copyright	Copyright (C) Computer - Daten - Netze : Feenders. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @author		Dirk Hoeschen (hoeschen@feenders.de)
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_joodb'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables/');

// Require the helper library
require_once( JPATH_COMPONENT_ADMINISTRATOR.'/helpers/joodb.php' );
JoodbAdminHelper::prepareDocument();

// get the controller
require_once (JPATH_COMPONENT.'/controller.php');
$controllerName = JFactory::getApplication()->input->getCmd('controller');
if(!empty($controllerName)) {
	require_once (JPATH_COMPONENT.'/controllers/'.$controllerName.'.php');
}

// creation of an object from class controller
// Create the controller
$classname	= 'JooDBController'.$controllerName;
$controller = new $classname(array('default_task' => 'display') );
$controller->registerTask('apply', 'save', 'unpublish','publish');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
