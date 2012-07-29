<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
class itemCtrl extends jControllerDaoCrud {
	protected $dao = 'jmenu~item';
	protected $form = 'jmenu~item';
	
	protected $editTemplate = 'jmenu~admin_item_edit';
	
	function index () {
		$resp = $this->getResponse('redirect');
		$resp->action = 'jmenu~menu:index';
		return $resp;
	}
	
	function _preCreate($form) {
		$form->setData('menu',$this->param('menu'));
		$form->setData('basemenu',$this->param('basemenu'));
	}
	function _create($form, $resp, $tpl) {
		jClasses::inc('jmenu~jMenuDb');
		$menu = jMenuDb::get($form->getData('basemenu'));
		$tpl->assign('basemenu',$menu->record->id);
	}
	function _afterCreate($form, $id, $resp) {
		$item = jDao::get('jmenu~item')->get($id);
		jClasses::inc('jmenu~jMenuDb');
		$menu = jMenuDb::get($form->getData('basemenu'));
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $menu->record->id);
	}
	
	function _preUpdate($form) {
		$form->setData('basemenu',$this->param('basemenu'));
	}
	function _editUpdate($form, $resp, $tpl) {
		jClasses::inc('jmenu~jMenuDb');
		$menu = jMenuDb::get($form->getData('basemenu'));
		$tpl->assign('basemenu',$menu->record->id);
	}
	function _afterUpdate($form, $id, $resp) {
		$item = jDao::get('jmenu~item')->get($id);
		jClasses::inc('jmenu~jMenuDb');
		$menu = jMenuDb::get($form->getData('basemenu'));
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $menu->record->id);
	}
	
	
	function _delete($id, $resp) {
		jDao::get('jmenu~item')->delete($id);
		
		jClasses::inc('jmenu~jMenuDb');
		$menu = jMenuDb::get($this->param('basemenu'));
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $menu->record->id);
	}
}
