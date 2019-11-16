<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>我的留言本</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container " style="width:800px;margin-top:50px;">
		<div class="row">
			<div class="col-md-12">
				<!-- 这里要记住url的写法，还有method，input中记得加name -->
				<form class="form-horizontal" action="<?php echo url('index/gbook/save'); ?>" method="post">
				<div class="form-group">
				<label for="username" class="col-sm-2 control-label">留言人</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="username" placeholder="留言人">
			</div>
			</div>
			<div class="form-group">
				<label for="content" class="col-sm-2 control-label">留言内容</label>
				<div class="col-sm-10">
				<textarea class="form-control" rows="3" placeholder="留言内容" name="content"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">提交留言</button>
			</div>
		</div>
		</form>
	</div>
		<div class="col-md-12">
			<!-- foreach第一个变量名是通过Gbook控制器传过来的，第二个自定义，在循环中调用 -->
			<?php foreach($rows as $row):?> 
				<div class="well pull-right" style="width:640px">
					<div class="row">
					<div class="col-md-3">{$row.username}</div>
					<div class="col-md-3"></div>
					<div class="col-md-6"><em class="pull-right"><a href="/gbook/delete/{$row.id}" onclick= "return confirm('是否确定删除？');">删除</a></em><span class="pull-right">2018-12-16 18:00:0</span></div>
					<div class="col-md-12">{$row.content}</div>
				</div>
			</div>
			<?php endforeach; ?>
				<div class="col-md-12 pull-right" style="text-align:right">{$rows->render()|raw}</div> 
			</div>	
		</div>
	</div>
</body>
</html>