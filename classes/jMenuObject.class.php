<?php 

jClasses::inc('jmenu~jMenuBase');

class jMenuObject extends jMenuBase {
	private $selector = null;
	private $module = null;
	
	public function __construct (array $params=array()) {
		parent::__construct($params);
		
		// Setting $module, $name and $selector readonly properties
		$reflector = new ReflectionClass(get_class($this));
		$names = explode('/', $reflector->getFileName());
		$length = count($names);
		$this->module = $names[$length - 3];
		
		$filenames = explode('.', $names[$length - 1]);
		$this->title = $filenames[0];
		$this->selector = $this->module.'~'.$this->title;
	}
	
	public function getModule () {
		return $this->selector;
	}
	
	
	public function getSelector () {
		return $this->module;
	}
}
