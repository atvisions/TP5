{extend name='global/Base'};
{block name='typename'}留言本{/block}
{block name='main'}

	<div class="container " style="width:800px;margin-top:50px;">
		<div class="row">
			<div class="col-md-12">
				<!-- 这里要记住url的写法，还有method，input中记得加name -->
				<form class="form-horizontal" action="<?php echo url('index/gbook/save'); ?>" method="post">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">留言人</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="username" name="username" placeholder="留言人">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">电话</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="phone" name="phone" placeholder="电话">
						</div>
					</div>
					<div class="form-group">
						<label for="content" class="col-sm-2 control-label">留言内容</label>
						<div class="col-sm-10">
						<textarea class="form-control" rows="3" placeholder="留言内容" name="content"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-offset-1">			
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">提交留言</button>
									<label>
										<input type="checkbox" name="checkbox" value="1"> 仅限管理员可见
									</label>
								</div>
							</div>
						</div>		
					</div>
			</div>
			</form>
			</div>
		<div class="col-md-10  col-md-offset-2">
			<!-- foreach第一个变量名是通过Gbook控制器传过来的，第二个自定义，在循环中调用 -->
			<?php foreach($rows as $row):?> 
				<div class="well">
					<div class="row">
					<div class="col-md-3">姓名：{$row.username}</div>
					<div class="col-md-5">电话：{$row.phone}</div>
					<div class="col-md-4"><span class="pull-right">2018-12-16 18:00:0</span></div>
					{if $row.checkbox == 1}<div class="col-md-12" style="padding:10px 15px;color:red"><-- 本留言仅管理员可见 --></div>
					{else /}<div class="col-md-12" style="padding:10px 15px">{$row.content}</div>
					{/if}
				</div>
			</div>
			<?php endforeach; ?>
				<div class="col-md-12 pull-right" style="text-align:right">{$rows->render()|raw}</div> 
			</div>	
		</div>
	</div>
{/block}	
