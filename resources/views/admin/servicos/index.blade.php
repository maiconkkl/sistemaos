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
                                    <th>Nome</th>
                                    <th>Nome do Modulo</th>
                                    <th>Nome do Software</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($servicos as $servico)
                                <tr>
                                    <td>{{ $servico->id }}</td>
                                    <td>{{ $servico->nome }}</td>
                                    <td>{{ $servico->modulo->nome }}</td>
                                    <td>{{ $servico->software->software_name }}</td>
                                    <td></td>
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
