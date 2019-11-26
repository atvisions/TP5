{extend name='global/base'};
{block name="content"}
<div class="page-header">
  <h1>用户{$typeName}</h1>
</div>
<div class="col-sm-3">
<form action="{:url('admin/user/save')}" method="post">
{:token()}
<input type="hidden" name="id" value="{$item->id|default=''}">
  <div class="form-group">
    <label for="username">用户名</label>
    <input type="text" class="form-control" id="username" placeholder="用户名" name="username" value="{$item->username|default=''}" {$disabled | default=''}>
  </div>
  <div class="form-group">
    <label for="password">密码</label>
    <input type="password" class="form-control" id="password" placeholder="密码" name="password">
  </div>
  <div class="form-group">
    <label for="nickname">昵称</label>
    <input type="nickname" class="form-control" id="nickname" placeholder="昵称" name="nickname" value="{$item->nickname|default=''}">
  </div>
  <div class="form-group">
    <label for="phone">电话</label>
    <input type="phone" class="form-control" id="phone" placeholder="电话" name="phone" value="{$item->phone|default=''}">
  </div>
  <div class="form-group">
    <label for="email">邮箱</label>
    <input type="email" class="form-control" id="email" placeholder="邮箱" name="email" value="{$item->email|default=''}">
  </div>
  <div class="form-group">
    <label for="user_state">状态</label>
   <select name="user_state" id="user_state" class="form-control">
   {volist name='user_state' id='row'}
    <option value="{$key}">{$row | strip_tags}</option>
    {/volist}
   </select>
  <script>
  $('#user_state').val({$item->user_state | default = 1})
  </script>
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
{/block}