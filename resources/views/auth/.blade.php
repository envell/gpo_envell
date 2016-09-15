@extends('auth.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><img src="/public/dist/img/logo2.png" class = "leftimg"/> <b>Workspace</b>Manager</a>
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
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Фамилия" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Имя" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Отчество" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                 <div class="form-group has-feedback">
                    
                    <select  class="form-control">
                      <option selected="selected">Статистик</option>
                      <option>Врач</option>
                      </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Номер телефона" name="phone" value="{{ old('email') }}"/>
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
                                <input type="checkbox"> Я согласен с <a href="#">правилами</a>
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
