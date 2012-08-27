<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/

jClasses::inc('jmenu~jMenuBase');
jClasses::inc('jmenu~jMenuItem');
jClasses::inc('jmenu~jSelectorMenu');


class jMenu {
	public static function get($sel, array $params = array()) {
		$jsel = new jSelectorMenu($sel);
		require_once($jsel->getPath());
		$classname = $jsel->resource.'Menu';
		return new $classname($params);
	}
}
