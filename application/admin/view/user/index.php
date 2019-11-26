{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>用户{$typeName}<small class="pull-right"><a href="{:url('admin/user/add')}" class="btn btn-primary">添加</a></small></h1>
</div>
<div class="well">
<form class="form-inline" action="{:url('admin/user/index')}" method="get">
  <div class="form-group">
    <label for="key">关键字：</label>
    <input type="text" class="form-control" id="key" name='key' value='{$key | default = ''}'placeholder="请输入用户名、昵称、手机号、邮箱" style="width:300px;">
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<table class='table'>
<thead>
	<tr>
		<th width="10%">ID</td>
		<th width="10%">用户名</th>
		<th width="10%">昵称</th>
		<th width="10%">手机</th>
		<th width="20%">邮箱</th>
		<th width="10%">状态</th>
		<th width="20%" style="text-align:center;">管理</th>
	</tr>
</thead>
<tbody>
	{volist name="udata" id="item"}
	<tr>
		<td>{$item->id}</td>
		<td>{$item->username}</td>
		<td>{$item->nickname}</td>
		<td>{$item->phone}</td>
		<td>{$item->email}</td>
		<td>{$user_state[$item->user_state]  | raw}</td>
		<td style="text-align:center;"><a href="{:url('admin/user/modify',['id'=>$item->id])}" class="btn btn-primary">编辑</a> <a href="{:url('admin/user/state',['id'=>$item->id,'state'=>$item->user_state])}" class="btn btn-danger">切换状态</a></td>
	</tr>
	{/volist}

</tbody>
</table>
<div class="col-md-12" style="text-align:let">{$udata->render()|raw}</div> 
{/block}