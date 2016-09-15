<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>WorkspaceManager</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />  
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
     <!-- Datatables -->
     <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
     
  </head>
    
  <body class="skin-blue layout-top-nav">
         <header class="main-header">
        <!-- Logo -->
          <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
    
          <!-- logo for regular state and mobile devices -->
          <span class = "Workspace">
          <span class="logo-lg">
            <img src="dist/img/logo.png" class = "leftimg_main"/>
            <b class= "logo_WorkspaceManager">Workspace</b><span class="logo_WorkspaceManager">Manager</span>
          </span>
          </span>
   
        <div class="navbar-custom-menu">
         
            <ul class="nav navbar-nav">      
              <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                <a href="{{ url('/auth/login') }}" class="dropdown-toggle" data-toggle="dropdown">
                  <span>Войти в систему</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <a class="semi-transparent-button" href="main"><i class="fa fa-fw fa-chevron-left"></i>Вернуться на главную</a>
              <div class="information">
                <div id="container">
      </div>
                <h2 style = "text-align:center;">Зарегистрировать медицинскую организацию</h2>
                <form class="form-horizontal">
              <div class="box-body">
                {!! Form::open(array('route' => 'stat_add', 'class' => 'form-horizontal', 'files'=>true)) !!} 
                <div class="form-group">
                  <label class="col-sm-2 control-label">Название организации</label>

                  <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="hospital_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Страна</label>

                <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="country_name">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Город</label>

                <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="city_name">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Улица</label>

                <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="street_name">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Дом</label>

                <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="home">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Почтовый индекс</label>

                <div class="col-sm-10">
                    <input type="name_org" class="form-control" id="index">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" > С правилами ознакомлен и согласен
                      </label>
                    </div>
                  </div>
                 
              
                         
                    <button type="submit" class="btn btn-primary pull-right" >Сохранить</button>
                    @if ($errors->any())
                    <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
                    @endif
                </div>
                </div>
                
                </form>
              </div>
           
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div><!-- /.box -->
          <div id="container"></div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2016 TUSUR GPO team</strong>
      </footer>
    </div>
    
     {!! Form::close() !!}
   <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script> 
  </body>
</html>
