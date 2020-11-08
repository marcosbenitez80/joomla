<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * A simple item counter in catalog context
 *
 * Example {joodb count}
*/

global $jbcounter;
if (!isset($jbcounter)) $jbcounter = 0;
$jbcounter++;

$output .= (int) $jbcounter;