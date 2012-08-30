<?php

jClasses::inc('jmenu~jMenuBase');

class jMenuDbBase extends jMenuBase {
	
	public $record = NULL;
	
	public function __construct(jDaoRecordBase $daorecord, array $params=array()) {
		$this->record = $daorecord;
		$this->_configure($params);
		
		try {
			$this->record->title = jLocale::get($daorecord->locale);
		} catch (Exception $e) {
			$this->record->title = $daorecord->title;
		}
		
		
		$items = jDao::get('jmenu~item')->findByMenu($this->record->id);
		foreach ($items as $item) {
			$this->addItem(new jMenuDbItem($item));
		}
	}
}
