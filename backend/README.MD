# API REST de Armazenamento de Currículos e Cadastramento de Vagas de Emprego

## Descrição

Esta API REST foi desenvolvida para gerenciar o armazenamento de currículos e o cadastramento de vagas de emprego para uma empresa. A API permite a criação, leitura, atualização e exclusão (CRUD) de currículos e vagas, proporcionando uma interface fácil e eficiente para a gestão de processos seletivos.

## Tecnologias Utilizadas

- **Linguagem**: PHP
- **Framework**: Laravel
- **Banco de Dados**: MySQL

## Funcionalidades

### Currículos

- **Cadastrar um Currículo**: Permite que os usuários enviem seus currículos para o sistema.
- **Listar Currículos**: Permite que os administradores visualizem todos os currículos cadastrados.

### Vagas de Emprego

- **Cadastrar uma Vaga**: Permite que os administradores cadastrem novas vagas de emprego.
- **Listar Vagas**: Permite que os usuários visualizem todas as vagas disponíveis.
- **Atualizar uma Vaga**: Permite que os administradores atualizem informações sobre as vagas.
- **Deletar uma Vaga**: Permite que os administradores removam vagas do sistema.

## Endpoints

### Currículos

- Acesse o swagger para mais informações

## Autenticação

A API utiliza autenticação JWT para proteger os endpoints. Os usuários devem incluir um token JWT válido no cabeçalho `Authorization` das requisições.

## Instalação

### Passos para Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seuusuario/seurepositorio.git
   cd seurepositorio
