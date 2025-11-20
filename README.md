# Controle de Estacionamento 
Projeto desenvolvido em **PHP 8** e **MYSQL**, utilizando princípios de  
**Clean Code**, **SOLID** e **PSR-4**.

Este sistema permite gerenciar a entrada e saída de veículos em um estacionamento, calcular tarifas automaticamente e gerar relatórios de faturamento.

**Desenvolvido por:**
- *Larissa Vitoria Custódio de Carvalho — RA: 1995354*
- *Marcela Buzzo de Oliveira — RA: 2014340*
- *Felipe Meireles — RA: 2012841*

---

## Funcionalidades

### Entrada de veículos
Registro da entrada de veículos por tipo no estacionamento.

**Tipos suportados:**
- Carro — R$ 5/h;  
- Moto — R$ 3/h;  
- Caminhão — R$ 10/h.  

---

### Saída e cálculo de preço
Registro da saída do veículo e cálculo automático do valor a ser pago.

- Cálculo baseado no tempo total estacionado e no tipo do veículo;  
- Arredondamento para cima (ex.: 1h10min → 2 horas).  

---

## Relatório
- Total de veículos por tipo;  
- Faturamento total por tipo;
- Dados vindos diretamente do banco MySQL.  

---

## Arquitetura Utilizada

O projeto segue uma organização inspirada em **Clean Code**, com separação clara de camadas:

```
src
 ├── Application
 ├── Domain
 └── Infra
public
README.md
```

Princípios aplicados:
- SOLID;  
- PSR-4 Autoload;  
- Separação de responsabilidades;  
- Baixo acoplamento;  
- Alta coesão.  

---

## Tecnologias Utilizadas

- PHP 8.2+;
- MySQL; 
- HTML + CSS;  
- Apache (via XAMPP);
- Tailwind.

---

## Como Rodar o Projeto Localmente

### 1. Instalar o XAMPP
Baixe em:  
https://www.apachefriends.org/

### 2. Mover o projeto para o diretório do servidor
Coloque a pasta do projeto em:

```
C:\xampp\htdocs\projeto-final-SRP
```

### 3. Iniciar o Apache e MySQL
Abra o XAMPP Control Panel e clique em **Start** no módulo Apache e MySQL.

### 4. Instalar banco de dados e criar tabelas
Antes de iniciar o sistema, é necessário criar automaticamente o banco de dados e todas as tabelas.

Abra o navegador e acesse:
```
http://localhost/Projeto_Final_SRP/src/Infra/install.php
```
Se tudo estiver correto, aparecerá a mensagem:
 ```
Banco de dados criado com sucesso!
```
Depois disso, o sistema já estará pronto para uso.

### 5. Acessar o sistema
Abra o navegador e acesse:
```
http://localhost/Projeto_Final_SRP/public
```

## Estrutura do Banco de Dados

### Tabela: `parking`

| Campo        | Tipo     | Descrição                                  |
|--------------|----------|--------------------------------------------|
| `id`         |    INT   | Identificador único do registro            |
| `model`      | VARCHAR  | Modelo do veiculo                          |               
| `type`       | VARCHAR  | Tipo do veículo (carro, moto, caminhão)    |
| `entry_time` | DATETIME | Data e hora de entrada                     |
| `exit_time`  | DATETIME | Data e hora de saída                       |
| `total_hours`|    INT   | Cálculo no total de horas                  |
| `price`      |  DECIMAL | Valor calculado pelo sistema               |

### Tabela: `vehicles`

| Campo        | Tipo     | Descrição                                  |
|--------------|----------|--------------------------------------------|
| `id`         |   INT    | Identificador único do veiculo             |
| `model`      | VARCHAR  | Modelo do veiculo                          |               
| `type`       | VARCHAR  | Tipo do veículo (carro, moto, caminhão)    |

---

## Como Testar
### Cadastro
Acesse a página de entrada e informe:
- Modelo;  
- Tipo de veículo;
- Entrada (aaaa-mm-dd hh:mm);
- Saída (aaaa-mm-dd hh:mm).
Aperte o botão "Registrar Estadia".

### Visualizar relatório
Exibe:
- Quantidade de veículos por tipo  
- Faturamento total acumulado  
---
