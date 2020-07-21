@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criação de Serviço</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.servicos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Serviço" required="required">
                            </div>
                            <div class="form-group">
                                <label for="software">Modulo</label>
                                <select class="form-control" id="modulo" name="modulo_id" required="required">
                                    <option>Escolha o software</option>
                                    @foreach($modulos as $modulo)
                                        <option value="{{ $modulo->id }}">{{ $modulo->nome }} - {{ $modulo->software->software_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
