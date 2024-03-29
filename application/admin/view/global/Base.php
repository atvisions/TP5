<!DOCTYPE html>
<html lang="zh-CN">
 	<head>

<title>{$webname}{block name='webname'}{/block}</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{block name='header'}{/block}
 	</head>

<body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{:url('admin/index/index')}">SYSTEM</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="{:url('admin/index/index')}">系统首页 <span class="sr-only">(current)</span></a></li>
                  <li><a href="{:url('index/default')}" target="_blank">网站首页</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$user->username} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">保留</a></li>
                        <li><a href="{:url('/admin/login/logout')}">退出</a></li>
                    </ul>
                  </li>
              </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                	<div class="list-group">
						<a class="list-group-item active">系统设置</a>
						<a href="{:url('setting/index')}" class="list-group-item">基础设置</a>
						<a href="{:url('auser/index')}" class="list-group-item">管理员设置</a>
					</div>

					<div class="list-group">
						<a class="list-group-item active">用户管理</a>
						<a href="{:url('user/index')}" class="list-group-item">所有用户</a>
					</div>

					<div class="list-group">
						<a class="list-group-item active">内容管理</a>
						<a href="{:url('content/index')}" class="list-group-item">新闻管理</a>
            <a href="{:url('gbook/index')}#" class="list-group-item">留言管理</a>
					</div>
            </div>
            <div class="col-sm-10">{block name="content"}留给后台{/block}</div>  
        </div>
    </div>
    
</body>		
</html>