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
class jMenuItem {
	
	public $submenu = NULL;
	public $text = '';
	
	
	protected function _configure ($linkattrs, $wrapperattrs) {
		$this->linkattrs = new jMenuAttrs($linkattrs);
		$this->wrapperattrs = new jMenuAttrs($wrapperattrs);
	}
	
	public function __construct($text, $url, $submenu=NULL, array $linkattrs=array(), array $wrapperattrs=array()) {
		$this->_configure($linkattrs, $wrapperattrs);
		
		$this->text = $text;
		$this->linkattrs = $linkattrs;
		$this->linkattrs['href'] = $url;
		$this->wrapperattrs = $wrapperattrs;
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
	
	public function as_list() {
		$str  = '<li';
		foreach($this->wrapperattrs as $name=>$value) {
			$str .= ' '.$name.'="'.$value.'"';
		}
		$str .= '>';
		
		$str .= '<a';
		foreach($this->linkattrs as $name=>$value) {
			$str .= ' '.$name.'="'.$value.'"';
		}
		$str .= '>';
		$str .= $this->text;
		$str .= '</a>';
		
		
		if ($this->submenu != NULL) {
			$str .= $this->submenu->as_list();
		}
		$str .= '</li>';
		return $str;
	}
}
