Quickstart
==========

Creating menu
-------------

First, you need to choose a unique identifier for your menu (unique over your application), 'mainsite' for example.
Then create a menu class. Note that the class name is a concatenation of the name and of 'Menu', so in our case, 'mainsiteMenu'. Put that class in a file called {name}.menu.php, so mainsite.menu.php for us, in the 'menus' folder of your module. Remember, your menu class must inherit from jMenuBase.

Example:
	// file mainsite.menu.php
	
	class mainsiteMenu extend jMenuBase {
		public $attrs = array(
			'class' => 'mainsite-menu menu'
		);
		public function __construct() {
			$this->add_item(new jMenuItem('home','#'));
			$this->add_item(new jMenuItem('documentation','#'));
			$this->add_item(new jMenuItem('contact','#'));
			$this->add_item(new jMenuItem('about','#'));
		}
	}


Getting the menu
----------------

$menu = jMenu::get('module~menu_identifier');


Displaying menu
---------------

in php code:

	$menu->as_list();

in template:

	{zone 'jmenu~menu', array('menu'=>'module~menu_identifier')}


Iterate over menu items
-----------------------

jMenuBase extend the php Iterator object to iterate items:

	foreach($menu as $item) {
	 ...
	}


API (quickview)
===============

jMenuBase
---------

### Public properties

Name   | Type   | Description
------ | ------ | -------------------------
$attrs | array  | Html attributes to render
$title | string | Menu title to render

### Public methods

Name     | Parameters   | Return value | Description
-------- | ------------ | ------------ | -----------------------
add_item | jMenuItem    | void         | Adding item to the menu
as_list  | void         | string       | Render the menu as list


jMenuItem
---------

> jMenuItem(string $text_link, string $url[, string $submenu_selector[, array $link_attributes[, array $wrapper_attributes]]])

### Public properties

Name          | Type   | Description
------------- | ------ | -----------------------------------------
$linkattrs    | array  | Html 'a' tag attributes to render
$wrapperattrs | array  | Html 'a' tag wrapper attributes to render
$submenu      | string | Submenu selector

### Public methods

Name        | Parameters   | Return value | Description
----------- | ------------ | ------------ | ------------------------------------------------------
set_submenu | string       | void         | Setting a submenu to the item, defined by the selector
as_list     | void         | string       | Render the item as list item

