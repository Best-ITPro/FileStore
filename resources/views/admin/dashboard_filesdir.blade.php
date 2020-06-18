<?php

use Illuminate\Support\Facades\Storage;

?>

@extends('admin.layouts.admin_header')

@section('content')


    <center>
    <div class="container" style="background: #fff;">
        <br>
        <h4>Файлы в хранилище:</h4>
        <br>
        <center>

        <table class="my_table" width="95%">
            <tr width="100%">
                <td class="my_table_header" width="4%">№</td>
                <td class="my_table_header" width="50%">Имя файла</td>
                <td class="my_table_header" width="14%">Размер</td>
                <td class="my_table_header" width="16%">Дата изменения</td>
                <td class="my_table_header" width="16%">Тип</td>
            </tr>


        @forelse($files as $file)
            <?php
            $file_orig = $file;
            $file_size = number_format( (int)(Storage::size($file_orig)) / 1000, 0, '.', ' ') . ' Кб';
            ?>

            <tr width="100%">
                <td width="4%">{{ $loop -> iteration }}</td>
                <td width="50%"><b><a href="/storage/{{ $file }}" download>{{ $file }} </a></b></td>
                <td width="14%"><?= $file_size ?></td>
                <td width="16%"><?= date('d.m.Y H:i:s', Storage::lastModified($file_orig)) ?></td>
                <td width="16%"><?=  Storage::getMimeType($file_orig)?></td>
            </tr>
        @empty
            </table>
            <br>
            <p><b><font color="red">Файлы в хранилище не найдены...</font></b></p>
        @endforelse

        </table>

            <br>

            <a href="{{ route('file-check-interface') }}" class="btn btn-primary"><i class="fas fa-folder-minus"></i> Ревизия хранилища</a>
        </center>

            <br>

    <br>
    </div>

@endsection
