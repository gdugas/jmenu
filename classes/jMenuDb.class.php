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
jClasses::inc('jmenu~jMenuDbItem');

class jMenuDbBase extends jMenuBase {
	protected $readonly = array();
	
	public $title = '';
	public $record = NULL;
	
	public function __construct(jDaoRecordBase $daorecord, array $params=array()) {
		$this->record = $daorecord;
		$this->title = $daorecord->title;
		$this->attrs = $params;
		
		$items = jDao::get('jmenu~item')->findByMenu($this->record->id);
		foreach ($items as $item) {
			$this->add_item(new jMenuDbItem($item));
		}
	}
}


class jMenuDb {
	public static function get($title, $params = array()) {
		$menu = jDao::get('jmenu~menu')->getByTitle($title);
		if (! $menu) { return False; }
		
		$dbmenu = new jMenuDbBase($menu, $params);
		return $dbmenu;
	}
}