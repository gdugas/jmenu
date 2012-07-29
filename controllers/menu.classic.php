<?php 
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/
class menuCtrl extends jControllerDaoCrud {
	protected $dao = 'jmenu~menu';
	protected $form = 'jmenu~menu';
	
	protected $viewTemplate = 'jmenu~admin_menu_view';
	
	protected $propertiesForList = array('title');
	
	
	function _indexSetConditions ($cnd) {
		$cnd->addCondition('is_sub','=',False);
	}
}