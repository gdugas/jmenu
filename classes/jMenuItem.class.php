<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/

jClasses::inc('jmenu~jMenu');
jClasses::inc('jmenu~jMenuAttrs');

class jMenuItem {
	
	public $submenu = NULL;
	public $text = '';
	public $linkattrs = NULL;
	public $wrapperattrs = NULL;
	
	public function __construct($text, $url, $submenu=NULL, array $linkattrs=array(), array $wrapperattrs=array()) {
		$this->linkattrs = new jMenuAttrs($linkattrs);
		$this->wrapperattrs = new jMenuAttrs($wrapperattrs);
		
		$this->text = $text;
		$this->linkattrs->setAttr('href', $url);
		
		if ($submenu != NULL) {
			$this->setSubmenu($submenu);
		}
	}
	
	public function setSubmenu($submenu) {
		if ($submenu instanceof jMenuBase) {
			$this->submenu = $submenu;
		} else {
			$this->submenu = jMenu::get($submenu);
		}
	}

}
