<?php

class jMenuDbCompiler {
	
	static public function getCompiledPath ($id) {
		return jApp::tempPath('compiled/jmenu/jMenuDb~'.$id.'.php');
	}
	
	static public function exists ($id) {
		return file_exists(self::getCompiledPath($id));
	}
	
	static public function clean ($id) {
		if (self::exists($id)) {
			unlink(self::getCompiledPath($id));
		}
	}
	
    static public function compile ($id) {
    	
    	if (file_exists(self::getCompiledPath($id)));
		$tpl = new jTpl();
		
		$menu = jDao::get('jmenu~menu')->get($id);
		if (! $menu) {
			throw new Exception('Unknow menuDb: "'.$id.'"');
		}
		$tpl->assign('menu', $menu);
		
		$items = jDao::get('jmenu~item')->findByMenu($id);
		$tpl->assign('items', $items);
		
		jFile::write (self::getCompiledPath($id), "<?php \n".$tpl->fetch('jmenu~_menudb_compiled'));
        return true;
    }
}
