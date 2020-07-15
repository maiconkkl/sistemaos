@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cadastro de Software</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.software.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="software_name">Nome do software</label>
                                <input type="text" class="form-control" id="software_name" name="software_name"
                                       placeholder="Digite o nome do software" required="required">
                            </div>
                            <div class="form-group">
                                <label for="softhouse_name">Desenvolvedora software</label>
                                <input type="text" class="form-control" id="softhouse_name" name="softhouse_name"
                                       placeholder="Digite da empresa desenvolvedora do software" required="required">
                            </div>
                            @can('create_version_software')
                            <div class="form-group">
                                <label for="last_version">Ultima versão software</label>
                                <input type="text" class="form-control" id="last_version" name="last_version"
                                       placeholder="Digite a última versão software" required="required" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="url_download">URL de Download</label>
                                <input type="text" class="form-control" id="url_download" name="url_download"
                                       placeholder="URL de Download da ultima versão software" required="required">
                            </div>
                            @endcan
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
