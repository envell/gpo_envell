<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WorkspaceManager</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
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
                <a href="hospital_statistics" class="main"><i class="fa  fa-folder-open-o"></i></span><span style="font-size:15px;">Стационар</span></a></li>
            
                <li class="treeview">
                 <a href="outpatient_statistics" class="main"><i class="fa  fa-folder-o "></i> <span style="font-size:15px;">Дневной стационар</span></a>
              </li> 
              <li class="treeview">
                 <a href="statistics_clinic" class="main"><i class="fa  fa-folder-o "></i> <span style="font-size:15px;">Поликлиника</span></a>
              </li>  
              <li class="treeview">
                 <a href="statistics_staff" class="main"><i class="fa  fa-folder-o" style="color:white;"></i> <span class = "White">Кадры</span></a>
              </li>
                 <li class="treeview">
                 <a href="#" class="main"><i class="fa fa-edit" style="color: white;" ></i> <span style="color:white;">Редактирование данных</span></a>
              </li> 
               <li class="treeview">
                 <a href="look_staff_stat" class="main"><i class="fa fa-eye" ></i> <span style="font-size:15px;">Просмотр отчета</span></a>
              </li> 
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Main content -->
        <section class="content">
             <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Штатное расписание</h3>
                     <div class="pull-right box-tools">
                    <div class="btn-group">
                      <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                         <button class="file-upload">            
                        <input type="file" class="file-input">Загрузить данные</button>
                      </ul>
                    </div>
                    </div>
                </div><!-- /.box-header -->
                <!-- form start -->

 
            {!! Form::open(array('route' => 'staff_add', 'class' => 'form-horizontal', 'files'=>true)) !!} 
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Должность</label>
                      <div class="col-sm-10">
                       <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Хирург</option>
                      <option>Терапевт</option>
                      <option>Невролог</option>
                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Категория персонала</label>
                      <div class="col-sm-10">
                        <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Врачи</option>
                      <option>Младший медицинский персонал</option>
                      <option>Провизоры</option>
                    </select>
                      </div>
                    </div>
                       <div class="form-group">
                      <label class="col-sm-2 control-label">Дата</label>
                      <div class="col-sm-10">
                                            <input type="text" class="form-control" name="held_beddays">

                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-left" style="margin:0px 10px 20px 10px; font-size:12px;"> <i class="fa fa-edit" style="color: white;" ></i> Редактировать</button>
                    <button type="submit" class="btn btn-primary pull-left" style="margin:0px 10px 20px 10px;font-size:12px;">   <i class="fa fa-remove" style="color: white;" ></i>  Очистить запись</button>
                    <button type="submit" class="btn btn-primary pull-right" style="margin:0px 10px 20px 10px;font-size:12px;">   <i class="fa fa-refresh" style="color: white;" ></i>Сбросить все</button>
                   <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Должность</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Количество ставок</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Вид финансировния</th>
                  </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                  <td class="sorting_1">Хирург</td>
                  <td class="">1</td>
                  <td>Бюджет</td>
                </tr></tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">Должность</th>
                <th rowspan="1" colspan="1">Количество ставок</th>
                <th rowspan="1" colspan="1">Вид финансорования</th>
                </tfoot>
              </table></div></div> <!--<div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>--> 
            
              <div class="col-sm-7" style="text-align:left;">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                  <ul class="pagination">
                    <li class="paginate_button previous disabled" id="example2_previous">
                      <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Предыдущая</a></li>
                      <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                      <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Следующая</a></li></ul></div></div></div></div>
            </div>
                
                   
                  <!--  @if ($errors->any())
    <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
@endif-->
                 
                </form>
              </div><!-- /.box -->
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Сотрудники</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
  {!! Form::open(array('route' => 'staf_add', 'class' => 'form-horizontal', 'files'=>true)) !!} 
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ФИО</label>
                      <div class="col-sm-10">
                           <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Иванов Иван Иванович</option>
                      <option>Пупкин Иван Иванович</option>
                      <option>Петров Игорь Владимирович</option>
                    </select>
                      </div>
                    </div>
                      <div class="form-group">
                      <label  class="col-sm-2 control-label">Должность</label>
                      <div class="col-sm-10">
                       <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Хирург</option>
                      <option>Терапевт</option>
                      <option>Невролог</option>
                    </select>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label">Категория персонала</label>
                      <div class="col-sm-10">
                        <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Врачи</option>
                      <option>Младший медицинский персонал</option>
                      <option>Провизоры</option>
                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Подразделение</label>
                      <div class="col-sm-10">
                         <select class="form-control select2"  style ="width: 100%;">
                      <option selected="selected">Поликлиника</option>
                      <option>Стационар</option>
                      <option>Дневной стационар</option>
                    </select>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label">Дата</label>
                      <div class="col-sm-10">
                                            <input type="text" class="form-control" name="held_beddays">

                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary pull-left" style="margin:0px 10px 20px 10px; font-size:12px;"> <i class="fa fa-edit" style="color: white;" ></i> Редактировать</button>
                    <button type="submit" class="btn btn-primary pull-left" style="margin:0px 10px 20px 10px;font-size:12px;">   <i class="fa fa-remove" style="color: white;" ></i>  Очистить запись</button>
                    <button type="submit" class="btn btn-primary pull-right" style="margin:0px 10px 20px 10px;font-size:12px;">   <i class="fa fa-refresh" style="color: white;" ></i>Сбросить все</button>
                   <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">ФИО</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Должность</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Категория персонала</th>
                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Подразделение</th>
               <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Количество ставок</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Декрет</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Внутреннее/вншнее совместительство/основное место работы</th>
   
                  </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                  <td class="sorting_1">Иванов Иван Иванович</td>
                  <td class="">Хирург</td>
                  <td>Врач</td>
                  <td>Поликлиника</td>
                  <td>1</td>
                  <td>нет</td>
                  <td>Основное место работы</td>
                </tr></tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">ФИО</th>
                <th rowspan="1" colspan="1">Должность</th>
                <th rowspan="1" colspan="1">Категория персонала</th>
                <th rowspan="1" colspan="1">Подразделение</th>
                <th rowspan="1" colspan="1">Количество ставок</th>
                <th rowspan="1" colspan="1">Декрет</th>
                <th rowspan="1" colspan="1">Внутреннее/внешнее совместительство/основное место работы</th>
                </tfoot>
              </table></div></div> <!--<div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>--> 
            
              <div class="col-sm-7" style="text-align:left;">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                  <ul class="pagination">
                    <li class="paginate_button previous disabled" id="example2_previous">
                      <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Предыдущая</a></li>
                      <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                      <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Следующая</a></li></ul></div></div></div></div>
            </div>
                
                   
                  <!--  @if ($errors->any())
    <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
@endif-->
                 
                </form>
              </div><!-- /.box -->
             </div>
                </form>
              </div><!-- /.box -->
                </div>
              </div><!-- /.nav-tabs-custom -->
            </section><!-- /.Left col -->   
         
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 TUSUR GPO team</strong>
      </footer>
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

    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  </body>
</html>