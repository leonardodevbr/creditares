<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Produtores - Creditares</title>
</head>
<body>
<div class="container-fluid">
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <h1 class="h3">Produtores</h1>
        <a href="{{route('home')}}" class="btn btn-sm btn-secondary">Home</a>
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

    <div class="table-responsive">
        <table class="table text-nowrap table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Log</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($producers as $producer)
                <tr>
                    <td>{{$producer->id}}</td>
                    <td>{{$producer->nome}}</td>
                    <td>{{$producer->cpf}}</td>
                    <td>{{$producer->email}}</td>
                    <td>{{$producer->telefone}}</td>
                    <td>
                        @if(empty($producer->logs))
                            Nenhuma Visualização
                        @else
                            <div class="d-flex small flex-column">
                                <span>{{count($producer->logs) . (count($producer->logs) > 1 ? ' visualizações' : ' visualização')}}</span>
                                <span>Última Consulta: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $producer->logs[0]['created_at'])->format('d/m/Y H:i:s') }}</span>
                            </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('producers.show', $producer->id)}}" class="btn btn-sm btn-info">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhuma informação encontrada.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
