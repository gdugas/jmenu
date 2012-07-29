<?php
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
class adminListener extends jEventListener{
	function onmasteradminGetMenuContent ($event) {
		$event->add(new masterAdminMenuItem('menus', "Manage menus", jUrl::get('jmenu~menu:index'), 30, 'general'));
	}
}
