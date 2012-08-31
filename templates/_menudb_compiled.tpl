
class jMenuDb{$menu->id} extends jMenuBase {ldelim}
	public function __construct($params) {ldelim}
		parent::__construct($params);
		
		$this->id = {$menu->id};
		{if $menu->locale}
			try {ldelim}
				$this->title = jLocale::get({$menu->locale});
			{rdelim} catch (Exception $e) {ldelim}
				$this->title = '{$menu->title}';
			{rdelim}
		{else}
			$this->title = '{$menu->title}';
		{/if}
		
		{foreach $items as $item}
			$i = new jMenuItem('{$item->text}', '{$item->url}', jMenuDb::get({$item->submenu}));
			$i->id = '{$item->id}';
			$this->addItem($i);
		{/foreach}
	{rdelim}
{rdelim}
