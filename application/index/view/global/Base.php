{block name='header'}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>{block name='typename'}首页{/block} - {$webname}</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="static/css/basis.css">
<link rel="stylesheet" href="static/css/index.css">
<link rel="stylesheet" href="static/css/modular.css">
<link href="static/css/font-awesome.min.css" rel="stylesheet">
<script>
//js 当前URL对当前栏目高亮突出显示
$(function(){
	var myNav = $("#menu").find('a');
	for(var i=0;i<myNav.length;i++){
	    var links = myNav[i].getAttribute("href");
	    var myURL = document.location.pathname;
	    if(myURL === links){
	        myNav[i].parentNode.className="active";
	    }
	}
})

</script>
</head>
<body>
<div id="page">
			<header>
				<div id="logo"><a href="index.html" title="科创彩"></a></div>
				<div id="menu">
					<ul>
						<li><a href="{:url('index/default')}">首页</a></li>
						<li><a href="{:url('index/news/index')}">新闻</a></li>
						<li><a href="{:url('index/about/index')}">关于科创彩</a></li>
						<li><a href="{:url('index/gbook/index')}">留言本</a></li>
						<li><a href="{:url('index/contact/index')}">联系我们</a></li>
					</ul>
					<div id="search">
						<form class="ss">
							<fieldset>
								<input type="text" class="input-text head-search-input" name="key" placeholder="站内搜索">
								<button class="head-search-button" type="submit" title="搜索"><i class="fa fa-search"></i></button>
							</fieldset>
						</form>
					</div>
				</div>
			</header>
{/block}

{block name='main'}{/block}

{block name='footer'}footer{/block}
</div>
</body>
</html>