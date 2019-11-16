<!DOCTYPE html>
<html lang="zh-CN">
 	<head>
 	<title>我的留言本</title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


 	</head>

<body>

   <div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 well" style="margin-top:200px">
				<form action="{:url('admin/login/check')}" method="post">
					<div class="form-group">
					<label for="exampleInputEmail1">用户名</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="输入用户名" name="admin_user">
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">密码</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="输入管理员密码" name="admin_pwd">
					</div>


					<button type="submit" class="btn btn-default">登录</button>
				</form>
			</div>
		</div>
   </div> 
</body>		
</html>