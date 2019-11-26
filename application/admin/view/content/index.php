{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>新闻{$typeName}<small class="pull-right"><a href="{:url('admin/content/add')}" class="btn btn-primary">添加</a></small></h1>
</div>
<div class="well">
<form class="form-inline" action="{:url('admin/content/index')}" method="get">
  <div class="form-group">
    <label for="key">关键字：</label>
    <input type="text" class="form-control" id="key" name='key' value='{$key | default = ''}'placeholder="请输入文章标题" style="width:300px;">
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<table class='table'>
<thead>
	<tr>
		<th width="5%">ID</td>
		<th width="30%">标题</th>
		<th width="5%">管理员</th>
		<th width="5%">用户</th>
		<th width="15%">创建时间</th>
		<th width="15%">修改时间</th>
		<th width="5%">状态</th>
		<th width="20%" style="text-align:center;">管理</th>
	</tr>
</thead>
<tbody>
	{volist name="cdata" id="item"}
	<tr>
		<td>{$item->id}</td>
		<td>{$item->title}</td>
		<td>{$item->admin_user->username|default=''}</td>
		<td>{$item->user->nickname|default=''}</td>
		<td>{$item->create_time|date='Y-m-d H:i:s'}</td>
		<td>{$item->update_time|date='Y-m-d H:i:s'}</td>
		<td>{$content_state[$item->content_state]  | raw}</td>
		<td style="text-align:center;"><a href="{:url('admin/content/modify',['id'=>$item->id])}" class="btn btn-primary">编辑</a> <a href="{:url('admin/content/state',['id'=>$item->id,'state'=>$item->content_state])}" class="btn btn-danger">切换状态</a> <a href="{:url('admin/content/del',['id'=>$item->id])}" class="btn btn-default" onclick="return confirm('确定删除吗？')">删除</a></td>
	</tr>
	{/volist}

</tbody>
</table>
<div class="col-md-12" style="text-align:let">{$cdata->render()|raw}</div> 
{/block}