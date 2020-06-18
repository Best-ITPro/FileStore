@extends('admin.layouts.admin_header')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.domains.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="search" class="col-md-12 col-form-label text-center"><b>Добавление информации:</b></label>
                            </div>
                            <div class="col-md-12">
                                <input id="domain" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" value="{{ old('domain') }}"
                                       required autofocus placeholder="Добавить домен ...">
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-save"></i> Сохранить</button>
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary a_btn"><i class="fa fa-ban" aria-hidden="true"></i> Отменить</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
