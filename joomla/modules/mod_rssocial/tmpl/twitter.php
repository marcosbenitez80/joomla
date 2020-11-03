<?php
/**
* @package RSSocial!
* @copyright (C) 2014 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

if ($params->get('mode') == 'icons') { ?>
	<li>
		<a id="rssocial-twitter-icon" class="rssocial-link <?php echo $icon_effect; ?>" target="_blank" href="<?php echo $params->get('twitter_url'); ?>">
			<span class="rssocial-icon rssocial-icon-twitter"></span>
		</a>
		<?php if ($params->get('caption')) { ?>
		<div class="rssocial-caption">
			<a id="rssocial-twitter-caption" target="_blank" href="<?php echo $params->get('twitter_url'); ?>">
				<?php echo JText::_('MOD_RSSOCIAL_TWITTER_TEXT'); ?>
			</a>
		</div>
		<?php } ?>	
	</li>
<?php
} else { ?>
	<li id="rssocial-sharing-button" class="rssocial-sharing-twitter-counter-<?php echo $params->get("tweet_counter"); echo '-' . $sharing_alignment; ?>">
		<a href="//twitter.com/share" class="twitter-share-button" data-url="<?php echo $current_url; ?>" data-count="<?php echo $params->get("tweet_counter"); ?>" data-lang="<?php echo $language; ?>">Tweet</a>
		<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
	</li>
<?php } ?>