<?php

jClasses::inc('jmenu~jMenuDb');


class dbZone extends jZone {
	
	protected $_tplname='jmenu~zone_menudb';
	
	protected function _prepareTpl() {
		$menu_title = $this->param('menu');
		$menu = jMenuDb::get($menu_title);
		
		$tpl = $this->param('tpl',NULL);
		$basemenu = $this->param('basemenu',$menu_title);
		
		if ($tpl) {
			$this->_tplname = $tpl;
		}
		
		$this->_tpl->assign('menu', $menu);
		$this->_tpl->assign('basemenu', $basemenu);
	}
}
