<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/


jClasses::inc('jmenu~jMenuDbCompiler');
jClasses::inc('jmenu~jMenuBase');
jClasses::inc('jmenu~jMenuItem');


class jMenuDb {
	
	public static function get($id, $params = array()) {
		if (! jMenuDbCompiler::exists($id)) {
			jMenuDbCompiler::compile($id);
		}
		require_once(jMenuDbCompiler::getCompiledPath($id));
		$menuClass = 'jMenuDb'.$id;
		
		return new $menuClass($params);
	}
}
