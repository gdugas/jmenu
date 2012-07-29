<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
class daoListener extends jEventListener {
	
	function onDaoInsertAfter ($e) {
		$item = $e->getParam('record');
		
		if ($e->getParam('dao') == 'jmenu~item') {
			$record = jDao::createRecord('jmenu~menu');
			$record->title = '_' . $item->id;
			$record->is_sub = True;
			jDao::get('jmenu~menu')->insert($record);
			
			$item->submenu = $record->id;
			jDao::get('jmenu~item')->update($item);
		}
	}
	
	function onDaoDeleteBefore ($e) {
		$dao = $e->getParam('dao');
		$keys = $e->getParam('keys');
		
		if ($dao == 'jmenu~menu') {
			$cnd = jDao::createConditions();
			$cnd->addCondition('menu','=',$keys['id']);
			$items = jDao::get('jmenu~item')->findBy($cnd);
			foreach ($items as $item) {
				jDao::get('jmenu~item')->delete($item->id);
			}
		
		} elseif ($dao == 'jmenu~item') {
			$item = jDao::get($dao)->get($keys['id']);
			$cnd = jDao::createConditions();
			jDao::get('jmenu~menu')->delete($item->submenu);
		} 
	}
	
	function onDaoDeleteByBefore ($e) {
		$dao = $e->getParam('dao');
		$cnd = $e->getParam('criterias');
		
		if ($dao == 'jmenu~item') {
			$items = jDao::get($dao)->findBy($cnd);
			foreach ($items as $item) {
				jDao::get($dao)->delete($item->id);
			}
		}
	}
}