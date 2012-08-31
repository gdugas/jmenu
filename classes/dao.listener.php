<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
jClasses::inc('jmenu~jMenuDbCompiler');
class daoListener extends jEventListener {
	
	function onDaoInsertAfter ($e) {
		$item = $e->getParam('record');
		
		if ($e->getParam('dao') == 'jmenu~item') {
			// Auto create submenu
			$record = jDao::createRecord('jmenu~menu');
			$record->title = '_' . $item->id;
			$record->is_sub = True;
			jDao::get('jmenu~menu')->insert($record);
			
			$item->submenu = $record->id;
			jDao::get('jmenu~item')->update($item);
			jMenuDbCompiler::clean($item->menu);
		
		} elseif ($e->getParam('record') == 'jmenu~menu') {
			jMenuDbCompiler::clean($item->id);
			
		}
	}
	
	function onDaoUpdateAfter ($e) {
		$dao = $e->getParam('dao');
		$record = $e->getParam('record');
		
		if ($dao == 'jmenu~item') {
			jMenuDbCompiler::clean($record->menu);
		
		} else if ($dao == 'jmenu~menu') {
			jMenuDbCompiler::clean($record->id);
		}
	}
	
	function onDaoDeleteBefore ($e) {
		$dao = $e->getParam('dao');
		$keys = $e->getParam('keys');
		
		if ($dao == 'jmenu~menu') {
			// On remove menu: auto delete associated items
			$cnd = jDao::createConditions();
			$cnd->addCondition('menu','=',$keys['id']);
			$items = jDao::get('jmenu~item')->findBy($cnd);
			foreach ($items as $item) {
				jDao::get('jmenu~item')->delete($item->id);
			}
			
			jMenuDbCompiler::clean($keys['id']);
		
		} elseif ($dao == 'jmenu~item') {
			// On remove item: auto delete submenu
			$item = jDao::get($dao)->get($keys['id']);
			$cnd = jDao::createConditions();
			jDao::get('jmenu~menu')->delete($item->submenu);
			
			jMenuDbCompiler::clean($item->menu);
		}
	}
	
	function onDaoDeleteByBefore ($e) {
		$dao = $e->getParam('dao');
		$cnd = $e->getParam('criterias');
		
		// On deleteBy: exec onDaoDeleteBefore (see on top method)
		if ($dao == 'jmenu~item' || $dao == 'jmenu~menu') {
			$items = jDao::get($dao)->findBy($cnd);
			foreach ($items as $item) {
				jDao::get($dao)->delete($item->id);
			}
		}
	}
}
