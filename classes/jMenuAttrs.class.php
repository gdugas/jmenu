<?php 


class jMenuAttrs {
	
	public function __construct($attrs) {
		foreach($attrs as $key => $value) {
			$this->setAttr($key, $value);
		}
	}
	
	public function addClass ($classname) {
		if (! $this->hasClass($classname)) {
			$this->setAttr('class', trim($this->getAttr('class', '') . ' ' . $classname));
		}
	}
	
	public function hasClass ($classname) {
		$classes = explode(' ', $this->getAttr('class', ''));
		return in_array($classname, $classes);
	}
	
	public function removeClass ($classname) {
		$classattr = '';
		$classes = explode(' ', $this->getAttr('class', ''));
		foreach ($classes as $class) {
			if ($class != $classname) {
				$classattr .= ' '.$class;
			}
		}
		$this->setAttr('class', trim($classattr));
	}
	
	
	public function getAttr ($attr, $default = NULL) {
		if (! isset($this->$attr)) {
			return $default;
		} else {
			return $this->$attr;
		}
	}
	public function hasAttr ($attr) {
		return isset($this->$attr) ? True: False;
	}
	public function removeAttr ($attr) {
		if (isset($this->$attr)) {
			unset($this->$attr);
		}
	}
	public function setAttr ($attr, $value) {
		$this->$attr = $value;
	}
}