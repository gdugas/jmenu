<ul
	{foreach $menu->attrs as $name=>$value}
		{$name}="{$value}"
	{/foreach}>
	
	{foreach $menu as $item}
		<li
			{foreach $item->wrapperattrs as $name=>$value}
				{$name}="{$value}"
			{/foreach}>
			<a
				{foreach $item->linkattrs as $name=>$value}
					{$name}="{$value}"
				{/foreach}>
				{$item->text}
			</a>
			{if $item->submenu != NULL}
				{zone 'jmenu~menu', array('menu'=>$item->submenu)}
			{/if}
		</li>
	{/foreach}
</ul>
