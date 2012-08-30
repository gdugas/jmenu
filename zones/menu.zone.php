<?php

jClasses::inc('jmenu~jMenu');


class menuZone extends jZone {
	
	protected $_tplname='jmenu~menu';
	
	protected function _prepareTpl() {
		$menu = $this->param('menu');
		if (! $menu instanceof jMenuBase) {
			$menu = jMenu::get($menu);
		}
		$this->_tpl->assign('menu', $menu);
	}
}
