<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Editable Table</title>

    <!-- Bootstrap core CSS -->
    <link href="/asstes/flatlab/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asstes/flatlab/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/asstes/flatlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/asstes/flatlab/assets/data-tables/DT_bootstrap.css" />

    <!--right slidebar-->
    <link href="/asstes/flatlab/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/asstes/flatlab/css/style.css" rel="stylesheet">
    <link href="/asstes/flatlab/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/asstes/layui/css/layui.css">
    <script type="text/javascript" src="/asstes/layui/layui.js"></script>
</head>

<body>

    <section id="container" class="">
        <!--main content start-->
        <section id="main-content" style="margin-left: 0px;">
            <!-- page start-->
            <section class="panel">
                <header class="panel-heading">
                    角色管理
                    <div class="btn-group pull-right" style="width: 78px;margin-top: -15px;">
                        <div class="inbox-body" style="padding: 14px;">
                            <a class="btn btn-compose" style="padding: 6px 0;" onclick="add(0)" ;>
                                添加
                            </a>
                        </div>
                    </div>
                </header>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="clearfix">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名称</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($roles as $role): ?>
                                        <tr class="">
                                            <td scope="row"><?php echo $role['gid'] ?></td>
                                            <td><?php echo $role['title'] ?></td>
                                            <td>
                                                <button class="btn"
                                                    onclick="add(<?php echo $role['gid'] ?>)">编辑</button>
                                                <button type="submit" class="btn btn-success"
                                                    onclick="del(<?php echo $role['gid'] ?>)">删除</button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/asstes/flatlab/js/jquery.js"></script>
    <script src="/asstes/flatlab/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/asstes/flatlab/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/asstes/flatlab/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/asstes/flatlab/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/asstes/flatlab/js/jquery.scrollTo.min.js"></script>
    <script src="/asstes/flatlab/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="/asstes/flatlab/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/asstes/flatlab/assets/data-tables/DT_bootstrap.js"></script>
    <script src="/asstes/flatlab/js/respond.min.js"></script>

    <!--right slidebar-->
    <script src="/asstes/flatlab/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="/asstes/flatlab/js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="/asstes/flatlab/js/editable-table.js?v=12312312"></script>

    <!-- END JAVASCRIPTS -->
    <script>
    layui.use(['layer'], function() {
        $ = layui.jquery;
        layer = layui.layer;
    });
    // 添加
    function add(gid) {
        layer.open({
            type: 2,
            title: gid > 0 ? '编辑角色' : '添加角色',
            shade: 0.3,
            area: ['480px', '420px'],
            content: 'add?gid=' + gid
        });
    }

    /*删除*/
    function del(gid) {
        layer.confirm('确定要删除吗？', {
            icon: 3,
            btn: ['确定', '取消']
        }, function() {
            $.post('del_menus', {
                'gid': gid
            }, function(res) {
                if (res.code > 102) {
                    layer.msg(res.msg, {
                        'icon': 2
                    });
                } else {
                    layer.msg(res.msg, {
                        'icon': 1
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            }, 'json');
        });


    }
    </script>


</body>

</html>