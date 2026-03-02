<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #8e44ad; color: #fff; padding: 15px; text-align: left; font-weight: bold; }
        td { padding: 12px 15px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f9f9f9; }
        .produto { font-weight: bold; }
        .quantidade { color: #e67e22; }
        .preco { color: #27ae60; font-weight: bold; }
        .localizacao { color: #2980b9; font-style: italic; }
        .sem-estoque { text-align: center; padding: 40px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 Estoque de Produtos</h1>
        @if($estoques->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th>Localização</th>
                            <th>Atualizado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estoques as $item)
                            <tr>
                                <td><strong>#{{ $item->id }}</strong></td>
                                <td class="produto">{{ $item->produto }}</td>
                                <td class="quantidade">{{ $item->quantidade }}</td>
                                <td class="preco">R$ {{ number_format((float)$item->preco, 2, ',', '.') }}</td>
                                <td>{{ Str::limit($item->descricao, 50) }}</td>
                                <td class="localizacao">{{ $item->localizacao }}</td>
                                <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p style="margin-top:20px; text-align:center; color:#666;">
                Total de registros: <strong>{{ $estoques->count() }}</strong>
            </p>
        @else
            <div class="sem-estoque">
                <p>Nenhum item em estoque.</p>
            </div>
        @endif
    </div>
</body>
</html>
