<ul menu_id="{$menu->id}" 
	{foreach $menu->attrs as $name=>$value}
		{$name}="{$value}"
	{/foreach} >
	
	{foreach $menu as $item}
		<li item_id="{$item->id}"
			{foreach $item->wrapperattrs as $name=>$value}
				{$name}="{$value}"
			{/foreach}>
			<a item_id="{$item->id}"
				{foreach $item->linkattrs as $name=>$value}
					{$name}="{$value}"
				{/foreach}>
				{$item->text}
			</a>
			<span class="actions">
			    (
			    <a href="{jurl 'jmenu~item:preupdate', array('id'=>$item->id,'basemenu'=>$basemenu)}" class="crud-link">{@jelix~crud.link.edit.record@}</a> - 
			    <a href="{jurl 'jmenu~item:delete', array('id'=>$item->id,'basemenu'=>$basemenu)}" class="crud-link" onclick="return confirm('{@jelix~crud.confirm.deletion@}')">{@jelix~crud.link.delete.record@}</a>
			    )
			</span>
			{if $item->submenu != NULL}
				{zone 'jmenu~db', array('menu'=>$item->submenu->id, 'basemenu'=>$basemenu, 'tpl'=>'admin_menudb_zone')}
			{else}
				<ul></ul>
			{/if}
		</li>
	{/foreach}
	<li class="add-item"><a href="{jurl 'jmenu~item:precreate', array('menu'=>$menu->id,'basemenu'=>$basemenu)}">Add item</a></li>
</ul>
