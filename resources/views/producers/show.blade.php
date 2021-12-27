<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Produtor - {{$producer->nome}}</title>
</head>
<body>
<div class="container-fluid">
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <h1 class="h3">Detalhes do Produtor #{{$producer->id}}</h1>
        <a href="{{route('producers.index')}}" class="btn btn-sm btn-secondary">Voltar</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title m-0 p-0">Informações Gerais</p>
                <div class="small text-muted text-right">
                    @if(count($logs) > 0)
                        <div class="d-flex small flex-column">
                            <span>{{count($logs) . (count($logs) > 1 ? ' visualizações' : ' visualização')}}</span>
                            <span>Última Consulta: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $logs[0]['created_at'])->format('d/m/Y H:i:s') }}</span>
                        </div>
                    @else
                        <span>Primeira Consulta</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" readonly disabled type="text" id="nome" value="{{$producer->nome}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" readonly disabled type="text" id="cpf" value="{{$producer->cpf}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" readonly disabled type="text" id="telefone"
                               value="{{$producer->telefone}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" readonly disabled type="text" id="email"
                               value="{{$producer->email}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input class="form-control" readonly disabled type="text" id="cnpj" value="{{$producer->cnpj}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="created_at">Data de Cadastro</label>
                        <input class="form-control" readonly disabled type="text" id="created_at"
                               value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $producer->created_at)->format('d/m/Y')}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="updated_at">Data de Atualização</label>
                        <input class="form-control" readonly disabled type="text" id="updated_at"
                               value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $producer->updated_at)->format('d/m/Y')}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cpf_conjuge">CPF Conjuge</label>
                        <input class="form-control" readonly disabled type="text" id="cpf_conjuge"
                               value="{{$producer->cpf_conjuge}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <p class="card-title m-0 p-0">Endereço</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="endereco">Logradouro</label>
                        <input class="form-control" readonly disabled type="text" id="endereco"
                               value="{{$producer->endereco}}">
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input class="form-control" readonly disabled type="text" id="numero"
                               value="{{$producer->numero}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input class="form-control" readonly disabled type="text" id="bairro"
                               value="{{$producer->bairro}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="municipio">Cidade</label>
                        <input class="form-control" readonly disabled type="text" id="municipio"
                               value="{{$producer->municipio}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input class="form-control" readonly disabled type="text" id="uf" value="{{$producer->uf}}">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input class="form-control" readonly disabled type="text" id="complemento"
                               value="{{$producer->complemento}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input class="form-control" readonly disabled type="text" id="cep" value="{{$producer->cep}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <p class="card-title m-0 p-0">Imóveis</p>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CAR</th>
                        <th>NIRF</th>
                        <th>INCRA</th>
                        <th>Matrícula</th>
                        <th>Área</th>
                        <th>UF</th>
                        <th>Detalhes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($producer->imoveis as $property)
                        <tr>
                            <td>{{$property->id}}</td>
                            <td>{{$property->nome_imovel}}</td>
                            <td>{{$property->car}}</td>
                            <td>{{$property->nirf}}</td>
                            <td>{{$property->incra}}</td>
                            <td>{{$property->matricula}}</td>
                            <td>{{$property->area}}</td>
                            <td>{{$property->uf}}</td>
                            <td>
                                <button onclick="showDetails('{{base64_encode(json_encode($property))}}')"
                                        class="btn btn-sm btn-info">
                                    Detalhes
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">Nenhum imóvel encontrado</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="modalDetailsTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detalhes do Imóvel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="propertyDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
