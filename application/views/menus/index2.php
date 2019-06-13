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
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group">
                                  <button id="editable-sample_new" class="btn green">
                                      Add New <i class="fa fa-plus"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>菜单名称</th>
                                  <th>Controller</th>
                                  <th>Method</th> 
                                  <th>隐藏</th>
                                  <th>Edit</th>
                                  <th>Del</td>
                                  <th>下级</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach($menus as $menu): ?>
                              <tr class="">
                                  <td><?php echo $menu['mid'] ?></td>
                                  <td><?php echo $menu['title'] ?></td>
                                  <td><?php echo $menu['controller'] ?></td>
                                  <td><?php echo $menu['method'] ?></td>
                                  <td class="center"><input type="checkbox" <?php echo $menu['ishidden']?'checked':'' ?> value=1></td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Del</a></td>
                                  <td><button type="submit" class="btn btn-success">下级</button></td>
                              </tr>
                              <?php endforeach ?>
                              </tbody>
                          </table>

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
    <script src="/asstes/flatlab/js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="/asstes/flatlab/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="/asstes/flatlab/js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="/asstes/flatlab/js/editable-table.js?v=12312312"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>


  </body>
</html>
