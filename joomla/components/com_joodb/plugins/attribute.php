<?php
defined('_JEXEC') or die('Restricted access');

$attribs = array ('Hunde','Katzen','Pferde','Undsoweiter');
$search = JFactory::getApplication()->input->get('search');

$output .=  '<select class="inputbox" id="asearch" name="search" onchange="this.form.submit();">';
$output .=  '<option value="">Bitte wählen ...</option>';
foreach ($attribs AS $a) $output .=  '<option '.(($a==$search) ? 'selected' : '').'>'.$a.'</option>';
$output .=  '</select>';

