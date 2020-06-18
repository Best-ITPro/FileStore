
@extends('admin.layouts.admin_header')

@section('content')

    <center>

        <table class="my_table" width="95%">
            <tr width="100%">
                <td class="my_table_header" width="4%">№</td>
                <td class="my_table_header" width="16%">Downloader IP</td>
                <td class="my_table_header" width="60%">Downloader Info</td>
                <td class="my_table_header" width="20%">Date time</td>
            </tr>

            <?php
            //dd($data);
            ?>

    @forelse($data as $file)
        <tr width="100%">
        <td width="4%">{{ $loop -> iteration }}</td>
        <td width="16%"><a href="https://ipinfo.io/{{ $file -> DownLoaderIP }}" target="_blank">{{ $file -> DownLoaderIP }}</a> </td>
        <td width="60%">{{ $file -> DownLoaderInfo }}</td>
        <td width="20%">{{ $file -> created_at }}</td>
        </tr>
    @empty
        </table>
        <br>
        <b><font color="red"> Скачивания файла не зарегистрированы (!) </font></b>
        <br>

    @endforelse

    </table>

    <br>
        <a href="/admin"><button class="btn btn-primary">Назад</button></a>
@endsection
