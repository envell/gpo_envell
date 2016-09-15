@extends('auth.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><img src="{{ asset('dist/img/logo2.png') }}" class = "leftimg"/> <b>Workspace</b>Manager</a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">Заpегистрируйтесь в системе</p>
            <form action="{{ url('/auth/register') }}" method="post">
                <div class="form-group has-feedback">
                    
                   <select name="post" class="form-control">
                      <option selected="selected">Медицинское учреждение</option>
                      <option>Выгрузить из БД</option>
                      </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Фамилия" name="lastname" value="{{ old('lastname') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Имя" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Отчество" name="middlename" value="{{ old('middlename') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                 <div class="form-group has-feedback">
                    
                   <select name="post" class="form-control">
                      <option selected="selected">Должность</option>
                      <option>Статистик</option>
                      <option>Руководитель</option>
                      <option>Администратор</option>
                      </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Номер телефона" name="phone_number" value="{{ old('phone_number') }}"/>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Пароль" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Я согласен с <a href="{{ url('/auth/regulations') }}">правилами</a>
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ОК</button>
                    </div><!-- /.col -->
                </div>
            </form>



            <a href="{{ url('/auth/login') }}" class="text-center">Я уже зарегистрирован</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
