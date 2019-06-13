<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/asstes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asstes/bootstrap/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/asstes/flatlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/asstes/flatlab/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="/asstes/flatlab/css/owl.carousel.css" type="text/css">

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
    <section id="container">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index" class="logo">Flat<span>lab</span></a>
            <!--logo end-->

            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/asstes/flatlab/img/avatar1_small.jpg">
                            <span class="username">Jhon Doue</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                            <li><a data-toggle="modal" href="#myModal"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">温馨提示</h4>
                                          </div>
                                          <div class="modal-body">
                                             确定退出吗
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">否</button>
                                              <button class="btn btn-success" type="button" onclick="logout();">是</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
        <!--sidebar start-->
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu " id="nav-accordion">
                  <?php foreach($menus as $menu): ?>
                  <li class="sub-menu">
                      <?php if( isset($menu['controller'] ) && $menu['controller']) { ?>
                        <li><a  href="javascript:;" src="/<?php echo $menu['controller'] ?>/<?php echo $menu['method'] ?>"  onclick="menuFire(this)"><?php echo $menu['title'] ?></a></li>
                      <?php } else { ?>
                        <a  href="javascript:;" ><span><?php echo $menu['title'] ?></span></a>
                      <?php } ?>

                      <?php if( isset($menu['children']) && $menu['children']) { ?>
                      <ul class="sub">
                         <?php foreach($menu['children'] as $cvo): ?>
                             <li><a  href="javascript:;" src="/<?php echo $cvo['controller'] ?>/<?php echo $cvo['method'] ?>"  onclick="menuFire(this)"><?php echo $cvo['title'] ?></a></li>
                          <?php endforeach ?>
                      </ul>
                      <?php } ?>
                  </li>
                  <?php endforeach ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
          <iframe
            src="welcome"
            onload="resetMainHeight(this)"
            style="width: 100%;height: 100%;"
            frameborder="0"
            scrolling="0"
          ></iframe>
          </section>
      </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/asstes/flatlab/js/jquery.js"></script>
        <script src="/asstes/flatlab/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="/asstes/flatlab/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/asstes/flatlab/js/jquery.scrollTo.min.js"></script>
        <script src="/asstes/flatlab/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="/asstes/flatlab/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="/asstes/flatlab/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="/asstes/flatlab/js/owl.carousel.js"></script>
        <script src="/asstes/flatlab/js/jquery.customSelect.min.js"></script>
        <script src="/asstes/flatlab/js/respond.min.js"></script>

        <!--right slidebar-->
        <script src="/asstes/flatlab/js/slidebars.min.js"></script>

        <!--common script for all pages-->
        <script src="/asstes/flatlab/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="/asstes/flatlab/js/sparkline-chart.js"></script>
        <script src="/asstes/flatlab/js/easy-pie-chart.js"></script>
        <script src="/asstes/flatlab/js/count.js"></script>

        <script>
        //owl carousel

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });

        $(window).on("resize", function() {
            var owl = $("#owl-demo").data("owlCarousel");
            owl.reinit();
        });
         // 重新设置主操作页面高度
      function resetMainHeight(obj) {
        var height = parent.document.documentElement.clientHeight - 53;
        $(obj).parent("section").height(height);
      }
      function menuFire(obj) {
        // 获取url
        var src = $(obj).attr("src");
        // 设置iframe的src
        $("iframe").attr("src", src);
      }

      /*退出*/
      function logout()
      {
        $.ajax({
            url: 'logout',
            data: {},
            dataType: 'json',
            success: function(res) {
                alert(res.msg)
                window.location.href="/login/index";
            }
        });
      } 
        </script>

</body>

</html>