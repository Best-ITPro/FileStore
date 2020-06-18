
@extends('admin.layouts.admin_header')

@section('content')

    <center>
        <div class="container-fluid" style="background: #fff;">
        <br>
        <h4>Информационная база файлообменника:</h4>
        <br>
            За всё время загружено файлов: <b><font color="green">{{ $count_all }}</font></b>, из них сейчас доступно: <b><font color="red">{{ $count_active }}</font></b>, удалено по таймеру: <b><font color="blue">{{ $count_del }}</font></b>.<br>
            Последний файл загружен: <b>{{ $last_file }}</b>. Первый файл загружен: <b>{{ $first_file }}</b><br>
            Общее число скачанных файлов: <b><font color="green">{{ $downloads }}</font></b>

        <br><br>

        <table class="my_table" width="95%">
            <tr width="100%">
                <td class="my_table_header" width="4%">ID</td>
                <td class="my_table_header" width="26%">Имя файла при загрузке</td>
                <td class="my_table_header" width="7%">Размер</td>
                <td class="my_table_header" width="14%">Адресат</td>
                <td class="my_table_header" width="10%">Отправитель</td>
                <td class="my_table_header" width="14%">Дата и время загрузки</td>
                <td class="my_table_header" width="14%">Планируемая дата удаления</td>
                <td class="my_table_header" width="7%">Файл активен</td>
                <td class="my_table_header" width="4%">Кол-во скачиваний</td>
            </tr>

    @foreach($data as $file)
        <tr width="100%">
        <td width="4%">{{ $file -> id }}</td>
        <td width="26%"><a href="{{ route('admin.file', $file -> id) }}">{{ $file -> FileName }}</a></td>
        <?php
         $file_size = number_format( (int)($file -> FileSize) / 1000, 0, '.', ' ') . ' Кб';
        ?>

        <td width="7%">{{ $file_size }}</td>
        <td width="14%"><a href="mailto:{{ $file -> FileEmail }}>">{{ $file -> FileEmail }}</a></td>
        <td width="10%"><a href="https://ipinfo.io/{{ $file -> FileSenderIP }}" target="_blank">{{ $file -> FileSenderIP }}</a></td>
        <td width="14%"><?= date('d.m.Y H:i:s', strtotime($file -> created_at)) ?></td>
        <td width="14%"><?= date('d.m.Y', strtotime($file -> FileDateErase)) ?></td>
        <td width="7%">
            <center>
            <?php
            $file->FileActive == 'Y' ? $status = "<font color='red'><b>Да</b></font>" : $status = "<font color='blue'><b>Нет</b></font>";
            echo $status;
            ?>
            </center>
        </td>
        <td width="4%"><a href="/admin/{{ $file -> id }}/downloaders">{{ $file -> FileDownloads }}</a></td>
        </tr>
    @endforeach

    </table>
    <div class="container">
    <br>
        {{ $data -> links() }}
    </div>
    <br>

        </div>
@endsection
