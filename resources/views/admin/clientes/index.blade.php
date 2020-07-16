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
                                    <th>Razão Social</th>
                                    <th>Nome Fantasia</th>
                                    <th>Tipo de Empresa</th>
                                    <th>Revenda</th>
                                    <th>Criado em</th>
                                    <th>Editado em</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->razao }}</td>
                                    <td>{{ $empresa->fantasia }}</td>
                                    <td>@if($empresa->tipo == 0)Empresa administrador do sistema @elseif($empresa->tipo == 1)Empresa parceira @else Cliente das empresas parceiras @endif</td>
                                    <td>{{ $empresa->get_record_cliente()->get()[0]->revenda()->get()[0]->razao }}</td>
                                    <td>{{ $empresa->created_at }}</td>
                                    <td>{{ $empresa->updated_at }}</td>
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