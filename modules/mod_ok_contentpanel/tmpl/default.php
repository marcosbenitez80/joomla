<?php
/**
 * @package mod_ok_contentpanel - mogule for Joomla! 3.0 and newer
 * @version 1.0.0
 * @author Alexander Green
 * @copyright (C) 2018- OrionKit. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;
$config = (array)$params->get('config');
$image_default = '/modules/mod_ok_contentpanel/assets/images/default.jpg';
$activator = '';
$activator_img = '';
$reveal = '';
$card_style = '';
$match_cards = ' ok-match-panel';
//default image
if (!empty($params->get('image'))) {
    $image_default = JURI::base() . $params->get('image');
}
//reveal options
if ($params->get('card_style') == 2) {
    $activator_img = '  class="okm-activator"';
    $activator = ' okm-activator';
    $reveal = ' <img class="okm-right" src="/modules/mod_ok_contentpanel/assets/images/cursor.png">';
}
//grid style-defines width style
$card_nomber = 0;
$card_margin = '';
foreach ($list as $item) {
    $card_nomber++;
}
//if vertical layouts
if ($params->get('grid_layout') == 2) {
    $card_nomber = 1;
    $match_cards = '';
    $card_margin = 'margin-bottom: 1rem;';
}
//card style
$okcs_str = array();
if (!empty($params->get('font_size'))) // bg color if not empty/exist
{
    $okcs_str[] = 'font-size: ' . $params->get('font_size') . ';';
}
if (!empty($params->get('background_color'))) // bfont-size
{
    $okcs_str[] = 'background-color: ' . $params->get('background_color') . ';';
}
if (!empty($params->get('font_color'))) //font color if not empty/exist
{
    $okcs_str[] = 'color: ' . $params->get('font_color') . ';';
}
    $okcs_str[] = $card_margin;
$okcs_style = implode(" ", $okcs_str); //returns a string from the elements of an array
if (!empty($okcs_style)) {
    $card_style = ' style="' . $okcs_style . '"'; // makes style attribute
}
// min image height to avoit zero height(via empty for save updates)
$min_height = 80;
if (!empty($params->get('pic_min'))) {
    $min_height = $params->get('pic_min');    
}
//match cards tags
if ($params->get('match_images') =='okm-image-match') {
    $mach_tag_open = '<div class="ok-match-cards">';
    $mach_tag_close = '</div>';
} else {
    $mach_tag_open = '';
    $mach_tag_close = '';
}
?>
<div class="uk-grid <?php echo $params->get('match_images'); ?>">
    <?php foreach ($list as $item) : ?>
        <?php
        $image_j = json_decode($item->images);
        $images_data = (array)$image_j;
        //image source or default----
        if (!empty($images_data)) {
            if ($params->get('img_source') == 1) {
                $image_source = $images_data['image_intro'];
            } else {
                $image_source = $images_data['image_fulltext'];
            }
        }
        if (!empty($image_source)) {
            $image = JURI::base() . $image_source;
        }else{
            $image = $image_default;
        }
        //title limit
        $title = substr($item->title, 0, $params->get('title_limit'));
       $title = rtrim($title, "!,.-");
       // $title = substr($title, 0, strrpos($title, ' ')) . ' ...';
        ?>
        <div class="uk-width-medium-1-<?php echo $card_nomber; ?>">
            <div class="okm-card<?php echo $params->get('shadow'); ?>"<?php echo $card_style; ?>>
                <?php echo $mach_tag_open; ?>
                    <?php // image block------ ?>
                    <?php if (!empty($params->get('use_img'))): ?>
                        <?php if ($params->get('card_style') !== '2') echo '<a href="' . $item->link . '" target="' . $params->get('target') . '">'; ?>
                        <div class="okm-card-image" style="min-height: <?php echo $min_height; ?>px;">
                            <img<?php echo $activator_img; ?> src="<?php echo $image; ?>">
                            <?php if ($params->get('card_style') !== '2' and $params->get('title_position') == 2): ?>
                                <div class="okm-overlay"></div>
                                <?php if (!empty($params->get('show_title'))): ?>
                                <h3 class="okm-card-title<?php echo $activator; ?>"><?php echo $title . $reveal; ?></h3>
                            <?php endif ?>
                            <?php endif; ?>
                        </div>
                        <?php if ($params->get('card_style') !== '2') echo '</a>'; ?>
                    <?php endif ?>
                    <?php // content block------ ?>
                    <?php if ($params->get('show_introtext') or !empty($params->get('show_title'))) : ?>
                    <?php endif ?>
                    <div class="okm-card-content">
                        <?php if ($params->get('card_style') !== '2'): ?>
                            <?php if ($params->get('card_style') == 2 or $params->get('title_position') == 1): ?>
                            <?php if (!empty($params->get('show_title'))): ?>
                                <h3 class="okm-card-title<?php echo $activator; ?>"><?php echo $title . $reveal; ?></h3>
                            <?php endif ?>
                        <?php endif; ?>
                            <?php if ($item->displayDate or $item->displayCategoryTitle or $params->get('show_author') or $item->displayHits): ?>
                            <div class="ok-details">     
                        <?php if ($params->get('show_author')) : ?>
                            <span class="mod-articles-category-writtenby">
                                <?php echo $item->displayAuthorName; ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($item->displayCategoryTitle) : ?>
                            <span class="mod-articles-category-category">
                                (<?php echo $item->displayCategoryTitle; ?>)
                            </span>
                        <?php endif; ?>
                        <?php if ($item->displayDate) : ?>
                            <span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
                        <?php endif; ?>
                        <?php if ($item->displayHits) : ?>
                            <span class="mod-articles-category-hits">
                                (<?php echo $item->displayHits; ?>)
                            </span>
                        <?php endif; ?>
                        </div> 
                        <?php endif ?>
                        <?php endif ?>
                        <?php if ($params->get('card_style') !== '2' and !empty($params->get('show_introtext'))): ?>
                            <p class="okm-mod-articles-category-introtext">
                                <?php echo $item->displayIntrotext; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php echo $mach_tag_close; ?>
                    <?php // reveal block------ ?>
                    <?php if ($params->get('card_style') == 2): ?>
                        <div class="okm-card-reveal"<?php echo $card_style; ?>>
                            <?php if (!empty($params->get('show_title'))): ?>
                                <h3 class="okm-card-title<?php echo $activator; ?>"><?php echo $title . $reveal; ?></h3>
                        <?php endif ?>
                        <span><img class="okm-right-close" src="/modules/mod_ok_contentpanel/assets/images/close.png"></span>
                        <?php if ($item->displayDate or $item->displayCategoryTitle or $params->get('show_author') or $item->displayHits): ?>
                            <div class="ok-details">     
                        <?php if ($params->get('show_author')) : ?>
                            <span class="mod-articles-category-writtenby">
                                <?php echo $item->displayAuthorName; ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($item->displayCategoryTitle) : ?>
                            <span class="mod-articles-category-category">
                                (<?php echo $item->displayCategoryTitle; ?>)
                            </span>
                        <?php endif; ?>
                        <?php if ($item->displayDate) : ?>
                            <span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
                        <?php endif; ?>
                        <?php if ($item->displayHits) : ?>
                            <span class="mod-articles-category-hits">
                                (<?php echo $item->displayHits; ?>)
                            </span>
                        <?php endif; ?>
                        </div> 
                        <?php endif ?>
                        <p><?php echo $item->displayIntrotext; ?></p>
                        <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('target'); ?>" style="color: <?php echo $params->get('link_color'); ?>"><?php echo $params->get('link_text'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php // read more block------ ?>
                    <?php if (!empty($params->get('show_readmore'))): ?>
                    <div class="okm-card-action">
                        <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('target'); ?>"
                           style="color: <?php echo $params->get('link_color'); ?>"><?php echo $params->get('link_text'); ?></a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>