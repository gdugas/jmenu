<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/

jClasses::inc('jmenu~jSelectorMenu');
jClasses::inc('jmenu~jMenuItem');


abstract class jMenuBase implements Iterator {
	
	private $_stack = 0;
	private $selector = '';
	private $module = '';
	private $name = '';
	
	protected $items = array();
	protected $readonly = array('selector','module','name'); 
	
	public $attrs = array();
	public $title = '';
	
	
	public function __get($name) {
		return in_array($name,$this->readonly) ? $this->$name : null;
	}
	
	public function __construct(array $params=array()) {
		$this->attrs = $params;
		
		$reflector = new ReflectionClass(get_class($this));
		$names = explode('/', $reflector->getFileName());
		$length = count($names);
		$this->module = $names[$length - 3];
		
		$filenames = explode('.', $names[$length - 1]);
		$this->name = $filenames[0];
		$this->selector = $this->module.'~'.$this->name;
	}
	
	public function add_item (jMenuItem $item) {
		$this->items[] = $item;
	}
	
	public function as_list() {
		$str = '<ul';
		foreach($this->attrs as $name=>$value) {
			$str .= ' '.$name.'="'.$value.'"';
		}
		$str .= '>';
		
		foreach ($this->items as $item) {
			$str .= $item->as_list();
		}
		$str .= '</ul>';
		return $str;
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


class jMenu {
	public static function get($sel, array $params = array()) {
		$jsel = new jSelectorMenu($sel);
		require_once($jsel->getPath());
		$classname = $jsel->resource.'Menu';
		return new $classname($params);
	}
}
