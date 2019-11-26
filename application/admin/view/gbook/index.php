{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>留言{$typeName}</h1>
</div>
<div class="well">
<form class="form-inline" action="{:url('admin/gbook/index')}" method="get">
  <div class="form-group">
    <label for="key">关键字：</label>
    <input type="text" class="form-control" id="key" name='key' value='{$key | default = ''}'placeholder="请输入留言内容" style="width:300px;">
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<table class='table'>
<thead>
	<tr>
		<th width="5%">ID</td>
		<th width="10%">留言人</th>
		<th width="10%">电话</th>
		<th width="40%">内容</th>
		<th width="15%">创建时间</th>
		<th width="10%">可见状态</th>
		<th width="20%" style="text-align:center;">管理</th>
	</tr>
</thead>
<tbody>
	{volist name="gdata" id="item"}
	<tr>
		<td>{$item->id}</td>
		<td>{$item->username}</td>
		<td>{$item->phone}</td>
		<td>{$item->content}</td>
		<td>{$item->create_time|date='Y-m-d H:i:s'}</td>
		<td>
			{if $item->checkbox == 1}仅管理员可见
			{else /}公开
			{/if}

		</td>
		<td style="text-align:center;"> <a href="{:url('admin/gbook/del',['id'=>$item->id])}" class="btn btn-danger" onclick="return confirm('确定删除吗？')">删除</a></td>
	</tr>
	{/volist}

</tbody>
</table>
<div class="col-md-12" style="text-align:let">{$gdata->render()|raw}</div> 
{/block}