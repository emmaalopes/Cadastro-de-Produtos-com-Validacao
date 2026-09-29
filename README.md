# Sistema de Cadastro de Produtos em PHP e MySQL

Um sistema de cadastro de produtos desenvolvido em **PHP** com persistência de dados em **MySQL** (`mysqli`) e interface em **HTML5**. O projeto realiza validação dos dados de entrada no lado do servidor e exibe mensagens dinâmicas de resposta.

---

## Funcionalidades

- **Formulário de Cadastro:** Interface em HTML para inserção de nome e preço do produto.
- **Validação Server-Side (PHP):**
  - O campo **nome** é obrigatório e não pode ficar vazio.
  - O **preço** deve ser obrigatoriamente um valor numérico e maior que zero.
- **Integração com MySQL:** Conexão direta utilizando a extensão `mysqli` para inserção de registos na tabela `produtos` da base de dados `exercicio`[cite: 2].
- **Feedback ao Utilizador:** Mensagens dinâmicas de erro ou sucesso que desaparecem automaticamente após 5 segundos via JavaScript[cite: 2].

---

## Tecnologias Utilizadas

- **HTML5**[cite: 2]
- **PHP**[cite: 2]
- **MySQL** (`mysqli`)[cite: 2]
- **JavaScript** (para gestão temporizada das notificações)[cite: 2]

---

## Pré-requisitos

Para executar este projeto localmente, precisará de:

- Um ambiente de desenvolvimento local como **XAMPP**, **WAMP** ou **Laragon** (com suporte a PHP e MySQL)[cite: 2].
- Um servidor MySQL ativo com a base de dados criada[cite: 2].

---

## Configuração da Base de Dados

Antes de executar a aplicação, aceda ao seu gestor de base de dados (ex.: phpMyAdmin) e crie a base de dados e a respetiva tabela:

```sql
CREATE DATABASE IF NOT EXISTS exercicio;

USE exercicio;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);
