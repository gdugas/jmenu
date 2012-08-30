<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/

jClasses::inc('jmenu~jMenuItem');

class jMenuDbItem extends jMenuItem {
	public $record = NULL;
	
	public function __construct(jDaoRecordBase $daorecord, array $linkattrs=array(), array $wrapperattrs=array()) {
		$this->record = $daorecord;
		$this->text = $daorecord->text;
		
		$linkattrs['href'] = $daorecord->url;
		$this->linkattrs = $linkattrs;
		$this->wrapperattrs = $wrapperattrs;
		
		if ($this->record->submenu != NULL) {
			$this->setSubmenu(jDao::get('jmenu~menu')->get($this->record->submenu));
		}
	}
	
	public function setSubmenu($menu) {
		$this->submenu = new jMenuDbBase($menu);
	}
}