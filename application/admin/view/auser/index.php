{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>管理员 {$typeName}<small class="pull-right"><a href="{:url('admin/auser/add')}" class="btn btn-primary">添加</a></small></h1>
</div>
<table class='table'>
<thead>
	<tr>
		<th width="10%">ID</td>
		<th width="20%">用户名</th>
		<th width="20%">登录IP</th>
		<th width="20%">登陆日期</th>
		<th width="30%" style="text-align:center;">管理</th>
	</tr>
</thead>
<tbody>
	{volist name="audata" id="item"}
	<tr>
		<td>{$item->id}</td>
		<td>{$item->username}</td>
		<td>{$item->loginip}</td>
		<td>{$item->logintime}</td>
		<td style="text-align:center;"><a href="{:url('admin/auser/modify',['id'=>$item->id])}" class="btn btn-primary">编辑</a> <a href="{:url('admin/auser/del',['id'=>$item->id])}" class="btn btn-danger" onclick="return confirm('确定删除吗？')">删除</a></td>
	</tr>
	{/volist}
</tbody>
</table>
{/block}