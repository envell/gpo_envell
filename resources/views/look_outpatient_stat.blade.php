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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="dist/img/logo.png"/></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="dist/img/logo.png" class = "leftimg"/><b class= "logo_WorkspaceManager">Workspace</b><span class="logo_WorkspaceManager">Manager</span> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">      
              <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="images/{{ Auth::user()->imag}}" class="user-image" alt="User Image"/>
              <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->middlename }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/{{ Auth::user()->imag}}" class="img-circle" alt="User Image" />      
                             <p>
                          {{ Auth::user()->name }} {{ Auth::user()->middlename }} - {{ Auth::user()->post }}
                    </p>
                  </li>
             
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="nastroy" class="btn btn-default btn-flat">Настройки</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Выход</a>
                    </div>
                  </li>
                </ul>
          
                </ul>
              </li>
           
            </ul>
          </div>
        </nav>
      </header>
        <!-- Left side column. contains the logo and sidebar -->
        
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview">
                <a href="hospital_statistics" class="main"><i class="fa  fa-folder-open-o" ></i></span><span style="font-size:15px;" >Стационар</span></a></li>
 
                <li class="treeview">
                 <a href="outpatient_statistics" class="main"><i class="fa  fa-folder-o " style="color:white;"></i> <span class = "White">Дневной стационар</span></a>
              </li> 
                            <li class="treeview">
                 <a href="hospital_statistics" class="main"><i class="fa fa-edit"  ></i> <span >Редактирование данных</span></a>
              </li> 
               <li class="treeview">
                 <a href="look_hospital_stat" class="main"><i class="fa fa-eye" style="color: white;"></i> <span style="color:white;">Просмотр отчета</span></a>
              </li> 
                <li class="treeview">
             <li class="treeview" id="0">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 1</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">X:</a></li>
                  <div class="form-group2">
             
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="options" id="option2" value="type" checked>
                      Тип стационара
                    </label>
                    <div class="form-group" id="type_st" >
                    <select name="select_department" id="department" class="form-control";  style ="width: 98%;  margin-left: 0px; margin-right: auto;">
                      <option selected="selected" value="Выберите тип">Выберите тип стационара</option>
                      <option value="Стационар">Стационар</option>
                      <option value="Поликлиника" >Поликлиника</option>
                    </select>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="options" id="option3" value="date">
                      Диапазон дат
                    </label>
                  </div>
                </a></li>

                </div>
                </li>
              
              <li hidden="false" id="date_show"><a>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="01/01/2015 - 01/31/2015"> 
                                <input type="hidden" class="form-control pull-right" name="range_start" id="range_start" value="2012-12-12">
                      <input type="hidden" class="form-control pull-right" name="range_end" id="range_end" value="2112-12-12"> 
 
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li hidden="false" id = "radio1"><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="died">
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li hidden="false" id="radio2"><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="held_beddays">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li id = "radio3"><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="composed_at_beginning" checked='true'>
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li id="radio4"><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="written_out">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li id="radio5"><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="bed_turnovers">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
             
                </li> 
              </ul>
            </li>
           
            <li class="treeview">
              <a href="javascript:;"  class="main" name="add" id = "add"><i class="fa fa-plus"></i> <span>Добавить график</span></a>
            </li> 
              <li class="treeview">
                 <a href="statistics_clinic" class="main"><i class="fa  fa-folder-o "></i> <span style="font-size:15px;">Поликлиника</span></a>
              </li>  
              <li class="treeview">
                 <a href="statistics_staff" class="main"><i class="fa  fa-folder-o"></i> <span style="font-size:15px;">Кадры</span></a>
              </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
         <!-- Main content -->
            <section class="content">
            <!-- solid sales graph -->
           <div class="box box-primary" id="add">
                <div class="box-header with-border">
                  <h3 class="box-title">График 1</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                     <div class="box-body">
             
                </div><!-- /.box-body -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            <!--ОТчет -->
       <div class="box box-primary" id="add">
                <div class="box-header with-border">
                  <h3 class="box-title">Отчет</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">

      @yield('content')
      
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                </div>
                   <!-- solid sales graph -->
           
            </section><!-- /.Left col -->   
        
       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 TUSUR GPO team</strong>
      </footer>
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    
    
<script type="text/javascript">
$(document).ready(function() {
  var typeSt = $("#type_st");
  var radio1 = $("#radio1");
  var radio2 = $("#radio2");
  var radio3 = $("#radio3");
  var radio4 = $("#radio4");
  var radio5 = $("#radio5");
  var dateShow = $("#date_show");
  var optionsRadios1 = $("#optionsRadios1");
  var optionsRadios3 = $("#optionsRadios3");
  var optionsRadios = $("input[name=optionsRadios]");
  
  $('input[name=options]').change(function() {
    if (this.value === 'type') {
      typeSt.show();
      radio1.hide();
      radio2.hide();
      radio3.show();
      radio4.show();
      radio5.show();
      dateShow.hide();
      optionsRadios.removeAttr('checked');
      console.log(optionsRadios3)
      optionsRadios3.prop('checked', 'checked')
      return;
    }
    if (this.value === 'date') {
      typeSt.hide();
      dateShow.show();
      radio1.show();
      radio2.show();
      radio3.hide();
      radio4.hide();
      radio5.hide(); 
      optionsRadios.removeAttr('checked');
      optionsRadios1.prop('checked', 'checked')
      return;
    }
  });
});

</script>


<!-- DataTables -->

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"> </script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  @stack('scripts')
    


    <!-- page script -->
    <script>
      $(function () {
        "use strict";
            // LINE CHART
        var line = new Morris.Line({
          element: 'line-chart',
          resize: true,
          data: [
            {y: '2011 Q1', item1: 2666},
            {y: '2011 Q2', item1: 2778},
            {y: '2011 Q3', item1: 4912},
            {y: '2011 Q4', item1: 3767},
            {y: '2012 Q1', item1: 6810},
            {y: '2012 Q2', item1: 5670},
            {y: '2012 Q3', item1: 4820},
            {y: '2012 Q4', item1: 15073},
            {y: '2013 Q1', item1: 10687},
            {y: '2013 Q2', item1: 8432}
          ],
          xkey: 'y',
          ykeys: ['item1'],
          labels: ['Item 1'],
          lineColors: ['#3c8dbc'],
          hideHover: 'auto'
        });
      });
    </script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  </body>
</html>