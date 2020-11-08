<?php

// no direct access
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();
JHTML::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

?>
<div id="header-box" class="single" style="padding: 0 10px;">
    <div class="header">
        <h1 class="page-title"><?php echo JHtml::_('string.truncate', $app->JComponentTitle, 0, false, false); ?></h1>
    </div>
    <div class="subhead" id="toolbar-box">
        <div class="continer-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $this->bar->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
