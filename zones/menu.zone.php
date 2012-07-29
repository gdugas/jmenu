<?php

jClasses::inc('jmenu~jMenu');


class menuZone extends jZone {
	
	protected $_tplname='jmenu~zone_menu';
	
	protected function _prepareTpl() {
		$menu = jMenu::get($this->param('menu'));
		$this->_tpl->assign('menu', $menu);
	}
}
