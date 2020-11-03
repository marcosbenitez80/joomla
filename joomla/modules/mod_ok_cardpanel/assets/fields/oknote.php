<?php
/**
 * @package mod_ok_cardpanel - Ok Card Panel for Joomla! 3.6
 * @version 1.0.0
 * @author Alexander Green
 * @copyright (C) 2017- OrionKit. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
// no direct access
defined('JPATH_PLATFORM') or die;
jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Platform.
 * Display a JSON loaded window with a Oknote set of sub fields
 *
 * @since  3.2
 */
class JFormFieldOknote extends JFormField
{
    /**
     * The form field type.
     *
     * @var    string
     * @since  3.2
     */
    protected $type = 'Oknote';

    /**
     * Method to get the field input markup.
     *
     * @return  string  The field input markup.
     *
     * @since   3.2
     */
    public function getLabel()
    {
        return '<span>' . parent::getLabel() . '</span>';
    }

    protected function getInput()
    {
//        Add files
        $assets_path = 'modules/mod_ok_cardpanel/assets/';
        JHTML::_('stylesheet', $assets_path . 'css/admin.css');
        JHtml::_('script', $assets_path . 'js/admin.js');
        JHtml::_('script', $assets_path . 'js/jquery-gentleSelect.js');
        // Add scripts
        JHtml::_('bootstrap.framework');
//        JHtml::_('script', 'system/repeatable.js', true, true);

        // build a main container
        $str = array();
        $str[] = '<div class="ok-note-accordion" id="id_' . $this->element['name'] . '">';
        $str[] = '<div class="accordion-group ' . $this->element['class'] . '">';
        $str[] = '<div class="accordion-heading ">';
        $str[] = '<a class="accordion-toggle" data-toggle="collapse" data-parent="id_' . $this->element['name'] . '" href="#' . $this->element['name'] . '">';
        $str[] = '<i class="fa fa-plus-circle"></i>';
        $str[] = '<span style="font-size: 14px">Click to read a Note</span>';
        $str[] = '</a>';
        $str[] = '</div>';
        $str[] = '<div id="' . $this->element['name'] . '" class="accordion-body collapse">';
        $str[] = '<div class="accordion-inner">';
        $str[] = JText::_($this->element['description']);
        $str[] = '<div><br /><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#' . $this->element['name'] . '">Close</button></div>';
        $str[] = '</div>';
        $str[] = '</div>';
        $str[] = '</div>';
        $str[] = '</div>';
        return implode("\n", $str);
    }
}
