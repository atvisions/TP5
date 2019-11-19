{extend name='global/base'}
{block name='webname'} - 基础设置{/block}
{block name='content'}
<div class="page-header">
  <h1>基础设置</h1>
</div>
<div class="col-sm-3">
<form action="{:url('admin/setting/save')}" method="post">
{:token()}

{volist name="setting" id="item"}
  
  <div class="form-group">
    <label for="{$item->key}"">{$item->name}</label>
    <input type="text" class="form-control" id="{$item->key}" placeholder="{$item->key}"" name="formdata[{$item->key}]" value="{$item->value}">
  </div>
{/volist}
  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>


{/block}