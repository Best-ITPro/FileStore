@extends('admin.layouts.admin_header')

@section('content')

    <div class="container" style="background: #fff;">
        <br>
        <h4>Проверяем файлы в хранилище и удаляем старые файлы...</h4><br>

        <button class="btn btn-primary" onclick="window.history.back()"><i class="fas fa-backspace"></i> Назад</button>
        <p align="justify">

        {!! $message  !!}

        </p>

    </div>

    <br><br>
    <button class="btn btn-primary" onclick="window.history.back()"><i class="fas fa-backspace"></i> Назад</button>
    </div>
@endsection
