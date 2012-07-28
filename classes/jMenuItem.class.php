<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
class jMenuItem {
	
	public $submenu = NULL;
	
	public function __construct($text, $url, $submenu=NULL, array $linkattrs=array(), array $wrapperattrs=array()) {
		$this->text = $text;
		$this->linkattrs = $linkattrs;
		$this->linkattrs['href'] = $url;
		$this->wrapperattrs = $wrapperattrs;
		$this->submenu = $submenu;
	}
	
	public function set_submenu($selector) {
		$this->submenu = jMenu::get($selector);
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
			$sub = jMenu::get($this->submenu);
			$str .= $sub->as_list();
		}
		$str .= '</li>';
		return $str;
	}
}
