<?php

jClasses::inc('jmenu~jMenuBase');

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
	
	public function as_list() {
		return jZone::get('jmenu~db', array('menu' => $this));
	}
}
