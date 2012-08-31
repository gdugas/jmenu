<?php

jClasses::inc('jmenu~jMenuDb');


class dbZone extends jZone {
	
	protected $_tplname='jmenu~menu_db';
	
	protected function _prepareTpl() {
		$menu = $this->param('menu');
		if (! $menu instanceof jMenuBase) {
			$menu = jMenuDb::get($menu);
		}
		
		$basemenu = $this->param('basemenu', $menu->id);
		$tpl = $this->param('tpl',NULL);
		if ($tpl) {
			$this->_tplname = $tpl;
		}
		
		$this->_tpl->assign('menu', $menu);
		$this->_tpl->assign('basemenu', $basemenu);
	}
}
