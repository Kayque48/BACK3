<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .table-wrapper {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th {
            background-color: #34495e;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f9f9f9;
        }
        
        .email {
            color: #3498db;
        }
        
        .telefone {
            color: #e74c3c;
            font-weight: bold;
        }
        
        .cnpj {
            font-family: monospace;
            color: #7f8c8d;
            font-size: 13px;
        }
        
        .sem-fornecedores {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏢 Lista de Fornecedores</h1>
        
        @if($fornecedores->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>CNPJ</th>
                            <th>Endereço</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td><strong>#{{ $fornecedor->id }}</strong></td>
                                <td>{{ $fornecedor->nome }}</td>
                                <td class="email">{{ $fornecedor->email }}</td>
                                <td class="telefone">{{ $fornecedor->telefone }}</td>
                                <td class="cnpj">{{ $fornecedor->cnpj }}</td>
                                <td>{{ Str::limit($fornecedor->endereco, 40) }}</td>
                                <td>{{ $fornecedor->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <p style="margin-top: 20px; text-align: center; color: #666;">
                Total de fornecedores: <strong>{{ $fornecedores->count() }}</strong>
            </p>
        @else
            <div class="sem-fornecedores">
                <p>Nenhum fornecedor encontrado.</p>
            </div>
        @endif
    </div>
</body>
</html>
