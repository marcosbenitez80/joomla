<?php

/**
 * @author Dirk Hoeschen, http://joodb.feenders.de
 * @email service@feenders.de
 * @version $Id$
 * @package Xmap
 * @license GNU/GPL
 * @description Xmap plugin for JooDatabase Component.
 */

/** Get menuentries for catalogue view and  print entries */
class xmap_com_joodb {

    static private $_initialized = false;

    /**
     * This function is called before a menu item is printed. We use it to set the
     * proper uniqueid for the item
     *
     * @param object  Menu item to be "prepared"
     * @param array   The extension params
     *
     * @return void
     * @since  1.2
     */
    static function prepareMenuItem($node, &$params)
    {
    	$link_query = parse_url($node->link);
    	if (!isset($link_query['query'])) {
    		return;
    	}
    
    	parse_str(html_entity_decode($link_query['query']), $link_vars);
    	$view = JArrayHelper::getValue($link_vars, 'view', '');
    	$layout = JArrayHelper::getValue($link_vars, 'layout', '');
    	$id = $node->id; 
    	// JArrayHelper::getValue($link_vars, 'id', 0);
        
    	switch ($view) {
    		case 'catalog':
    			if ($id) {
    				$node->uid = 'com_joodbc' . $id;
    			} else {
    				$node->uid = 'com_joodb' . $layout;
    			}
    			$node->expandible = true;
    			break;
    		case 'article':
    			$node->uid = 'com_joodba' . $id;
    			$node->expandible = false;
    			break;
    	}
    }
    
    /**
     * Expands a com_joodb catalogue entry
     *
     * @return void
     * @since  1.0
     */
    static function getTree($xmap, $parent, &$params)
    {    	
    	$app = JFactory::getApplication();
    	$result = false;
    
    	$link_query = parse_url($parent->link);
    	if (!isset($link_query['query'])) {
    		return;
    	}

    	$menu = $app->getMenu();
    	$menuparams = $menu->getParams($parent->id);
    	    	
    	$priority = JArrayHelper::getValue($params, 'article_priority', $parent->priority);
    	$changefreq = JArrayHelper::getValue($params, 'article_changefreq', $parent->changefreq);
    	if ($priority == '-1')
    		$priority = $parent->priority;
    	if ($changefreq == '-1')
    		$changefreq = $parent->changefreq;
    	
    	$params['article_priority'] = $priority;
    	$params['article_changefreq'] = $changefreq;
    	    	
    	parse_str(html_entity_decode($link_query['query']), $link_vars);
    	$view = JArrayHelper::getValue($link_vars, 'view', 0);
    	    	    
    	switch ($view) {
    		case 'catalog':
    			if ($id = $menuparams->get('joobase')) {
    				$show = false;
    				if ($params['include_articles']=='1') $show = true;
    				if ($params['include_articles']=='2' && $xmap->view == 'xml') $show = true;    				 
    				if ($params['include_articles']=='3' && $xmap->view == 'html') $show = true;    				 
    				// get all articles in the database - try to route correctly
	    			if ($show) { 
	    				JTable::addIncludePath(JPATH_SITE.'/administrator/components/com_joodb/tables');
	    				$joobase = JTable::getInstance( 'joodb', 'Table' );
	    				if ($joobase->load($id) && $joobase->published=='1') {
							$db = &$joobase->getTableDBO();
							$wa = array();
							if ($joobase->fstate) $wa[] = "`".$joobase->fstate."`='1'";
							$ws = trim($menuparams->get('where_statement'));
							if (!empty($ws)) $wa[] = "(".$ws.")";
							$where = (count($wa)>=1) ? " WHERE ".join(" AND ",$wa) : "";
    						$query = "SELECT `".$joobase->fid."` AS id,`".$joobase->ftitle."` AS title"
    								." FROM `".$joobase->table."` "
    								.$where		
									." GROUP BY `".$joobase->fid."` ORDER BY ";
    						$orderby =  $menuparams->get('orderby','fid');
    						if (!isset($joobase->{$orderby})) $orderby = "fid"; 
    						$query .= ($orderby=='random') ? " RAND() " : " `".$joobase->{$orderby}."` ";
    						$query .= $menuparams->get('ordering','DESC');
    						$db->setQuery($query);
    						if ($items=$db->loadObjectList()) {
    							$xmap->changeLevel(1);
    							foreach ($items as &$item) {
    								$item->alias = JFilterOutput::stringURLSafe($item->title);    								
    								$node = new stdclass();
                					$node->id = $parent->id;
                					$node->uid = $parent->uid . 'c' . $item->id;
                					$node->browserNav = $parent->browserNav;
					                $node->priority = $params['article_priority'];
                					$node->changefreq = $params['article_changefreq'];
                					$node->name = $item->title;
                					$node->expandible = false;
                					$node->secure = $parent->secure;
                					$node->newsItem = 0;
					                $node->slug = $item->id . ':' . $item->alias;
                					$node->link = "index.php?option=com_joodb&view=article&joobase=".$id."&id=".$node->slug."&Itemid=".$parent->id;
                					$xmap->printNode($node);
    							}
    							$xmap->changeLevel(-1);
    							$result = true;
    						}
    					}
    				}
    			}	
    			break;
    		case 'article':
    			$result = true;
    			break;
    	}
    	return $result;
    }

}
