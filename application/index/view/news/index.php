{extend name='global/Base'};

{block name='main'}

	{volist name="cdata" id="item"}

	<div class='content'><h1>{$item->title}</h1></div>
	<div class='content'>{$item->admin_user->username|default=''}</div>
	<div class='content'>{$item->create_time|date='Y-m-d H:i:s'}</div>
	<div class='content'>{$item->subtitle}</div>
	<div class='content'><img src="{$item->litimg}" alt="" width='100' height='50'></div>
	<div class='content'>{:html_entity_decode($item->content)}</div>
	{/volist}
{/block}	
