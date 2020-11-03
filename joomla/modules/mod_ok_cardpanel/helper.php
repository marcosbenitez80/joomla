<?php
/**
 * @package mod_ok_cardpanel - Ok Card Panel for Joomla! 3.6
 * @version 1.0.0
 * @author Alexander Green
 * @copyright (C) 2017- OrionKit. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
// no direct access
defined('_JEXEC') or die('Restricted access');

class modOk_cardpanelHelper
{
    static public function getItem($params)
    {
        $css_class = $params->get('classname');
        return "";
    }
}

//animation attr
function cardAnimation($animation, $delay = '300', $trigger = '0')
{
    if (!empty($animation)) {
        $attr = '  data-ok-anim="' . $animation . '" data-ok-delay="' . $delay . '" data-ok-trg="' . $trigger . '"';
    } else {
        $attr = '';
    }
    return $attr;
}

//style of elements
function cardStyle($element)
{
    $value = (array)$element;
    $str = array();
    if (!empty($value['padding'])) // vertical padding if not empty/exist
    {
        $str[] = 'padding-top: ' . $value['padding'] . 'px;';
        $str[] = 'padding-bottom: ' . $value['padding'] . 'px;';
    }
    if (!empty($value['background_color'])) // bg color if not empty/exist
    {
        $str[] = 'background-color: ' . $value['background_color'] . ';';
        $str[] = 'border-color: ' . $value['background_color'] . ';';
    }
    if (!empty($value['font_color'])) //font color if not empty/exist
    {
        $str[] = 'color: ' . $value['font_color'] . ';';
    }
    if (!empty($value['font_size'])) // font size if not empty/exist
    {
        $str[] = 'font-size: ' . $value['font_size'] . ';';
    }
    if (!empty($value['img_position'])) // if position index exists
    {
        $img_position = 'background-position: center ' . $value['img_position'] . ';';
    } else {
        $img_position = 'background-position: center top;';
    }
    if (!empty($value['bg_type']))//check if there's type select
    {
        if ($value['bg_type'] == 'custom') {
            $bg_type = 1;
        } else {
            $bg_type = 0;
        }
    } else {
        $bg_type = 0;
    }

    if (!empty($value['image']) and $bg_type == 1) {
        $str[] = 'background-image: url(\'' . JURI::root(true) . $value['image'] . '\'); ' . $img_position;// custom image if not empty/exist it has priority
    } else {
        if (!empty($value['pattern'])) {
            if ($value['pattern'] !== '-1') {
                $str[] = 'background-image: url(\'' . JURI::root(true, 'modules/mod_ok_cardpanel/assets/images/patterns/') . $value['pattern'] . '\');';
            }
        }
    }
    $style = implode(" ", $str);//returns a string from the elements of an array
    if (!empty($style)) {
        return ' style="' . $style . '"';// makes style attribute
    }
}
