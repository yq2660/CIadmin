<!DOCTYPE html>
<html>
<head>
	<title>角色添加</title>
	<link rel="stylesheet" type="text/css" href="/asstes/layui/css/layui.css">
	<script type="text/javascript" src="/asstes/layui/layui.js"></script>
</head>
<body style="padding: 10px;">
	<form class="layui-form">
		<input type="hidden" name="gid" value="<?php echo $role['gid'] ?>">
		<div class="layui-form-item">
			<label class="layui-form-label">角色名称</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input" name="title" value="<?php echo $role['title'] ?>">
			</div>
		</div>

		<div class="layui-form-itme">
			<label class="layui-form-label">权限菜单</label>
           
            <?php foreach ($menuss as $menu): ?>
			<hr>
			<div class="layui-input-block">
				<input type="checkbox" name="menu[<?php echo $menu['mid'] ?>]" lay-skin="primary" title="<?php echo $menu['title'] ?>" <?php echo isset($rights) && $rights && in_array($menu['mid'],$rights)?'checked':''?>>
				<hr>
                <?php foreach ($menu['children'] as $cvo ): ?>
				  <input type="checkbox" name="menu[<?php echo $cvo['mid'] ?>]" lay-skin="primary" title="<?php echo $cvo['title'] ?>" <?php echo isset($rights) && $rights && in_array($cvo['mid'],$rights)?'checked':''?>>
                  <?php endforeach ?>
			</div>
			<?php endforeach ?>
		</div>
	</form>

	<div class="layui-form-item" style="margin-top:10px;">
		<div class="layui-input-block">
			<button class="layui-btn" onclick="save()">保存</button>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	layui.use(['layer','form'],function(){
		var form = layui.form;
		layer = layui.layer;
		$ = layui.jquery;
	});

	function save(){
		var title = $.trim($('input[name="title"]').val());
		if(title==''){
			layer.msg('请填写角色名称',{'icon':2});
			return;
		}
		$.post('save_menus',$('form').serialize(),function(res){
			if(res.code>102){
				layer.msg(res.msg,{'icon':2});
			}else{
				layer.msg(res.msg,{'icon':1});
				setTimeout(function(){parent.window.location.reload();},1000);
			}
		},'json');
	}
</script>