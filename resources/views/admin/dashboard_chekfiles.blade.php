@extends('admin.layouts.admin_header')

@section('content')

    <div class="container" style="background: #fff;">
        <br>
        <h4>Проверяем файлы в хранилище и удаляем старые файлы...</h4><br>

        <p align="justify">

        {!! $message  !!}

        </p>

    </div>

    <br><br>
    <a href="{{ route('admin.filesdir') }}"><button class="btn btn-primary"><i class="fas fa-backspace"></i> Назад</button></a>
    </div>
@endsection
