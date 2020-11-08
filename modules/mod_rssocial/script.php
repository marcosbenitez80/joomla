<?php
/**
 * @package    RSSocial!
 * @copyright  (c) 2014 - 2018 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

class mod_rssocialInstallerScript
{	
	public function postflight($type, $parent) {
		if ($type == 'uninstall') {
			return true;
		}
		
		$this->showInstallMessage();
	}
	
	
	protected function showInstallMessage($messages=array()) {
?>
	<style type="text/css">
	.version-history {
		margin: 0 0 2em 0;
		padding: 0;
		list-style-type: none;
	}
	.version-history > li {
		margin: 0 0 0.5em 0;
		padding: 0 0 0 4em;
	}

	.version,
	.version-new,
	.version-fixed,
	.version-upgraded {
		float: left;
		font-size: 0.8em;
		margin-left: -4.9em;
		width: 4.5em;
		color: white;
		text-align: center;
		font-weight: bold;
		text-transform: uppercase;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}

	.version-new {
		background: #7dc35b;
	}
	.version-fixed {
		background: #e9a130;
	}
	.version-upgraded {
		background: #61b3de;
	}

	.install-ok {
		background: #7dc35b;
		color: #fff;
		padding: 3px;
	}

	.install-not-ok {
		background: #E9452F;
		color: #fff;
		padding: 3px;
	}
	</style>
	<div class="row-fluid">
		<div class="span2">
			<?php echo JHtml::_('image', 'mod_rssocial/rssocial.png', 'RSSocial!', null, true); ?>
		</div>
		<div class="span10">
			<h3>RSSocial! v1.1.4 Changelog</h3>
			<ul class="version-history">
				<li><span class="version-upgraded">Upg</span> Google Plus was removed due to the fact that it will be shut down.</li>
			</ul>
			<a class="btn btn-primary btn-large" href="index.php?option=com_modules">Start using RSSocial!</a>
			<a class="btn" href="https://www.rsjoomla.com/support/documentation/rssocial.html" target="_blank">Read the RSSocial! User Guide</a>
			<a class="btn" href="https://www.rsjoomla.com/support.html" target="_blank">Get Support!</a>
		</div>
	</div>
		<?php
	}
}