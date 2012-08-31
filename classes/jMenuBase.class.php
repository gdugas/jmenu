<?php

jClasses::inc('jmenu~jMenuAttrs');

class jMenuBase implements Iterator {
	
	private $_stack = 0;
	
	protected $items = array();
	
	public $attrs = NULL;
	public $title = '';
	
	
	public function __construct (array $params=array()) {
		$this->attrs = new jMenuAttrs($params);
	}
	
	public function addItem (jMenuItem $item) {
		$this->items[] = $item;
	}
	
	
	
	public function toString () {
		return jZone::get('jmenu~menu', array('menu'=>$this));
	}
	public function as_list () {
		return $this->as_string();
	}
	
	
	
	
	
	
	// Item iterator
	public function current () {
		return $this->items[$this->_stack];
	}
	public function key () {
		return $this->_stack;
	}
	public function next () {
		$this->_stack += 1;
	}
	public function rewind () {
		$this->_stack = 0;
	}
	public function valid () {
		return isset($this->items[$this->_stack]);
	}
}