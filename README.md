Quickstart
==========

There is 2 type of menu: object menus, and database menus

Db Menus
--------

You can manage db menus with the jelix admin interface. Then, you just have to call your menus, in your code:

	jClasses::inc('jmenu~jMenuDb');
	$menu = jMenuDb::get($id);
	
	// displaying menu
	$menu->toString();

in your template:

	{zone 'jmenu~db', array('menu'=>$id[, 'tpl'=>'optionnal_template_selector'])}


Object menus
------------

### Creating your menu

First, you need to choose a unique identifier for your menu (unique over your application), 'mainsite' for example.
Then create a menu class. Note that the class name is a concatenation of the name and of 'Menu', so in our case, 'mainsiteMenu'. Put that class in a file called {name}.menu.php, so mainsite.menu.php for us, in the 'menus' folder of your module. Remember, your menu class must inherit from jMenuBase.

Example:
	// file mainsite.menu.php
	
	class mainsiteMenu extend jMenuObject {
		public $attrs = array(
			'class' => 'mainsite-menu menu'
		);
		public function __construct() {
			parent::__construct();
			$this->add_item(new jMenuItem('home','#'));
			$this->add_item(new jMenuItem('documentation','#'));
			$this->add_item(new jMenuItem('contact','#'));
			$this->add_item(new jMenuItem('about','#'));
		}
	}


### Getting the menu

$menu = jMenu::get('module~menu_identifier');


### Displaying menu

in php code:

	$menu->toString();

in template:

	{zone 'jmenu~menu', array('menu'=>'module~menu_identifier')}


### Iterate over menu items

jMenuObject extend the php Iterator object to iterate items:

	foreach($menu as $item) {
	 ...
	}


API (quickview)
===============

jMenu
-----

### Static methods

Name | Parameters  | Return value | Description
---- | ----------- | ------------ | ----------------------------------------
get  | string      | jMenuObject  | Getting the menu defined by the selector


jMenuDb
-------

### Static methods

Name | Parameters  | Return value | Description
---- | ----------- | ------------ | -------------------------------------
get  | string      | jMenuBase    | Getting the menu defined by the title


jMenuBase
---------

### Public properties

Name   | Type        | Description
------ | ----------- | -------------------------
$attrs | jMenuAttrs  | Html attributes to render
$title | string      | Menu title to render

### Public methods

Name     | Parameters   | Return value | Description
-------- | ------------ | ------------ | -----------------------
addItem  | jMenuItem    | void         | Adding item to the menu
toString | void         | string       | Render the menu as list


jMenuItem
---------

> jMenuItem(string $text_link, string $url[, jMenuBase $submenu[, jMenuAttrs $link_attributes[, jMenuAttrs $wrapper_attributes]]])

### Public properties

Name          | Type        | Description
------------- | ----------- | -----------------------------------------
$linkattrs    | jMenuAttrs  | Html 'a' tag attributes to render
$wrapperattrs | jMenuAttrs  | Html 'a' tag wrapper attributes to render
$submenu      | jMenuBase   | jMenuBase object

### Public methods

Name        | Parameters   | Return value | Description
----------- | ------------ | ------------ | -----------------------------
setSubmenu  | jMenuBase    | void         | Setting a submenu to the item

