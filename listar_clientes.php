<?php
// Inclui as configurações de conexão
include 'config.php';

// Conecta ao banco
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT Id_Cliente, Nome, Endereco, Cidade, Telefone FROM Clientes ORDER BY Id_Cliente ASC";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0078D7;
            color: white;
        }
        /* Cores alternadas */
        tbody tr:nth-child(odd) {
            background-color: #ffffff !important; /* branco */
        }
        tbody tr:nth-child(even) {
            background-color: #d0e7ff !important; /* azul claro */
        }
        tbody tr:hover {
            background-color: #ffd966 !important; /* amarelo hover */
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['Id_Cliente']) ?></td>
                    <td><?= htmlspecialchars($row['Nome']) ?></td>
                    <td><?= htmlspecialchars($row['Endereco']) ?></td>
                    <td><?= htmlspecialchars($row['Cidade']) ?></td>
                    <td><?= htmlspecialchars($row['Telefone']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
