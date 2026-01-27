# 🔗 Guarda Links

Uma aplicação web para centralizar, organizar, compartilhar e gerenciar seus links de redes sociais, portfólio e projetos em um único lugar intuitivo e seguro.

## 📋 Sobre o Projeto

**Guarda Links** é um gerenciador de links pessoal desenvolvido com **Laravel 12** e **PostgreSQL**. A aplicação permite que usuários criem uma conta, façam login seguro e gerenciem seus links com facilidade através de uma interface responsiva e amigável.

### Funcionalidades Principais

- ✅ **Autenticação Segura**: Registro e login de usuários com senhas criptografadas
- ✅ **Gestão de Links**: Criar, editar e deletar links pessoais
- ✅ **Organização**: Classificar links por plataforma (GitHub, LinkedIn, Twitter, Instagram, etc.)
- ✅ **Descrições**: Adicionar notas/descrições para cada link
- ✅ **Autorização**: Apenas o proprietário pode editar/deletar seus próprios links
- ✅ **Interface Responsiva**: Funciona perfeitamente em desktop, tablet e mobile
- ✅ **Design Moderno**: UI/UX limpa com Tailwind CSS

## 🛠️ Stack Tecnológico

| Tecnologia | Versão | Descrição |
|-----------|--------|-----------|
| **Laravel** | ^12.0 | Framework web PHP |
| **PHP** | ^8.2 | Linguagem de programação |
| **PostgreSQL** | Latest | Banco de dados relacional |
| **Tailwind CSS** | v4.0.7 | Framework CSS utility-first |
| **Blade** | - | Template engine do Laravel |

## 🚀 Instalação e Configuração

### Pré-requisitos

- PHP 8.2+
- Composer
- PostgreSQL
- Node.js (opcional, para assets)

### Passo a Passo

1. **Clone o repositório**
```bash
git clone https://github.com/seu-usuario/guarda_links.git
cd guarda_links
```

2. **Instale as dependências**
```bash
composer install
```

3. **Configure o arquivo .env**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados no .env**
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=guarda_links (Ou o nome da sua database)
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

5. **Execute as migrations**
```bash
php artisan migrate
```

6. **Inicie o servidor**
```bash
php artisan serve --port=8000
```

A aplicação estará disponível em `http://127.0.0.1:8000`

## 🔐 Segurança

- Senhas são criptografadas com bcrypt
- Proteção contra CSRF com tokens
- Autorização por Policy: usuários só podem editar/deletar seus próprios links
- Middleware de autenticação nas rotas protegidas
- Validação em servidor e cliente

## 📝 Notas de Desenvolvimento

- A aplicação usa Blade templates para views
- Tailwind CSS é carregado via CDN para facilitar
- Não requer Node.js/npm para funcionar
- Database lazy loading de relacionamentos para segurança

## 👨‍💻 Desenvolvedor

Desenvolvido como projeto educacional em Laravel 12.
