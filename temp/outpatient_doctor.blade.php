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
  </head>
    
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="dist/img/logo.png"/></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="dist/img/logo.png" class = "leftimg"/>
            <b class= "logo_WorkspaceManager">Workspace</b><span class="logo_WorkspaceManager">Manager</span> 
          </span>
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
                    <p>{{ Auth::user()->name }} {{ Auth::user()->middlename }} - {{ Auth::user()->post }}</p>
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
              </li>
            </ul>
          </div>
        </nav>
      </header>
     
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <li class="treeview">
              <a href="hospital_doctor" class="main">
                <i class="fa fa-edit "></i>
                <span class = "White">Стационар</span>
              </a>
            </li> 
            <li class="treeview">
              <a href="outpatient_doctor" class="main">
                <i class="fa fa-edit "></i> 
                <span class = "White">Дневной стационар</span>
              </a>
            </li> 
            <li class="treeview" id="0">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 1</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Тип графика: </a></li>
                <div class="form-group" >
                  <select name="selected_graph" id="sel" class="form-control"  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                    <option value='line-chart'>График</option>
                    <option value='bar-chart'>Гистограмма</option>
                  </select>
                </div>
                
                <li><a href="#">Профили/тип стационара:</a></li>
                  <div class="form-group" >
                    <select name="select_department" id="department" class="form-control";  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                      <option selected="selected" value="Хирургия">Хирургия</option>
                      <option value="Терапия" >Терапия</option>
                      <option value="Кардиология">Кардиология</option>
                      <option value="Неврология">Неврология</option>
                      <option value="Реанимация">Реанимация</option>
                      <option value="Эндокринология">Эндокринология</option>
                    </select>
                  </div>
                </li>
              
                <li><a href="#"> Диапазон дат X:</a></li>
                <li><a href="#"> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="01/01/2015 - 01/31/2015"> 
                                <input type="hidden" class="form-control pull-right" id="reservation" name="range_start" id="range_start" value="2012-12-12">
                      <input type="hidden" class="form-control pull-right" id="reservation" name="range_end" id="range_end" value="2112-12-12">
 
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="died" checked>
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="received">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="composed_at_beginning">
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="written_out">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="bed_numbers_facts">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
             
                </li> 
              </ul>
            </li>
            <li class="treeview" style = "display : none;" id="3">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 2</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Тип графика: </a></li>
                <div class="form-group" >
                  <select name="selected_graph" id="sel2" onchange="Type()" class="form-control"  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                    <option value='line-chart'>График</option>
                    <option value='bar-chart'>Гистограмма</option>
                  </select>
                </div>
                
                <li><a href="#">Профили/тип стационара:</a></li>
                  <div class="form-group" >
                    <select name="select_department2" id="department2" class="form-control";  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                      <option selected="selected" value="Хирургия">Хирургия</option>
                      <option value="Терапия" >Терапия</option>
                      <option value="Кардиология">Кардиология</option>
                      <option value="Неврология">Неврология</option>
                      <option value="Реанимация">Реанимация</option>
                      <option value="Эндокринология">Эндокринология</option>
                    </select>
                  </div>
                </li>
              
                <li><a href="#"> Диапазон дат X:</a></li>
                <li><a href="#"> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="daterange2" name="daterange" value="01/01/2015 - 01/31/2015"> 
         
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios2" id="optionsRadios1" value="died" checked>
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios2" id="optionsRadios2" value="received">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadio2s" id="optionsRadios3" value="composed_at_beginning">
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios2" id="optionsRadios4" value="written_out">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios2" id="optionsRadios5" value="bed_numbers_facts">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
                </li> 
              </ul>
            </li>
            <li class="treeview"style = "display : none;" id="7">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 3</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Тип графика: </a></li>
                <div class="form-group" >
                  <select name="selected_graph" id="sel" onchange="Type()" class="form-control"  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                    <option value='line-chart'>График</option>
                    <option value='bar-chart'>Гистограмма</option>
                  </select>
                </div>
                
                <li><a href="#">Профили/тип стационара:</a></li>
                  <div class="form-group" >
                    <select class="form-control";  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                      <option selected="selected">Хирургия</option>
                      <option>Терапия</option>
                      <option>Кардиология</option>
                      <option>Неврология</option>
                      <option>Реанимация</option>
                      <option>Эндокринология</option>
                    </select>
                  </div>
                </li>
              
                <li><a href="#"> Диапазон дат X:</a></li>
                <li><a href="#"> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="01/01/2015 - 01/31/2015"> 
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="died">
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="received">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
                  <a href="#" class="main"><i class="fa fa-refresh"></i> <span>Обновить график</span></a>
                </li> 
              </ul>
            </li>
            <li class="treeview" style = "display : none;" id="8">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 4</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Тип графика: </a></li>
                <div class="form-group" >
                  <select name="selected_graph" id="sel" onchange="Type()" class="form-control"  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                    <option value='line-chart'>График</option>
                    <option value='bar-chart'>Гистограмма</option>
                  </select>
                </div>
                
                <li><a href="#">Профили/тип стационара:</a></li>
                  <div class="form-group" >
                    <select class="form-control";  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                      <option selected="selected">Хирургия</option>
                      <option>Терапия</option>
                      <option>Кардиология</option>
                      <option>Неврология</option>
                      <option>Реанимация</option>
                      <option>Эндокринология</option>
                    </select>
                  </div>
                </li>
              
                <li><a href="#"> Диапазон дат X:</a></li>
                <li><a href="#"> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="01/01/2015 - 01/31/2015"> 
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="died">
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="died">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="died">
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="composed_at_beginning">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="died">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
                  <a href="#" class="main"><i class="fa fa-refresh"></i> <span>Обновить график</span></a>
                </li> 
              </ul>
            </li>
            <li class="treeview" style = "display : none;" id="12">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>График 5</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Тип графика: </a></li>
                <div class="form-group" >
                  <select name="selected_graph" id="sel" onchange="Type()" class="form-control"  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                    <option value='line-chart'>График</option>
                    <option value='bar-chart'>Гистограмма</option>
                  </select>
                </div>
                
                <li><a href="#">Профили/тип стационара:</a></li>
                  <div class="form-group" >
                    <select class="form-control";  style ="width: 90%;  margin-left: 15px; margin-right: auto;">
                      <option selected="selected">Хирургия</option>
                      <option>Терапия</option>
                      <option>Кардиология</option>
                      <option>Неврология</option>
                      <option>Реанимация</option>
                      <option>Эндокринология</option>
                    </select>
                  </div>
                </li>
              
                <li><a href="#"> Диапазон дат X:</a></li>
                <li><a href="#"> 
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="01/01/2015 - 01/31/2015"> 
                    </div>
                  </div>
                </a></li>
            
                <li><a href="#">Y:</a></li>
                <!-- radio -->
                
                <div class="form-group2">
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="died">
                      Пролечено пациентов
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="received">
                      Койко-дни
                    </label>
                  </div>
                </a></li>
                
                <li><a href="#">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                      Средняя занятость койки
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                      Средняя длительность лечения
                    </label>
                  </div>
                </a></li>
              
                <li><a href="#">
                  <div class="radio">  
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
                      Оборот койки
                    </label>
                  </div>
                </a></li>
                </div>
                    
                <li class="treeview">
                  <a href="#" class="main"><i class="fa fa-refresh"></i> <span>Обновить график</span></a>
                </li> 
              </ul>
            </li>
          
            <li class="treeview">
              <a href="#"  class="main" id = "add"><i class="fa fa-plus"></i> <span>Добавить график</span></a>
            </li> 
          
            <li class="treeview">
              <a href="doctor_clinic" class="main"><i class="fa fa-edit "></i> <span class = "White">Поликлиника</span></a>
            </li>  
          
            <li class="treeview">
              <a href="doctor_staff" class="main"><i class="fa fa-edit "></i> <span class = "White">Кадры</span></a>
            </li>  
          </ul>
        </section>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section id = "content" class="content">
          <!-- BAR CHART -->
          <div class="box box-primary" id = 14>
            <div class="box-header with-border" >
              <h3 id="MyHeader1" class="box-title">График 1</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove" id = "close1"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id = 'type' class="box-body border-radius-none">
              <div id="line-chart" style="height: 250px;"></div>
              <div class="box-body">
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!--ОТчет -->
          <div class="box box-primary" id = 15>
            <div class="box-header with-border" >
              <h3 class="box-title">Отчет 1</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none"> 
              @include('table-view::container', ['tableView' => $bedsTableView])
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!-- BAR CHART -->
          <div class="box box-primary" style = "display : none;" id = "2">
            <div class="box-header with-border">
              <h3 id="myHeader2" class="box-title">График 2</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove" id = "close2"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id = 'type' class="box-body border-radius-none">
              <div id="line-chart2" style="height: 250px;"></div>
              <div class="box-body">
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!--ОТчет -->
          <div class="box box-primary" style = "display : none;" id = "4">
            <div class="box-header with-border">
              <h3 class="box-title">Отчет 2</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              @include('table-view::container', ['tableView' => $bedsTableView])
            </div><!-- /.box-body -->
          </div><!-- /.box -->
           <!-- BAR CHART -->
          <div class="box box-primary" style = "display : none;" id="6">
            <div class="box-header with-border">
              <h3 id="MyHeader3" class="box-title">График 3</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove" id = "close3"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id = 'type' class="box-body border-radius-none">
              <div id="line-chart" style="height: 250px;"></div>
              <div class="box-body">
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!--ОТчет -->
          <div class="box box-primary" style = "display : none;" id = "5">
            <div class="box-header with-border">
              <h3 class="box-title">Отчет 3</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              @include('table-view::container', ['tableView' => $bedsTableView])
            </div><!-- /.box-body -->
          </div><!-- /.box -->
           <!-- BAR CHART -->
          <div class="box box-primary" style = "display : none;" id = "9">
            <div class="box-header with-border">
              <h3 id="MyHeader4" class="box-title">График 4</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove" id = "close4"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id = 'type' class="box-body border-radius-none">
              <div id="line-chart" style="height: 250px;"></div>
              <div class="box-body">
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!--ОТчет -->
          <div class="box box-primary" style = "display : none;" id="10">
            <div class="box-header with-border">
              <h3 class="box-title">Отчет 4</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              @include('table-view::container', ['tableView' => $bedsTableView])
            </div><!-- /.box-body -->
          </div><!-- /.box -->
           <!-- BAR CHART -->
          <div class="box box-primary" style = "display : none;" id="13">
            <div class="box-header with-border">
              <h3 id="MyHeader5" class="box-title">График 5</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove" id = "close5"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id = 'type' class="box-body border-radius-none">
              <div id="line-chart" style="height: 250px;"></div>
              <div class="box-body">
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!--ОТчет -->
          <div class="box box-primary" style = "display : none;" id="11">
            <div class="box-header with-border">
              <h3 class="box-title">Отчет 5</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              @include('table-view::container', ['tableView' => $bedsTableView])
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div id="container"></div>
        </section>
      </div>
    
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 TUSUR GPO team</strong>
      </footer>
    </div>
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
    <!-- page script -->
    <script type="text/javascript">
        var startDate;
