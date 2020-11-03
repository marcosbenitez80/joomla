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
// variables to avoid Arbitrary expression in empty function for old php versions
$caption         = (array)$params->get('caption');
$container_width = $params->get('container_width');
//add container
if (!empty($container_width)) {
    $container_style = ' style="width: ' . $container_width . 'px;"';
} else {
    $container_style = '';
}
if ($params->get('container') == 2) {
    $ok_div_open  = '<div class="uk-container uk-container-center"' . $container_style . '>';
    $ok_div_close = '</div>';
} else {
    $ok_div_open  = '';
    $ok_div_close = '';
}
// grid class
$i = 0;
foreach ($params->get('card') as $item) {
    $i++;
}
if ($params->get('layout') == '1') {
    $ok_card_width = 'uk-width-medium-1-' . $i;
    $ok_card_match = ' ok-match-panel';
} else {
    $ok_card_width = 'uk-width-medium-1-1';
    $ok_card_match = '';
}
//figure style 
if ($params->get('image_height') !== '0') {
    $ok_card_height = ' height: ' . $params->get('image_height') . 'px;';
} else {
    $ok_card_height = '';
}
if ($params->get('card_style') == 'ok-effect-circle') {
    $ok_card_topcolor = ' background-color: ' . $params->get('figure_background_color') . ';';
} else {
    $ok_card_topcolor = '';
}
//----------
if (!empty($ok_card_height) or !empty($ok_card_topcolor)) {
    $ok_figure_style = ' style="' . $ok_card_height . $ok_card_topcolor . '"';
} else {
    $ok_figure_style = '';
}
// capture and panel style classes
if ($caption['style_arrow'] == 'ok-cp-caption-down') {
    $ok_caption_class = 'ok-cp-caption-down';
    $ok_panel_class   = 'ok-card3-panel';
} elseif ($caption['style_arrow'] == 'ok-cp-caption-up') {
    $ok_caption_class = 'ok-cp-caption';
    $ok_panel_class   = 'ok-card3-panel-up';
} else {
    $ok_caption_class = 'ok-cp-caption';
    $ok_panel_class   = 'ok-card3-panel';
}
//target global
$target = '';
if (!empty($params->get('target'))) {
  $target = ' target="_blank"';
}
?>
<?php
//caption section
if ($params->get('use_caption') == 1) {
    echo '<div  class="' . $ok_caption_class . '"' . cardStyle($params->get('caption')) . '>';
    echo $ok_div_open;
    echo '<h3 class="ok-animation"' . cardAnimation($caption['animation_title'], 300) . '>' . $caption['title'] . '</h3>';
    echo '<p class="ok-animation"' . cardAnimation($caption['animation_text'], 600) . '>' . $caption['text'] . '</p>';
    echo $ok_div_close;
    echo '</div>';
}
?>
<div class="<?php echo $ok_panel_class; ?> " <?php echo cardStyle($params->get('panel')) ?>>
    <?php echo $ok_div_open ?>
    <div class="uk-grid<?php echo $ok_card_match; ?> ">
        <?php foreach ($params->get('card') as $item) : ?>
        <?php
           //  links
            if ($item->link_type == 'menu') {
                $link            = JRoute::_("index.php?Itemid={$item->mymenuitem}");
                $ok_card_padding = ' style="padding-bottom: 53px;"';
            } elseif ($item->link_type == 'url') {
                $link            = $item->link;
                $ok_card_padding = ' style="padding-bottom: 53px;"';
            } else {
                $link            = '';
                $ok_card_padding = '';
            }
        ?>
            <div class="<?php echo $ok_card_width; ?>">
                <div
                    class="ok-card3 okcp-animation <?php echo $params->get('text_align') . $params->get('shadow'); ?>"<?php echo cardAnimation($item->animation, $item->delay, $params->get('trigger')); ?>
                    style="background-color: <?php echo $params->get('background_color'); ?>; color: <?php echo $params->get('font_color'); ?>;
                    <?php if ($params->get('layout') == 2) {
                        echo 'margin-bottom:' . $params->get('bottom_margin') . 'px;';
                    } ?> ">
                    <?php if ($item->image != null): ?>
                        <?php if (!empty($link)) echo '<a href="' . $link . '"' . $target . '>'; ?>
                        <figure class="<?php echo $params->get('card_style') ?>" <?php echo $ok_figure_style; ?>>
                            <img src="<?php echo JURI::base() . $item->image; ?>"
                                 alt="<?php echo $item->title ?>"/>
                            <figcaption>
                                <?php if (!empty($item->title)): ?>
                                    <h3 class="<?php echo $params->get('title_wrapper'); ?>"><?php echo $item->title; ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($item->subtitle)): ?>
                                    <p class="<?php echo $params->get('subtitle_wrapper'); ?>"><?php echo $item->subtitle; ?></p>
                                <?php endif; ?>
                            </figcaption>
                        </figure>
                        <?php if (!empty($link)) echo '</a>'; ?>
                        <div class="ok-clearfix"></div>
                    <?php endif; ?>
                    <?php if (!empty($item->text) or !empty($link)): ?>
                        <div class="ok-card3-content"<?php echo $ok_card_padding; ?>>
                            <?php if (!empty($item->text)): ?>
                                <div class="ok-card3-text">
                                    <?php echo $item->text; ?>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($link)): ?>
                                <div class="ok-card3-link">
                                    <a href="<?php echo $link; ?>"<?php echo $target; ?> class="btn"
                                       style="background-color: <?php echo $params->get('button_color'); ?>; color: <?php echo $params->get('button_link_color'); ?>;"><?php echo $item->link_text; ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php echo $ok_div_close; ?>
</div>
