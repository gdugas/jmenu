{meta_html jquery}
{meta_html css $j_jelixwww.'/jmenu/jmenu.css'}


<h1>{@jelix~crud.title.view@}</h1>
{formdatafull $form}

<ul class="crud-links-list">
    <li><a href="{jurl $editAction, array('id'=>$id, $offsetParameterName=>$page)}" class="crud-link">{@jelix~crud.link.edit.record@}</a></li>
    <li><a href="{jurl $deleteAction, array('id'=>$id, $offsetParameterName=>$page)}" class="crud-link" onclick="return confirm('{@jelix~crud.confirm.deletion@}')">{@jelix~crud.link.delete.record@}</a></li>
    <li><a href="{jurl $listAction, array($offsetParameterName=>$page)}" class="crud-link">{@jelix~crud.link.return.to.list@}</a></li>
</ul>

<hr />

<h2>Associated items</h2>

<div id="admin_menuitems">
	{zone 'jmenu~db', array('menu'=>$form->getData('title'), 'tpl'=>'admin_menudb_zone')}
</div>

