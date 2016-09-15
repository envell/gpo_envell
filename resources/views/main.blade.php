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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span>Информация о системе</span>
                </a>
              </li>
               <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span>Зарегистрировать медицинскую организацию</span>
                </a>
              </li>
               <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span>Контакты</span>
                </a>
              </li>
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
      
              <div class="information">
                <center><h>О нас</h></center>
                <p>Вхождение Российской Федерации в число лидеров мировой экономики и выход на уровень развитых стран по показателям социального благосостояния диктуют новые стандарты качества жизни населения страны. Одной из целей Государственной политики Российской Федерации является обеспечение доступной медицинской помощи и повышение эффективности медицинских услуг, объемы, виды и качество которых должны соответствовать потребностям населения. Также на сегодняшний день актуализируются вопросы применения новых методов анализа и оценки эффективности функционирования системы здравоохранения и программ ее развития.
Разработка и внедрение аналитических инструментов поддержки принятия управленческих решений в сфере здравоохранения является одним из способ повышения эффективности оценки деятельности системы здравоохранения [2].
Предложенный авторами подход предназначен для полноценной оценки деятельности медицинских организаций с уточнениями по условиям и видам оказания медицинской помощи, так же позволяет определить положительный уровень эффективности функционирования и использования основных ресурсов медицинского учреждения.
Данный подход нашел применение в разработанном аналитическом инструменте, который позволяет  обеспечивать высокий уровень достоверности и полноту охвата оценки деятельности медицинских организаций с вариативной детализацией по условиям и видам оказания медицинской помощи, а также позволяет определять направления повышения эффективности функционирования и использования основных ресурсов (в первую очередь кадровых) системы оказания медицинской помощи.
 На основании агрегированных данных проводится анализ информации по существующим подведомственным подразделениям, позволяющего проводить оценку эффективности работы медицинского учреждения [3].
</p>
              </div>
               <div class="registr_org">
                <img src="http://skill.ru/images/2011/10/26/207480.png"></img>
                <div class="col-xs-8">
                <a href="main_reg" style="margin: auto; top: 0; left: 0; bottom: 0; right: 0 !important; padding:10px;"><button type="submit"  class="btn btn-primary btn-block btn-flat" style="margin:0% 0% 0% 0%;">Зарегистрировать медицинскую организацию</button>
                </a>              
              </div>
              </div>
              <div class="contacts_main">
                <center><h>Контакты</h></center>
                <table style ="border-collapse:collapse">
                  <tr>
                    <td width = 40%> <div class = "cont">
                <p>Адрес: Россия, город Томск, улица Ленина 151</p>
                <p>Контактные телефоны:</p>
                <p>служба поддержки 8-(000)-999-9999</p>
                <p>телефон 8-(000)-999-9999</p>
                <p>факс 8-(000)-999-9999</p>
                <p>email: WorkspaceManager@mail.ru</p>
                </div></td>
                <td width = 60%> <div class = "cont2">
               <a class="dg-widget-link" href="http://2gis.ru/tomsk/firm/422740746052171/center/84.948772,56.496345/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Томска</a>
               <div class="dg-widget-link">
                 <a href="http://2gis.ru/tomsk/center/84.948772,56.496345/zoom/16/routeTab/rsType/bus/to/84.948772,56.496345╎Бюро медицинской статистики?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Бюро медицинской статистики</a>
                 </div>
                 <script charset="utf-8" src="http://widgets.2gis.com/js/DGWidgetLoader.js"></script>
                 <script charset="utf-8">new DGWidgetLoader({"width":540,"height":300,"borderColor":"#a3a3a3","pos":{"lat":54.496345,"lon":84.948772,"zoom":16},"opt":{"city":"tomsk"},"org":[{"id":"422740746052171"}]});</script>
                 <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
              </div></td>
                  </tr>
                </table>
               
                
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
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
  </body>
</html>