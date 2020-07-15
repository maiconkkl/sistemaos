@extends('layouts.app')

@section('content')
    @can('create_version_software')
    <script>
        $(document).ready(function(){
            $("#add_version").click(function(){
                $("#version_add").append("<div class=\"border border-primary p-1 mb-1\"><button type=\"button\" class=\"close remove\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div class=\"form-group\"><label for=\"last_version_add\">Ultima versão software</label><input type=\"text\" class=\"form-control\" id=\"last_version_add\" name=\"last_version_add[]\" placeholder=\"Digite a última versão software\" required=\"required\" maxlength=\"30\"></div><div class=\"form-group\"><label for=\"url_download_add\">URL de Download</label><input type=\"text\" class=\"form-control\" id=\"url_download_add\" name=\"url_download_add[]\" placeholder=\"URL de Download da ultima versão software\" required=\"required\"></div></div>");
            });
            $(document).on('click','.remove', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
    @endcan
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <span class="font-weight-bolder">CADASTRO DO SOFTWARE</span>
                        <ul class="nav nav-tabs mt-1">
                            <li class="nav-item">
                                <a class="nav-link active" id="sistema-tab" href="#sistema" data-toggle="tab">
                                    Dados do Sistema
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="versions-tab" href="#versions" data-toggle="tab">Versões</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.software.update', $software->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="sistema" role="tabpanel" aria-labelledby="sistema-tab">
                                    <div class="form-group">
                                        <label for="software_name">Nome do software</label>
                                        <input type="text" class="form-control" id="software_name" name="software_name"
                                               placeholder="Digite o nome do software" required="required"
                                               value="{{ $software->software_name }}"
                                               @cannot('update_software') disabled="disabled" @endcan>
                                    </div>
                                    <div class="form-group">
                                        <label for="softhouse_name">Desenvolvedora software</label>
                                        <input type="text" class="form-control" id="softhouse_name" name="softhouse_name"
                                               placeholder="Digite da empresa desenvolvedora do software" required="required"
                                               value="{{ $software->softhouse_name }}"
                                               @cannot('update_software') disabled="disabled" @endcan>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="versions" role="tabpanel" aria-labelledby="versions-tab">
                                    @can('create_version_software')
                                    <button type="button" class="btn btn-info float-right" id="add_version">Adicionar Versão</button>
                                    <div id="version_add">
                                    </div>
                                    @endcan
                                    @can('list_version_software')
                                        @foreach($software->versions()->orderBy('id', 'desc')->get() as $version)
                                            <div class="border border-primary p-1 mb-1">
                                                @can('update_version_software') <input type="hidden" value="{{ $version->id }}" name="software_id[]"> @endcan
                                                <div class="form-group">
                                                    <label for="last_version">Ultima versão software</label>
                                                    <input type="text" class="form-control" id="version" name="version[]"
                                                           placeholder="Digite a última versão software" required="required"
                                                           maxlength="30" value="{{ $version->version }}"
                                                           @cannot('update_version_software') disabled="disabled" @endcan>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url_download">URL de Download</label>
                                                    <input type="text" class="form-control" id="url_download" name="url_download[]"
                                                           placeholder="URL de Download da ultima versão software"
                                                           required="required" value="{{ $version->url_download }}"
                                                           @cannot('update_version_software') disabled="disabled" @endcan>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endcan
                                </div>
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
