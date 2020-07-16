@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Software</th>
                                    <th>Nome da Softhouse</th>
                                    <th>Ultima versão</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($softwares as $software)
                                <tr>
                                    <td>{{ $software->id }}</td>
                                    <td>{{ $software->software_name }}</td>
                                    <td>{{ $software->softhouse_name }}</td>
                                    <td><a href="{{ $software->versions()->orderBy('id', 'desc')->first()->url_download }}">{{ $software->versions()->orderBy('id', 'desc')->first()->version }}</a></td>
                                    <td><a href="{{ route('admin.software.edit', $software->id) }}">Editar</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
