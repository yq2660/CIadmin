<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- <link rel="shortcut icon" href="img/favicon.html"> -->
    <title>登录</title>
    <!-- Bootstrap core CSS -->
    <link href="/asstes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asstes/bootstrap/css/bootstrap-reset.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/asstes/bootstrap/css/style.css" rel="stylesheet">
    <link href="/asstes/css/style-responsive.css" rel="stylesheet" />
    <script src="/asstes/layui/layui.all.js"></script>
    <!-- 引入layui -->
    <link href="/asstes/layui/css/layui.css" rel="stylesheet" />
</head>

<body class="login-body">
    <div class="container">
        <form class="form-signin">
            <h2 class="form-signin-heading">后台管理系统</h2>
            <div class="login-wrap">
            	<div class="form-group">
                	<span class="icon-user"></span>
                	<input type="text" name="username" id="username" class="form-control login" autocomplete="off" tabindex="1" placeholder="用户名" autofocus>
                </div>
                <div class="form-group">
                	<span class="icon-lock"></span>
                	<input type="password" name="password" id="password" class="form-control login" autocomplete="off" tabindex="2" placeholder="密码">
                </div>
                <button class="btn btn-lg btn-login btn-block" type="button" onclick="doLogin();">登录</button>
            </div>
        </form>
    </div>
</body>

<script>
layui.use(['layer'],function()
{
        $ = layui.jquery;
        layer = layui.layer;

        //用户名控件获取焦点
        $('#username').focus();
        //可以使用回车提交
        $('input').keydown(function(e) {
            if(e.keyCode == 13){
                dologin();
            }
        })
    });


function doLogin(){
				var username = $.trim($('#username').val());
				var password = $.trim($('#password').val());

				if(username == ''){
					layer.alert('请输入用户名',{icon:2});
					return;
				}
				if(password == ''){
					layer.alert('请输入密码',{icon:2});
					return;
				}
				$.post("dologin",{'username':username,'password':password},function (res) {
                    console.log(res)
					if (res.code == 102) {
						layer.alert(res.msg,{icon:2});
					}else{
                        layer.alert(res.msg,{icon:1});
                        setTimeout(() => {
                            window.location.href="/home/index"
                        }, 1000);
                    }
						
                    
				},'json');
			}
</script>
</html>