# Projeto Lista de Clientes PHP com Banco Azure SQL

Este projeto exibe uma lista de clientes armazenados em um banco de dados SQL Server hospedado na Azure. A aplicação PHP conecta ao banco, consulta os dados e exibe em uma tabela HTML com linhas coloridas alternadas.

---

## Como configurar o banco de dados na Azure

1. Acesse o portal da Microsoft Azure: [https://portal.azure.com](https://portal.azure.com).

2. Crie um recurso do **Azure SQL Database**:
   - Clique em "Criar recurso" > "Banco de dados" > "Banco de dados SQL".
   - Preencha as informações:
     - **Assinatura**: selecione sua assinatura.
     - **Grupo de recursos**: crie um novo ou selecione um existente.
     - **Nome do banco de dados**: exemplo, `Banco`.
     - **Servidor**: crie um novo servidor SQL, definindo um nome único (ex: `servidoraulaads`), usuário administrador (ex: `paulo`) e senha.
     - Região: escolha a região mais próxima.
   - Clique em "Revisar e criar" e depois em "Criar".

3. Configure a regra de firewall para permitir acesso do seu IP:
   - No recurso do servidor SQL criado, vá em "Firewall e redes virtuais".
   - Adicione seu endereço IP público na lista de IPs permitidos.
   - Salve as configurações.

4. Conecte ao banco com uma ferramenta como Azure Data Studio ou SQL Server Management Studio e execute o script para criar a tabela Clientes:

```sql
CREATE TABLE Clientes (
    Id_Cliente INT IDENTITY(1,1) PRIMARY KEY,
    Nome NVARCHAR(100),
    Endereco NVARCHAR(255),
    Cidade NVARCHAR(100),
    Telefone NVARCHAR(20)
);
