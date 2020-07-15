@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function(){
            $("#add_phone").click(function(){
                $("#other_phones").append("<div class=\"border border-primary p-1 mb-1\"><button type=\"button\" class=\"close remove\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div class=\"form-group\"><label for=\"phone_type\">Telefone Tipo</label><select class=\"form-control\" id=\"phone_type\" name=\"phone_type[]\" required=\"required\"><option></option><option value=\"principal\">Principal</option><option value=\"comercial\">Comercial</option><option value=\"fax\">Fax</option><option value=\"residencial\">Residencial</option><option value=\"whatsapp\">WhatsApp</option><option value=\"celular\">Celular</option><option value=\"outros\">Outros</option></select></div><div class=\"form-group\"><label for=\"phone_number\">Numero de Telefone</label><input class=\"form-control\" type=\"text\" name=\"phone[]\" id=\"phone_number\" required=\"required\"/></div><div class=\"form-group\"><label for=\"phone_contact\">Contato</label><input class=\"form-control\" type=\"text\" name=\"phone_contact[]\" id=\"phone_contact\" required=\"required\"/></div></div>");
            });
            $("#add_documents").click(function(){
                $("#other_documents").append("<div class=\"border border-primary p-1 mb-1\"><button type=\"button\" class=\"close remove\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div class=\"form-group\"><label for=\"documento_type\">Tipo de documento</label><select class=\"form-control\" name=\"documento_type[]\" required=\"required\"><option></option><option value=\"cnpj\">CNPJ</option><option value=\"ie\">IE</option><option value=\"rg\">RG</option><option value=\"cpf\">CPF</option></select></div><div class=\"form-group\"><label for=\"documento\">Documento</label><input class=\"form-control\" type=\"text\" name=\"documento[]\"/></div></div>");
            });
            $("#add_enderecos").click(function(){
                $("#other_enderecos").append("<div class=\"border border-primary p-1 mb-1\"><button type=\"button\" class=\"close remove\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div class=\"form-group\"><label for=\"endereco_type\">Endereço Tipo</label><select class=\"form-control\" name=\"endereco_type[]\" required=\"required\"><option></option><option value=\"principal\">Principal</option><option value=\"comercial\">Comercial</option><option value=\"fax\">Fax</option><option value=\"residencial\">Residencial</option><option value=\"whatsapp\">WhatsApp</option><option value=\"celular\">Celular</option><option value=\"outros\">Outros</option></select></div><div class=\"form-group\"><label for=\"logradouro\">logradouro</label><input class=\"form-control\" type=\"text\" name=\"logradouro[]\" required=\"required\"/></div><div class=\"form-group\"><label for=\"bairro\">bairro</label><input class=\"form-control\" type=\"text\" name=\"bairro[]\" required=\"required\"/></div><div class=\"form-group\"><label for=\"numero\">numero</label><input class=\"form-control\" type=\"text\" name=\"numero[]\"/></div><div class=\"form-group\"><label for=\"complemento\">complemento</label><input class=\"form-control\" type=\"text\" name=\"complemento[]\"/></div><div class=\"form-group\"><label for=\"cidade\">cidade</label><input class=\"form-control\" type=\"text\" name=\"cidade[]\" required=\"required\"/></div><div class=\"form-group\"><label for=\"estado\">estado</label><select class=\"form-control\" id=\"estado\" name=\"estado[]\" required=\"required\"><option value=\"AC\">Acre</option><option value=\"AL\">Alagoas</option><option value=\"AP\">Amapá</option><option value=\"AM\">Amazonas</option><option value=\"BA\">Bahia</option><option value=\"CE\">Ceará</option><option value=\"DF\">Distrito Federal</option><option value=\"ES\">Espírito Santo</option><option value=\"GO\">Goiás</option><option value=\"MA\">Maranhão</option><option value=\"MT\">Mato Grosso</option><option value=\"MS\">Mato Grosso do Sul</option><option value=\"MG\">Minas Gerais</option><option value=\"PA\">Pará</option><option value=\"PB\">Paraíba</option><option value=\"PR\">Paraná</option><option value=\"PE\">Pernambuco</option><option value=\"PI\">Piauí</option><option value=\"RJ\">Rio de Janeiro</option><option value=\"RN\">Rio Grande do Norte</option><option value=\"RS\">Rio Grande do Sul</option><option value=\"RO\">Rondônia</option><option value=\"RR\">Roraima</option><option value=\"SC\">Santa Catarina</option><option value=\"SP\">São Paulo</option><option value=\"SE\">Sergipe</option><option value=\"TO\">Tocantins</option><option value=\"EX\">Estrangeiro</option></select></div></div>");
            });
            $("#add_emails").click(function(){
                $("#other_emails").append("<div class=\"border border-primary p-1 mb-1\"><button type=\"button\" class=\"close remove\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div class=\"form-group\"><div class=\"form-group\"><label for=\"endereco_type\">Tipo de Endereço</label><select class=\"form-control\" name=\"email_type[]\" required=\"required\"><option></option><option value=\"principal\">Principal</option><option value=\"comercial\">Comercial</option><option value=\"financeiro\">Financeiro</option><option value=\"residencial\">Residencial</option><option value=\"outros\">Outros</option></select></div><div class=\"form-group\"><label for=\"email\">E-mail</label><input class=\"form-control\" type=\"email\" name=\"email[]\" required=\"required\"/></div><div class=\"form-group\"><label for=\"contato_email\">Contato</label><input class=\"form-control\" type=\"text\" name=\"contato_email[]\" required=\"required\"/></div></div>");
            });
            $(document).on('click','.remove', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="dados-da-empresa-tab" href="#dados-da-empresa" data-toggle="tab">Dados da empresa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="telefones-tab" href="#telefones" data-toggle="tab">Telefones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="documentos-tab" href="#documentos" data-toggle="tab">Documentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="enderecos-tab" href="#enderecos" data-toggle="tab">Endereços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="emails-tab" href="#emails" data-toggle="tab">Endereços de E-mail</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.revendas.store') }}">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="dados-da-empresa" role="tabpanel" aria-labelledby="dados-da-empresa-tab">
                                    <div class="form-group">
                                        <label for="razao-social">Razão Social</label>
                                        <input type="text" class="form-control"
                                               id="razao-social" name="razao_social"
                                               placeholder="Digite a razão social da empresa" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome-fantasia">Nome Fantasia</label>
                                        <input type="text" class="form-control"
                                               id="nome-fantasia" name="nome_fantasia"
                                               placeholder="Digite a nome fantasia da empresa" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="plano_id">Plano da Revenda</label>
                                        <select class="form-control" id="plano_id" name="plano_id" required="required">
                                            <option></option>
                                            @foreach($planos as $plano)
                                                <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="telefones" role="tabpanel" aria-labelledby="telefones-tab">
                                    <button type="button" class="btn btn-info float-right" id="add_phone">Adicionar Telefone</button>
                                    <div class="border border-primary p-1 mb-1">
                                        <div class="form-group">
                                            <label for="phone_type">Telefone Tipo</label>
                                            <select class="form-control" name="phone_type[]" required="required">
                                                <option></option>
                                                <option value="principal">Principal</option>
                                                <option value="comercial">Comercial</option>
                                                <option value="fax">Fax</option>
                                                <option value="residencial">Residencial</option>
                                                <option value="whatsapp">WhatsApp</option>
                                                <option value="celular">Celular</option>
                                                <option value="outros">Outros</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Numero de Telefone</label>
                                            <input class="form-control" type="text" name="phone[]" required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_contact">Contato</label>
                                            <input class="form-control" type="text" name="phone_contact[]" required="required"/>
                                        </div>
                                    </div>
                                    <div id="other_phones"></div>
                                </div>
                                <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                                    <button type="button" class="btn btn-info float-right" id="add_documents">
                                        Adicionar outros documento</button>
                                    <div class="form-group">
                                        <label for="documento_type">Tipo de documento</label>
                                        <select class="form-control" name="documento_type[]" required="required">
                                            <option></option>
                                            <option value="cnpj">CNPJ</option>
                                            <option value="ie">IE</option>
                                            <option value="rg">RG</option>
                                            <option value="cpf">CPF</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="documento">Documento</label>
                                        <input class="form-control" type="text" name="documento[]"/>
                                    </div>
                                    <div id="other_documents"></div>
                                </div>
                                <div class="tab-pane fade" id="enderecos" role="tabpanel" aria-labelledby="enderecos-tab">
                                    <button type="button" class="btn btn-info float-right" id="add_enderecos">
                                        Adicionar outros endereço</button>
                                    <div class="form-group">
                                        <label for="endereco_type">Tipo de Endereço</label>
                                        <select class="form-control" name="endereco_type[]" required="required">
                                            <option></option>
                                            <option value="principal">Principal</option>
                                            <option value="comercial">Comercial</option>
                                            <option value="fax">Fax</option>
                                            <option value="residencial">Residencial</option>
                                            <option value="whatsapp">WhatsApp</option>
                                            <option value="celular">Celular</option>
                                            <option value="outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="logradouro">Logradouro</label>
                                        <input class="form-control" type="text" name="logradouro[]" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input class="form-control" type="text" name="bairro[]" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input class="form-control" type="text" name="numero[]"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input class="form-control" type="text" name="complemento[]"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input class="form-control" type="text" name="cidade[]" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" id="estado" name="estado[]" required="required">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                            <option value="EX">Estrangeiro</option>
                                        </select>
                                    </div>
                                    <div id="other_enderecos"></div>
                                </div>
                                <div class="tab-pane fade" id="emails" role="tabpanel" aria-labelledby="emails-tab">
                                    <button type="button" class="btn btn-info float-right" id="add_emails">
                                        Adicionar outro endereço de e-mail</button>
                                    <div class="form-group">
                                        <label for="endereco_type">Tipo de Endereço de Email</label>
                                        <select class="form-control" name="email_type[]" required="required">
                                            <option></option>
                                            <option value="principal">Principal</option>
                                            <option value="comercial">Comercial</option>
                                            <option value="financeiro">Financeiro</option>
                                            <option value="residencial">Residencial</option>
                                            <option value="outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input class="form-control" type="email" name="email[]" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="contato_email">Contato</label>
                                        <input class="form-control" type="text" name="contato_email[]" required="required"/>
                                    </div>
                                    <div id="other_emails"></div>
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
