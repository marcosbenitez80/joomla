<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$output = "<div class='pagination alphabox'><ul>";
$alphabet= array ('a','b','c','d');
$alpha = JFactory::getApplication()->input->get('letter');
foreach ($alphabet as $achar) {
	if ($achar==$alpha) {
		$output .= "<li class='active'><span>".ucfirst($achar)."</span></li>";
	} else {
		$output .= "<li><a href='".JoodbHelper::_findItem($joobase,"&letter=".$achar)."'>".ucfirst($achar)."</a></li>";
	}
}
$output .=  "<li><a href='Javascript:submitSearch(\"reset\");void(0);'>&raquo;".JText::_('All')."</a></li></ul></div>";

