<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/


jClasses::inc('jmenu~jMenuDbBase');
jClasses::inc('jmenu~jMenuDbItem');


class jMenuDb {
	public static function get($title, $params = array()) {
		$menu = jDao::get('jmenu~menu')->getByTitle($title);
		if (! $menu) {
			return $menu;
		}
		
		$dbmenu = new jMenuDbBase($menu, $params);
		return $dbmenu;
	}
}
