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
		$tpl->assign('basemenu', $this->param('basemenu'));
	}
	function _afterCreate($form, $id, $resp) {
		$item = jDao::get('jmenu~item')->get($id);
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $this->param('basemenu'));
	}
	
	function _preUpdate($form) {
		$form->setData('basemenu',$this->param('basemenu'));
	}
	function _editUpdate($form, $resp, $tpl) {
		$tpl->assign('basemenu', $form->getData('basemenu'));
	}
	function _afterUpdate($form, $id, $resp) {
		$item = jDao::get('jmenu~item')->get($id);
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $this->param('basemenu'));
	}
	
	
	function _delete($id, $resp) {
		jDao::get('jmenu~item')->delete($id);
		
		$resp->action = 'jmenu~menu:view';
		$resp->params = array('id' => $this->param('basemenu'));
	}
}
