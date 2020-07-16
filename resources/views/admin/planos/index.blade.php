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
                                <th>Tipo de autorização</th>
                                <th>Faz atendimento</th>
                                <th>Percentual Cobrado</th>
                                <th>Taxa Fixa</th>
                                <th>Criado em</th>
                                <th>Editado em</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($planos as $plano)
                                <tr>
                                    <td>{{ $plano->id }}</td>
                                    <td>{{ $plano->nome }}</td>
                                    <td>@if($plano->autorizacao == 1)Solicita autorização a revenda @elseif($plano->autorizacao == 2)Não solicita autorização a revenda @else Informação fica no cliente @endif</td>
                                    <td>@if($plano->atende == 0)Não @else Sim @endif</td>
                                    <td>{{ $plano->percentual_atendimento }}</td>
                                    <td>{{ $plano->taxa_fixa }}</td>
                                    <td>{{ $plano->created_at }}</td>
                                    <td>{{ $plano->updated_at }}</td>
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
