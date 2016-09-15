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
           {!! Form::open(array('route' => 'update', 'class' => 'form-horizontal', 'files'=>true)) !!} 
            <p class="login-box-msg">Адрес электронной почты:</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                 
                        <button type="submit" class="btn btn-primary" style="width:100%;" name="action" value="email">Сохранить адрес</button>
                                           
                 <p class="login-box-msg"><br>Номер телефона:</p>
                 <div class="form-group has-feedback">
                     <input type="text" class="form-control" placeholder="Номер телефона" name="phone"/>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                     </div>
        <button type="submit" class="btn btn-primary" style="width:100%;" name="action" value="phone">Изменить номер телефона</button>
                                 
                     <p class="login-box-msg"><br>Изменить пароль:</p>
                <div class="form-group has-feedback">
                     <input type="password" class="form-control" placeholder="Старый пароль" name="old_password" value ="{{ old('password') }}"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                 <input type="password" class="form-control" placeholder="Новый пароль" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation"/>
                   <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;" name="action" value="password">Изменить пароль</button>
                    <p class="login-box-msg"><br>Загрузка нового фото:</p>
                                  <p style="text-align:center">    <img src="images/{{ Auth::user()->imag}}" class="img-thumbnail" alt="User Image" /> </p>  
                         <button class="file-upload2">            
                        <input type="file" class="file-input2" name="imag">Выбрать файл </button>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary" style="width:100%;" name="action" value="image">Сохранить фото</button>
                    <br>
                    <br>
                </div>
            
            </form>

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
