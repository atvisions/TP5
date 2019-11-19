{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>管理员 {$typeName}</h1>
</div>
<div class="col-sm-3">
<form action="{:url('admin/auser/save')}" method="post">
{:token()}
<input type="hidden" name="id" value="{$item->id|default=''}">
  <div class="form-group">
    <label for="username">用户名</label>
    <input type="text" class="form-control" id="username" placeholder="用户名" name="username" value="{$item->username|default=''}">
  </div>
  <div class="form-group">
    <label for="password">密码</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
{/block}