var endDate;
$(function() {
        
var range = $('input[name="daterange"]').daterangepicker({
    "locale": {
        
        "separator": " - ",
        "applyLabel": "ОК",
        "cancelLabel": "Отмена",
        "fromLabel": "От",
        "toLabel": "До",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Вс",
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб"
        ],
        "monthNames": [
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ],
        "firstDay": 1,
    },
    "startDate": "2016/02/26",
    "endDate": "2016/03/03",
    "format": "YYYY-MM-DD"
},
function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
       $('input[name=range_start]').val(start.format('YYYY-MM-DD')); 
       $('input[name=range_end]').val(end.format('YYYY-MM-DD')); 
});   

      });
    </script>
    
    
      <script>  
 window.requestData = function(days, chart, department, start_date, end_date){
          $.ajax({
            type: "GET",
            dataType: 'json',
            url: "./api", // This is the URL to the API
            data: { days: days, department: department, start_date: start_date, end_date: end_date}
          })
          .done(function( data ) {
            // When the response to the AJAX request comes back render the chart with new data
            chart.setData(data);
          })
          .fail(function() {
            // If there is no communication between the server, show an error
            alert( "error occured" );
          });
        }
window.changegraph = function(graph_name, type, department, start_date, end_date, val) {
       
                  if (type == 'line-chart')
               {
        // LINE CHART
           
        var _chart = new Morris.Line({
          element: graph_name,
          resize: true,
          data: [

          ],
          xkey: 'date',
          ykeys: ['values'],
          labels: ['value'],
          lineColors: ['#3c8dbc'],
          hideHover: 'auto',
          xLabels : 'day'
          //parseTime : false
          
        });
               }
               if (type == 'bar-chart')
               {
        // LINE CHART
        
        var _chart = new Morris.Bar({
          element: graph_name,
          resize: true,
          data: [
          ],
          barColors: ['#3c8dbc'],
          xkey: 'date',
          ykeys: ['values'],
          labels: ['value'],
          hideHover: 'auto',
          xLabels : 'day'
          //parseTime : false
          
        });
        }

        requestData(val, _chart, department, start_date, end_date);
}
     </script>
     
     
    <script>
      var p = document.getElementById("inputi") ;
      var length = 1 ;
      function add_input() {
        var new_input = document.createElement("input") ;
        new_input.name = "my_input" ;
        var div = document.createElement('div') ;
        div.innerHTML = '<br>div элемент №' + length + '<br>' ;
        div.appendChild(new_input) ;
        p.appendChild(div) ;
        length++ ;
      } 
    </script>
    <script>
      Array.prototype.slice.call(document.querySelectorAll('.box box-primary')).forEach(function(a, index, all) {
        a.addEventListener('click', function() {
          var theI = a.cloneNode(true);
          a.parentNode.insertBefore(theI, a.nextSibling);
          alert(index+1+' из '+all.length);
        }, false);
      });
    </script>
    
    <script>
          var type = document.getElementById('sel').value; 
         var department = document.getElementById('department').value;
        var start_date = $("input[name='range_start']").val();
         var end_date = $("input[name='range_end']").val();
          var val = $("input[name='optionsRadios']:checked").val();  
    $(function() {

changegraph('line-chart', type, department, start_date, end_date, val); 
      });
    $("input[name='optionsRadios']:radio").change( function() {
      var val = $("input[name='optionsRadios']:checked").val();
  $('#line-chart').empty();
changegraph('line-chart', type, department, start_date, end_date, val);
      });
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      var start_date = $("input[name='range_start']").val();
         var end_date = $("input[name='range_end']").val();
     $('#line-chart').empty();
