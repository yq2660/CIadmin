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
</head>

<body>

    <section id="container" class="">
        <!--main content start-->
        <section id="main-content" style="margin-left: 0px;">
            <!-- page start-->
            <section class="panel">
                <header class="panel-heading">
                    菜单管理
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="back();">上一级</button>
                    </div>
                </header>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="btn-group">

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PID</th>
                                            <th>菜单名称</th>
                                            <th>controller</th>
                                            <th>method</th>
                                            <th>隐藏</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" id="pids" value="<?php echo $pid ?>"/>
                                        <?php foreach($menus as  $menu): ?>
                                        <tr class="">
                                            <td scope="row"><?php echo $menu['mid'] ?></td>
                                            <td scope="row"><input type="text" id="pid<?php echo $menu['mid'] ?>"
                                                    value="<?php echo $menu['pid'] ?>"></td>
                                            <td><input type="text" id="title<?php echo $menu['mid'] ?>" value="<?php echo $menu['title'] ?>">
                                            </td>
                                            <td><input type="text" id="controller<?php echo $menu['mid'] ?>"
                                                    value="<?php echo $menu['controller'] ?>"></td>
                                            <td><input type="text" id="method<?php echo $menu['mid'] ?>" value="<?php echo $menu['method'] ?>">
                                            </td>
                                            <td class="center"><input type="checkbox" id="ishidden<?php echo $menu['mid'] ?>"
                                                    <?php echo $menu['ishidden']?'checked':'' ?> value=1></td>
                                            <td>
                                                <button class="btn" onclick="save(<?php echo $menu['mid'] ?>)">
                                                    保存</button>
                                                <button type="submit" class="btn btn-success"
                                                    onclick="pid(<?php echo $menu['mid'] ?>)">下级</button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <tr class="">
                                            <td scope="row"></td>
                                            <td><input type="text" id="pidss" ></td>
                                            <td><input type="text" id="titless"></td>
                                            <td><input type="text" id="controllerss"></td>
                                            <td><input type="text" id="methodss"></td>
                                            <td class="center"><input type="checkbox" id="ishiddenss">
                                            </td>
                                            <td>
                                                <button class="btn red" onclick="save1()"> 保存</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- page end-->

            </section>
        </section>
        <!--main content end-->
        <!-- Right Slidebar start -->

        <!-- Right Slidebar end -->
        <!--footer start-->


        <!--footer end-->
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
    function save(obj) {
        console.log(obj)
        var pid = $("#pid").val();
        var title = $("#title"+obj).val();
        var controller = $("#controller"+obj).val();
        var method = $("#method"+obj).val();
        var ishidden = $("#ishidden"+obj).prop('checked')
       
        if (ishidden == true) {
            ishidden = 1
        } else {
            ishidden = 0
        }
        $.ajax({
            url: '/index.php/menus/edit',
            data: {
                mid: obj,
                pid: pid,
                title: title,
                controller: controller,
                method: method,
                ishidden: ishidden
            },
            dataType: 'json',
            success: function(res) {
                alert(res.msg)
                window.location.reload();
            }
        });
    }


    function save1() {
        var pid = $("#pids").val();
        var pid = $("#pidss").val();
        if(!pid){
            var pid = $("#pids").val();
        }
        var title = $("#titless").val();
        var controller = $("#controllerss").val();
        var method = $("#methodss").val();
        var ishidden = $("#ishiddenss").prop('checked')
        if (!title) {
            alert("不能为空")
        }
        if (ishidden == true) {
            ishidden = 1
        } else {
            ishidden = 0
        }
        $.ajax({
            url: '/index.php/menus/edit',
            data: {
                pid:pid,
                title: title,
                controller: controller,
                method: method,
                ishidden: ishidden
            },
            dataType: 'json',
            success: function(res) {
                alert(res.msg)
                window.location.reload();

            }
        });
    }
  
    /*跳转下一级*/ 
    function pid(obj) {
        window.location.href = "/index.php/menus/index/pid/" + obj;
    }

    /*返回上一级*/
    function back(){
        history.go(-1);
    } 
    </script>


</body>

</html>