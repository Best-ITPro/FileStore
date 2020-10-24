<?php

// MyApp - settings
use App\MyApp;
$day_save = MyApp::DAY_SAVE;

?>

@extends('admin.layouts.admin_header')

@section('content')

    @include('admin.domains.messages')

    <div class="container">
        <br>

        <div class="row">

            <div class="col-sm-5" style="background: #fff;">
                <p>
                <h4>Наши почтовые домены:</h4>

                <table class="table table-sm">
                    <tr>
                        <td class="my_table_header" width="5%">№</td>
                        <td class="my_table_header" width="70%">Почтовый домен</td>
                        <td class="my_table_header" width="25%">Действие</td>
                    </tr>

                    @foreach($domains as $domain)
                        <tr>
                            <td width="5%">{{ $loop -> iteration }}</td>
                            <td width="70%"><font color="#3490DC">{{ $domain -> domain }}</font></td>

                            <td width="25%" >
                                <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.domains.destroy', $domain->id)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE"> {{ csrf_field() }}
                                    <a class="btn btn-default" href="{{route('admin.domains.edit', $domain->id )}}" title="Редактировать запись"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn" title="Удалить запись"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </table>

                <center>
                    <a href="{{ route('admin.domains.create') }}"><button class="btn btn-primary"><i class="far fa-plus-square"></i> Добавить новую запись</button></a>
                </center>

                </p>

            </div>

            <div class="col-sm-1" style="opacity:0;"></div>
            <div class="col-sm-6" style="background: #fff;">
                <p>
                    <center>
                        <h4>Срок хранения файлов (в днях):</h4><br>
                        <h3><font color="#EA4335"><?php print $day_save; ?></font></h3>с момента отправки
                        <br><br>
                <p align="justify">
                    константа <b>DAY_SAVE</b><br>
                    класс <b>App\MyApp</b>
                </p>
                <br>
                <a href="{{ route('file-check-interface') }}" class="btn btn-primary"><i class="fas fa-folder-minus"></i> Ревизия хранилища</a>


                </center>
                </p>

                <hr>
                <br>
                <h4>Максимальный размер загружаемого файла:</h4>
                <h3><font color="#EA4335">1 Gb</font></h3>

                <p align="justify">
                    <b>.htaccess:</b><br>
                    php_value max_execution_time 5000<br>
                    php_value max_input_time 5000<br>
                    php_value upload_max_filesize <b>1000M</b><br>
                    php_value post_max_size 1000M<br>

                </p>
                <br>
                <hr>
                <br>
                <center>
                    <a href="./../extentions/adminer-4.7.7-mysql.php" target="_blank" class="btn btn-primary"><i class="fas fa-database"></i>  Adminer-4.7.7-mysql</a>
                </center>
                <br>
            </div>
        </div>

        <div class="row">

        </div>
        <br>
        <div class="row">
            <div class="col-sm"  style="background: #fff;">

                <p>
                <h4>Администраторы системы:</h4>

                <table class="table table-sm">
                    <tr>
                        <td class="my_table_header" width="5%">№</td>
                        <td class="my_table_header" width="25%">Имя</td>
                        <td class="my_table_header" width="30%">E-mail</td>
                        <td class="my_table_header" width="28%">Last Time Login</td>
                        <td class="my_table_header" width="22%">Last IP Login</td>
                    </tr>

                    @foreach($admins as $admin)
                        <tr>
                            <td width="5%">{{ $loop -> iteration }}</td>
                            <td width="25%"><b>{{ $admin -> name }}</b></td>
                            <td width="30%"><a href="mailto:{{ $admin -> email }}>">{{ $admin -> email }}</a></td>
                            <td width="28%"><?= date('d.m.Y H:i:s', strtotime($admin->last_login_at)) ?></td>
                            <td width="22%"><a href="https://ipinfo.io/{{$admin->last_login_ip}}" target="_blank">{{$admin->last_login_ip}}</td>
                        </tr>
                    @endforeach

                </table>
                <p style="text-align: justify; ">
                <font size="2"> Для регистрации нового администратора нажмите "Выход из панели администрирования" внизу экрана, вернитесь в "Панель администрирования" и выберете пункт "Register" в форме авторизации
                </font></p>

                <!--
                <center>
                    <admin-component :admins="{{ json_encode($admins)  }}"></admin-component>
                </center>
                -->

            </div>

        </div>

    </div>

@endsection