changegraph('line-chart', type, department, start_date, end_date, val);
      });
       $("#sel").change( function() {
        type = document.getElementById('sel').value; 
     $('#line-chart').empty();
changegraph('line-chart', type, department, start_date, end_date, val);
      });
    $("#department").change( function() {
      department = document.getElementById('department').value;
        $('#line-chart').empty();
changegraph('line-chart', type, department, start_date, end_date, val);
      });   
    </script>
    
  


    
    <script>
    var inc = 1;
    $('#add').click(function() {
      if(inc >= 5){
        alert("Достигнуто максимальное количество графиков!");
      }
      if(inc==4){
        $('#
      });('#12').show();
        $('#13').show();
        $('#MyHeader5').html('График 5');
        inc += 1;
      }
      if(inc==3){
        $('#8').show();
        $('#9').show();
        $('#10').show();
        $('#MyHeader4').html('График 4');
        inc += 1;
      }
      if(inc==2){
        $('#5').show();
        $('#6').show();
        $('#7').show();
        $('#MyHeader3').html('График 3');
        inc += 1;
      }
      if(inc == 1){
        $('#2').show();
        $('#3').show();
        $('#4').show();
        $('#MyHeader2').html('График fdsfsdf');
        inc += 1;
      }
      if(inc == 0){
        $('#0').show();
        $('#14').show();
        $('#15').show();
        $('#MyHeader2').html('График fdsfsdf');
        inc += 1;
      }
    });
 
    $('#close1').click(function() {
        $('#0').hide();
         inc -= 1;
    });
     $('#close2').click(function() {
        $('#3').hide();
        inc -= 1;
     });
     $('#close3').click(function() {
      $('#7').hide();
      inc -= 1;
    });
     $('#close4').click(function() {
        $('#8').hide();
        inc -= 1;
    });
     $('#close5').click(function() {
        $('#12').hide();
        inc -= 1;
       
     });
    </script>










   
  <!--  <script>
      document.querySelector('#add').onclick = function() {
        var theDiv = document.createElement('div');
        theDiv.innerHTML = '<div class="box box-primary" id="add"> <div class="box-header with-border"> <h3 class="box-title">График 1</h3> <div class="box-tools pull-right"> <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button> <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button> </div></div> <div id ="type" class="box-body border-radius-none"> <div id= "bar-chart" style="height: 250px;"></div> <div class="box-body"></div></div></div>';
        content.insertBefore(theDiv, content.lastChild);  // поместить новый тег первым в div с id="raz"
        var line = new Morris.Bar({
          element: 'bar-chart',
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
          hideHover: 'auto'
        });
        getComputedStyle(theDiv).opacity;
        theDiv.style.opacity = '1';
        var theDiv2 = document.createElement('div');
        theDiv2.innerHTML = '<div class="box box-primary"> <div class="box-header with-border"> <h3 class="box-title">Отчет</h3><div class="box-tools pull-right"> <button class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button> <button class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button></div></div> <div class="box-body border-radius-none"></div> </div>';
        content.insertBefore(theDiv2, content.lastChild);  // поместить новый тег первым в div с id="raz"
        getComputedStyle(theDiv2).opacity;
        theDiv2.style.opacity = '1';
      }
    </script> -->
    
  </body>
</html>