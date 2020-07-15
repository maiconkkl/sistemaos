@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criação de Plano</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.planos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                       placeholder="Nome do plano" required="required">
                            </div>
                            <div class="form-group">
                                <label for="autorizacao">Tipo de Autorização</label>
                                <select class="form-control" id="autorizacao" name="autorizacao"
                                        required="required">
                                    <option>Escolha o tipo de autorização para revenda</option>
                                    <option value="1">Solicita autorização a revenda</option>
                                    <option value="2">Não solicita autorização a revenda</option>
                                    <option value="3">Informação fica no cliente</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="atende">Essa empresa faz atendimento ?</label>
                                <select class="form-control" id="atende" name="atende" required="required">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="percentual_atendimento">Percentual cobrado</label>
                                <input type="number" min="0" max="100" step="0.01" class="form-control" id="percentual_atendimento"
                                       name="percentual_atendimento" placeholder="Percentual cobrado sobre o atendimento"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <label for="taxa_fixa">Taxa fixa</label>
                                <input type="number" min="0" max="100" step="0.01" class="form-control" id="taxa_fixa"
                                       name="taxa_fixa" placeholder="Taxa fixa cobrado sobre o atendimento"
                                       required="required">
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
