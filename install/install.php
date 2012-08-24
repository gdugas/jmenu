<?php
/**
* @package   jmenu
* @subpackage jmenu
* @author    Guillaume Dugas
* @copyright 2011 Guillaume Dugas
* @link      http://github.com/gdugas
* @license    All rights reserved
*/


class jmenuModuleInstaller extends jInstallerModule {

    function install() {
        if ($this->firstDbExec() && ! $this->getParameter('without-db')) {
            $this->execSQLScript('sql/install');
        }
		if ((! $this->getParameter('nocopyfiles') && $this->firstExec('copyfile')) || $this->getParameter('forcecopyfiles')) {
			$jelixwww = $GLOBALS['gJConfig']->urlengine['jelixWWWPath'];
			$this->copyDirectoryContent('www', 'www:'.$jelixwww);
		}
    }
}